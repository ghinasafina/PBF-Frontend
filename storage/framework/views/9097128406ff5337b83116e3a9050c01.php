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
    <a class="navbar-brand" href="/">DATA DOSEN</a>
  </div>
</nav>
<body>
  <h1 style="width: 100%; text-align: center; margin-top: 4rem;">DATA DOSEN</h1>
  <div style="width: 100vw;display : flex; justify-content: center; align-items: center;">
    <table class="table mt-5 border" style="width: 70%;">
      <thead>
        <tr>
          <th scope="col">Kode Dosen</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">No. Telp</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($item['id_dosen']); ?></td>
            <td><?php echo e($item['nama_dosen']); ?></td>
            <td><?php echo e($item['email']); ?></td>
            <td><?php echo e($item['no_telp']); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\laragon\www\Sistem_Pengelolaan_Nilai_Mahasiswa\resources\views/display-dosen.blade.php ENDPATH**/ ?>