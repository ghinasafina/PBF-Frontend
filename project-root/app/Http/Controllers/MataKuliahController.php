<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MataKuliahController extends Controller
{
    function index(){
        $response = Http::get('http://localhost:8080/api/matkul');
        $data = $response->json();
        
        return view('mata-kuliah', ['data' => $data]);
    }
    
    function matkulDosen() {
        $idDosen = session('user')['id_dosen']; 
        
        $response = Http::get('http://localhost:8080/api/matkul');
        $data = $response->json();
        
        
        $filtered = collect($data['data'])->where('id_dosen', $idDosen);
        
        return view('dosen.matkul', ['data' => $filtered]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_matkul' => 'required',
            'id_dosen' => 'required',
            'nama_matkul' => 'required|string',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
        ]);
        
        
        try {
            $response = Http::asForm()->post('http://localhost:8080/api/matkul', [
                'id_matkul' => $request->id_matkul,
                'id_dosen' => $request->id_dosen,
                'nama_matkul' => $request->nama_matkul,
                'sks' => $request->sks,
                'semester' => $request->semester
            ]);
            
            if ($response->successful()) {
                return redirect()->back()->with('success', 'Mata kuliah berhasil ditambahkan!');
            } else {
                return redirect()->back()->with('error', 'Gagal menyimpan data mata kuliah.');
            }
            
        } catch (\Exception $e) {
            Log::error('Store Mata Kuliah Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem.');
        }
    }
    
    public function destroy($id)
    {
        try {
            $response = Http::delete("http://localhost:8080/api/matkul/{$id}");
            
            if ($response->successful()) {
                return redirect()->back()->with('success', 'Mata kuliah berhasil dihapus!');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus mata kuliah.');
            }
        } catch (\Exception $e) {
            Log::error('Delete Mata Kuliah Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus.');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_matkul' => 'required',
            'nama_matkul' => 'required|string',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
        ]);
        
        try {
            $response = Http::asForm()->put("http://localhost:8080/api/matkul/{$id}", [
                'id_matkul' => $request->id_matkul,
                'nama_matkul' => $request->nama_matkul,
                'sks' => $request->sks,
                'semester' => $request->semester,
                'id_dosen' => $request->id_dosen
            ]);
            
            if ($response->successful()) {
                return redirect()->back()->with('success', 'Data mata kuliah berhasil diupdate!');
            } else {
                return redirect()->back()->with('error', 'Gagal update data.');
            }
        } catch (\Exception $e) {
            Log::error('Update Mata Kuliah Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat update.');
        }
    }
    
}

