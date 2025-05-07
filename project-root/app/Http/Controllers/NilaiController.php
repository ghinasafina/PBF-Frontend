<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NilaiController extends Controller
{
    public function index(){
        $response = Http::get('http://localhost:8080/api/nilainilai');
        $data =  $response->json();
        $idDosen = session('user')['id_dosen'];

        $filtered = collect($data["data"])->where('id_dosen', $idDosen);
    
        
        return(view('dosen.nilai', ['data'=>$filtered]));
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'NPM' => 'required',
            'id_dosen' => 'required',
            'id_matkul' => 'required',
            'nilai_tugas' => 'required|numeric|between:0,100',
            'nilai_uts' => 'required|numeric|between:0,100',
            'nilai_uas' => 'required|numeric|between:0,100',
        ]);
        
        try {
            $responseNilaiNilai = Http::asForm()->post('http://localhost:8080/api/nilainilai', [
                'id_dosen' => $request->id_dosen,
                'id_matkul' => $request->id_matkul,
                'NPM' => $request->NPM
            ]);
            
            if ($responseNilaiNilai->failed()) {
                Log::error('API Response Error:', $responseNilaiNilai->json());
                return back()->with('error', 'API Error: ' . $responseNilaiNilai->body());
            }
            
            $id_nilai = $responseNilaiNilai->json('data.id_nilai');
            
            
            
            $nilai_akhir = ($request->nilai_tugas * 0.3) + 
            ($request->nilai_uts * 0.3) + 
            ($request->nilai_uas * 0.4);
            
            $responseNilaiDetail = Http::asForm()->post('http://localhost:8080/api/nilai', [
                'id_nilai' => $id_nilai,
                'nilai_tugas' => $request->nilai_tugas,
                'nilai_uts' => $request->nilai_uts,
                'nilai_uas' => $request->nilai_uas,
            ]);
            
            $responseUpdate = Http::asForm()->put('http://localhost:8080/api/nilainilai/'.$id_nilai, [
                'id_dosen' => $request->id_dosen,
                'id_matkul' => $request->id_matkul,
                'NPM' => $request->NPM,
                'nilai_akhir' => $nilai_akhir
            ]);
            
            if ($responseUpdate->failed()) {
                Log::error('Update Error:', $responseUpdate->json());
                return back()->with('error', 'Gagal update nilai akhir');
            }
            
            if ($responseNilaiDetail->failed()) {
                Log::error('API Response Error:', $responseNilaiDetail->json());
                return back()->with('error', 'API Error: ' . $responseNilaiDetail->body());
            }
            
            return redirect()->route('dosen.nilai-mahasiswa.index')
            ->with('success', 'Nilai berhasil disimpan.');
            
        } catch (\Exception $e) {
            Log::error('Error: '.$e->getMessage());
            return back()->with('error', 'Terjadi kesalahan sistem.');
        }
    }
    
    public function destroy($id_nilai)
    {
        try {
            $responseDetail = Http::delete('http://localhost:8080/api/nilai/' . $id_nilai);
            
            if ($responseDetail->failed()) {
                Log::error('Gagal menghapus detail nilai:', $responseDetail->json());
            }
            
            $response = Http::delete('http://localhost:8080/api/nilainilai/' . $id_nilai);
            
            if ($response->successful()) {
                return redirect()->route('dosen.nilai-mahasiswa.index')
                ->with('success', 'Data nilai berhasil dihapus');
            } else {
                Log::error('API Error:', $response->json());
                return back()->with('error', 'Gagal menghapus data: ' . ($response->json()['message'] ?? 'Unknown error'));
            }
        } catch (\Exception $e) {
            Log::error('Error in destroy method: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan sistem');
        }
    }
    
    public function update(Request $request, $id_nilai)
    {
        $request->validate([
            'nilai_tugas' => 'required|numeric|between:0,100',
            'nilai_uts' => 'required|numeric|between:0,100',
            'nilai_uas' => 'required|numeric|between:0,100',
        ]);

        
        try {
            $nilai_akhir = ($request->nilai_tugas * 0.3) +
            ($request->nilai_uts * 0.3) +
            ($request->nilai_uas * 0.4);
            
            $responseDetail = Http::asForm()->put("http://localhost:8080/api/nilai/$request->id_detail", [
                'nilai_tugas' => $request->nilai_tugas,
                'nilai_uts' => $request->nilai_uts,
                'nilai_uas' => $request->nilai_uas
            ]);

            
            $responseUpdateNilai = Http::asForm()->put("http://localhost:8080/api/nilainilai/$id_nilai", [
                'id_dosen' => $request->id_dosen,
                'id_matkul' => $request->id_matkul,
                'NPM' => $request->NPM,
                'nilai_akhir' => $nilai_akhir
            ]);

            
            if ($responseDetail->successful() && $responseUpdateNilai->successful()) {
                return redirect()->route('dosen.nilai-mahasiswa.index')
                    ->with('success', 'Nilai berhasil diperbarui');
            } else {
                // Ambil isi error dari kedua response
                $errorDetail = $responseDetail->json();
                $errorNilai = $responseUpdateNilai->json();
            
                // Log lengkap buat debugging
                Log::error('Gagal update nilai:', [
                    'nilai_detail_response' => $errorDetail,
                    'nilai_nilai_response' => $errorNilai
                ]);
            
                // Kirim error ke tampilan (ambil message dari API kalau ada)
                $errorMessage = $errorNilai['message'] ?? $errorDetail['message'] ?? 'Gagal memperbarui data (API error)';
            
                return back()->with('error', $errorMessage);
            }
            
            
        } catch (\Exception $e) {
            Log::error('Update Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan sistem');
        }
    }
    
}