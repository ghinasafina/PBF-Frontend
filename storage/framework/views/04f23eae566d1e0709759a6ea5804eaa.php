<!DOCTYPE html>
<html lang="en">
<?php
        $mahasiswa = [
            ['NPM' => '230202021', 'nama_mahasiswa' => 'Ghina Safinatunnisa', 'alamat' => 'Jl. Munggur Timur', 'kelas' => 'TI-1B', 'tahun_akademik' => '2024', 'id_prodi' => 'TI'],
            ['NPM' => '230202022', 'nama_mahasiswa' => 'Muhammad Rifandi', 'alamat' => 'Jl. Ahmad Yani', 'kelas' => 'TPPL-2C', 'tahun_akademik' => '2024', 'id_prodi' => 'TPPL'],
            ['NPM' => '230202023', 'nama_mahasiswa' => 'Ilham Budimansyah', 'alamat' => 'Jl. Benur', 'kelas' => 'TM-2B', 'tahun_akademik' => '2024', 'id_prodi' => 'MESIN'],
            ['NPM' => '230202024', 'nama_mahasiswa' => 'Yovi Tito Budianto', 'alamat' => 'Jl.Srandil', 'kelas' => 'TT-2A', 'tahun_akademik' => '2024', 'id_prodi' => 'TI'],
          ];

        $dosen = [
            ['id_dosen' => 'ABD', 'nama_dosen' => "Abda'u", 'email' => 'abc@gmail.com', 'no_telp' => 345345345],
            ['id_dosen' => 'LUT', 'nama_dosen' => 'Lutfi', 'email' => '476@gmail.com', 'no_telp' => 345435],
            ['id_dosen' => 'ROS', 'nama_dosen' => 'Rostika', 'email' => '456@gmail.com', 'no_telp' => 3453453],
        ];

        $mataKuliah = [
            ['id_matkul' => 1, 'nama' => 'Pemrograman Web', 'sks' => 3],
            ['id_matkul' => 2, 'nama' => 'Basis Data', 'sks' => 3],
            ['id_matkul' => 3, 'nama' => 'Jaringan Komputer', 'sks' => 3],
        ];

        $nilaiMahasiswa = [
            ['npm' => '21001', 'nilai' => 85],
            ['npm' => '21002', 'nilai' => 78],
            ['npm' => '21003', 'nilai' => 90],
        ];

        // Hitung Statistik
        $jumlahMahasiswa = count($mahasiswa);
        $jumlahDosen = count($dosen);
        $jumlahMataKuliah = count($mataKuliah);
        $rataRataNilai = array_sum(array_column($nilaiMahasiswa, 'nilai')) / count($nilaiMahasiswa);
      ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nilai Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">DATA NILAI MAHASISWA</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
    </div>
  </div>
</nav>

<body>
  <div class="row m-5">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
              <a href="/login-mahasiswa" style="text-decoration: none;">
                <div class="card-body">
                  <h5 style="color: white; text-decoration: none;text-align:center">Mahasiswa</h5>
                  <h3 style="color: white; text-decoration: none;text-align:center">Login Sebagai Mahasiswa</h3>
                </div>
              </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white">
              <a href="/login-dosen" style="text-decoration: none;">
                <div class="card-body">
                    <h5 style="color: white; text-decoration: none;text-align:center">Dosen</h5>
                    <h3 style="color: white; text-decoration: none;text-align:center">Login Sebagai Dosen</h3>
                </div>
              </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-warning text-white">
              <a href="/mata-kuliah" style="text-decoration: none;">
                <div class="card-body">
                    <h5 style="color: white; text-decoration: none;text-align:center">Mata Kuliah</h5>
                    <h3 style="color: white; text-decoration: none;text-align:center">Keseluruhan Matkul</h3>
                </div>
              </a>
            </div>
        </div>

    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\TUGAS KULIAH\PBF\Front _Sistem_Pengelolaan_Nilai_Mahasiswa\resources\views/dashboard.blade.php ENDPATH**/ ?>