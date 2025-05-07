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
          <div class="col-md-6"><strong>Nama:</strong> <?php echo e($dataMahasiswa['nama_mahasiswa']); ?></div>
          <div class="col-md-6"><strong>NPM:</strong> <?php echo e($dataMahasiswa['NPM']); ?></div>
          <div class="col-md-6"><strong>Kelas:</strong> <?php echo e($dataMahasiswa['kelas']); ?></div>
          <div class="col-md-6"><strong>Prodi:</strong> <?php echo e($dataMahasiswa['id_prodi']); ?></div>
          <div class="col-md-6"><strong>Tahun Akademik:</strong> <?php echo e($dataMahasiswa['tahun_akademik']); ?></div>
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
              <?php if(!empty($dataNilai['data'])): ?>
              <?php $__currentLoopData = $dataNilai['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($data['nama_matkul']); ?></td>
                <td><?php echo e($data['nilai_akhir']); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <tr>
                <td colspan="2">Tidak ada nilai</td>
              </tr>
              <?php endif; ?>
              
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\TUGAS KULIAH\PBF\Front _Sistem_Pengelolaan_Nilai_Mahasiswa\resources\views/display-nilai.blade.php ENDPATH**/ ?>