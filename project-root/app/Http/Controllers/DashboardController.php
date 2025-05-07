<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller{
    public function index(){
        return view('dashboard');
    }
}

        // Data Dummy
        $mahasiswa = [
            ['npm' => '220001', 'nama' => 'Budi Santoso', 'kelas' => 'TI-1A'],
            ['npm' => '220002', 'nama' => 'Ani Lestari', 'kelas' => 'TI-1B'],
            ['npm' => '220003', 'nama' => 'Candra Wijaya', 'kelas' => 'TI-1C'],
        ];

        $dosen = [
            ['id_dosen' => 1, 'nama' => 'Dr. Rahmat'],
            ['id_dosen' => 2, 'nama' => 'Dr. Siti'],
            ['id_dosen' => 3, 'nama' => 'Dr. Andi'],
        ];

        $mataKuliah = [
            ['id_matkul' => 1, 'nama' => 'Pemrograman Web', 'sks' => 3],
            ['id_matkul' => 2, 'nama' => 'Basis Data', 'sks' => 3],
            ['id_matkul' => 3, 'nama' => 'Jaringan Komputer', 'sks' => 3],
        ];

        $nilaiMahasiswa = [
            ['npm' => '220001', 'nilai' => 85],
            ['npm' => '220002', 'nilai' => 80],
            ['npm' => '220003', 'nilai' => 88],
        ];

        // Menghitung total data
        $jumlahMahasiswa = count($mahasiswa);
        $jumlahDosen = count($dosen);
        $jumlahMataKuliah = count($mataKuliah);
        $rataRataNilai = array_sum(array_column($nilaiMahasiswa, 'nilai')) / count($nilaiMahasiswa);

        return view('dashboard.index', compact(
            'mahasiswa',
            'dosen',
            'mataKuliah',
            'nilaiMahasiswa',
            'jumlahMahasiswa',
            'jumlahDosen',
            'jumlahMataKuliah',
            'rataRataNilai'
        ));