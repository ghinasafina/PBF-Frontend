<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DisplayDosenController extends Controller
{
    public function index(){
        $response = Http::get('http://localhost:8080/api/dosen');
        $data =  $response->json();
        
        return(view('dosen.display-dosen', compact('data')));
    }
    
}