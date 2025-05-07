<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    public function index(){
        $response = Http::get("http://localhost:8080/api/mahasiswa");
        $data = $response->json();

        return (view('display-mahasiswa', compact('data')));
    }

    public function showNilai($npm){
        $responseDataMahasiswa = Http::get("http://localhost:8080/api/mahasiswa/${npm}");
        $responseDataNilai = Http::get("http://localhost:8080/api/nilainilai/${npm}");
        $dataMahasiswa = $responseDataMahasiswa->json();
        $dataNilai = $responseDataNilai->json();

        return (view('display-nilai', compact('dataMahasiswa', 'dataNilai')));
    }
}
