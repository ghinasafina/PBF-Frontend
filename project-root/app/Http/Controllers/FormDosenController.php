<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FormDosenController extends Controller
{
    function index(){
        return(view('dosen.login'));
    }
    
    public function login(Request $request)
    {
        $response = Http::asForm()->post('http://localhost:8080/api/dosen/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        
        if ($response->successful()) {
            $user = $response['data'];
            session(['user' => $user, 'role' => 'dosen']);
            return redirect()->route('display.dosen');
        }
        
        return back()->with('error', 'Login gagal, cek email & no telepon!');
    }
    
}
