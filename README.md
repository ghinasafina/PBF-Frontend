### PBF-Frontend

### 1. Cara instal Laravel
```
* ### Buka CMD
composer create-project laravel/laravel nama-proyekmu
```

### 2. Cara clone project

```
git clone https://github.com/ghinasafina/PBF-Frontend.git

cd pbf-frontend/project-root

composer install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env` dan atur konfigurasi database:

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan dengan konfigurasinya

### 4. Jalankan Server Development

```bash
php artisan serve
```

Server akan berjalan di `[http://127.0.0.1:8000]`

### 5. Cuplikan Antarmuka

* ### Home Page
 ![WhatsApp Image 2025-05-16 at 10 34 46_9f34c106](https://github.com/user-attachments/assets/04f26d23-142a-4255-9658-f3480547ca35)


* ### Login Mahasiswa
  ![image](https://github.com/user-attachments/assets/6622db6a-b4fb-45c5-943f-13f327da0236)

* ### Login Dosen
  ![image](https://github.com/user-attachments/assets/67f3701c-39e3-4299-81b0-066a0d1765dd)

* ### Dashboard Mahasiswa
  ![image](https://github.com/user-attachments/assets/f18501ce-ea52-4b7f-8d4f-cea93430822b)

* ### Dashboard Dosen
  ![image](https://github.com/user-attachments/assets/c19c2e2d-18b0-40b2-8d43-252d069e9c5a)

* ### Dashboard Mata Kuliah
  ![image](https://github.com/user-attachments/assets/003bfc82-8002-45b1-858a-de91a23e15a3)

* ### CRUD Table Mahasiswa
  ![image](https://github.com/user-attachments/assets/779f4bd1-18fb-4f7a-aadb-8f34e6c7e035)

* ### CRUD Table Mata Kuliah
  ![image](https://github.com/user-attachments/assets/f9594b6f-977a-4204-81a4-082e1b9a7e97)
  
### 6. Membuat Login & Dashboard

* Login Mahasiswa
```PHP
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .login-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .btn-login {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            
            <h3 class="login-title">Login Mahasiswa</h3>
            
            <form method="POST" action="{{ route('login.mahasiswa') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" class="form-control" id="npm" name="npm" required>
                </div>
                
                {{-- <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div> --}}
                
                <button type="submit" class="btn btn-primary btn-login">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

* Dashboard Awal
```PHP
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

</html>
```
* Dashboard Awal
```PHP
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
      background-color: #f8f9fa;
    }

    .title {
      text-align: center;
      font-weight: bold;
      margin-top: 30px;
      font-size: 28px;
    }

    .menu-card {
      width: 100%;
      max-width: 500px;
      margin-top: 20px;
      transition: transform 0.3s ease;
    }

    .menu-card:hover {
      transform: scale(1.05);
    }

    .card-body {
      text-align: center;
      color: white;
    }

    a {
      text-decoration: none;
    }

    a:hover {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="title">SISTEM PENGELOLAAN NILAI MAHASISWA</div>

  <div class="menu-card">
    <div class="card bg-primary text-white">
      <a href="/login-mahasiswa">
        <div class="card-body">
          <h5>Mahasiswa</h5>
          <h3>Login Sebagai Mahasiswa</h3>
        </div>
      </a>
    </div>
  </div>

  <div class="menu-card">
    <div class="card bg-success text-white">
      <a href="/login-dosen">
        <div class="card-body">
          <h5>Dosen</h5>
          <h3>Login Sebagai Dosen</h3>
        </div>
      </a>
    </div>
  </div>

  <div class="menu-card">
    <div class="card bg-warning text-white">
      <a href="/mata-kuliah">
        <div class="card-body">
          <h5>Mata Kuliah</h5>
          <h3>Keseluruhan Matkul</h3>
        </div>
      </a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

* ### Lisensi
  Repositori ini dibuat untuk kepentingan edukasi dan tugas mata kuliah Pemrograman Berbasis Framework (PBF). Bebas digunakan untuk belajar dan pengembangan pribadi.


