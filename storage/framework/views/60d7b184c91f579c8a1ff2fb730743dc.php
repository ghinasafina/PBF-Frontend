<?php
        $mahasiswa = [
            ['NPM' => '230202021', 'nama_mahasiswa' => 'Ghina Safinatunnisa', 'alamat' => 'Jl. Munggur Timur', 'kelas' => 'TI-1B', 'tahun_akademik' => '2024', 'id_prodi' => 'TI'],
            ['NPM' => '230202022', 'nama_mahasiswa' => 'Muhammad Rifandi', 'alamat' => 'Jl. Ahmad Yani', 'kelas' => 'TPPL-2C', 'tahun_akademik' => '2024', 'id_prodi' => 'TPPL'],
            ['NPM' => '230202023', 'nama_mahasiswa' => 'Ilham Budimansyah', 'alamat' => 'Jl. Benur', 'kelas' => 'TM-2B', 'tahun_akademik' => '2024', 'id_prodi' => 'MESIN'],
            ['NPM' => '230202024', 'nama_mahasiswa' => 'Yovi Tito Budianto', 'alamat' => 'Jl.Srandil', 'kelas' => 'TT-2A', 'tahun_akademik' => '2024', 'id_prodi' => 'TI'],
          ];

        $nilaiMahasiswa = [
            ['npm' => '21001', 'nilai' => 85],
            ['npm' => '21002', 'nilai' => 78],
            ['npm' => '21003', 'nilai' => 90],
        ];
      ?>
<!DOCTYPE html>
<html lang="en">
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

<div style="width: 100%; min-height: 90vh;display: flex; justify-content: center; align-items; margin-top:4rem;">
    <form style="width: 70%;" action="/display-nilai">
        <div class="mb-3">
    <label for="inputNilai" class="form-label">Nama</label>
    <input type="email" class="form-control" id="inputNilai" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="inputNPM" class="form-label">NPM</label>
    <input type="email" class="form-control" id="inputNPM" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="inputProdi" class="form-label">Prodi</label>
    <input type="email" class="form-control" id="inputProdi" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="inputJurusan" class="form-label">Jurusan</label>
    <input type="email" class="form-control" id="inputJurusan" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="inputJurusan" class="form-label">Kelas</label>
    <input type="email" class="form-control" id="inputJurusan" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<body>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\laragon\www\Sistem_Pengelolaan_Nilai_Mahasiswa\resources\views/form-nilai.blade.php ENDPATH**/ ?>