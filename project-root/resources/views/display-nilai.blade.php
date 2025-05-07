<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nilai Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand" href="#">Data Nilai Mahasiswa</a>
      
      <a href="/" class="btn btn-light btn-sm">Logout</a>
      
    </div>
  </nav>
  
  <div class="container mt-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mb-4 text-center text-primary">Profil Mahasiswa</h4>
        <div class="row mb-3">
          <div class="col-md-6"><strong>Nama:</strong> {{ $dataMahasiswa['nama_mahasiswa'] }}</div>
          <div class="col-md-6"><strong>NPM:</strong> {{ $dataMahasiswa['NPM'] }}</div>
          <div class="col-md-6"><strong>Kelas:</strong> {{ $dataMahasiswa['kelas'] }}</div>
          <div class="col-md-6"><strong>Prodi:</strong> {{ $dataMahasiswa['id_prodi'] }}</div>
          <div class="col-md-6"><strong>Tahun Akademik:</strong> {{ $dataMahasiswa['tahun_akademik'] }}</div>
        </div>
        
        <h5 class="mt-4 mb-3 text-primary">Daftar Nilai</h5>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-primary">
              <tr>
                <th>Mata Kuliah</th>
                <th>Nilai Akhir</th>
              </tr>
            </thead>
            <tbody>
              @if (!empty($dataNilai['data']))
              @foreach ($dataNilai['data'] as $data)
              <tr>
                <td>{{ $data['nama_matkul'] }}</td>
                <td>{{ $data['nilai_akhir'] }}</td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="2">Tidak ada nilai</td>
              </tr>
              @endif
              
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
