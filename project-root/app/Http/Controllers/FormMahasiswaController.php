<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FormMahasiswaController extends Controller
{
    function index(){
        $response = Http::get("http://localhost:8080/api/prodi");
        $data = $response->json();
        
        return(view('form-mahasiswa', compact('data')));
    }
    
    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            ])->post('http://localhost:8080/api/mahasiswa', [
                'NPM' => $request->npm,
                'nama_mahasiswa' => $request->nama,
                'alamat' => $request->alamat,
                'kelas' => $request->kelas,
                'tahun_akademik' => $request->tahun_akademik,
                'id_prodi' => $request->id_prodi,
            ]);
            
            return redirect()->route('display.mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan!');
            
        }

        public function loginForm(){

            return view('mahasiswa.login');
        }
        
        public function login(Request $request)
        {
            $npm = $request->input('npm');
            $nama = $request->input('nama');
            
            $response = Http::get("http://localhost:8080/api/mahasiswa");
            $mahasiswa = $response->json()['data'];
            
            // cek apakah mahasiswa dengan NPM dan nama cocok
            $match = collect($mahasiswa)->first(function ($item) use ($npm, $nama) {
                return $item['NPM'] === $npm;
            });
            
            if ($match) {
                return redirect("/display-nilai/$npm");
            } else {
                return back()->with('error', 'NPM tidak cocok!');
            }
        }
        
    }
    