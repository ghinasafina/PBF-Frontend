<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Display Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">DATA MAHASISWA</a>
  </div>
</nav>
<body>
  <h1 style="width: 100%; text-align: center; margin-top: 4rem;">DATA MAHASISWA</h1>
  <div style="width: 100vw;display : flex; justify-content: center; align-items: center;">
    <table class="table mt-5 border" style="width: 70%;">
      <thead>
        <tr>
          <th scope="col">NPM</th>
          <th scope="col">Nama</th>
          <th scope="col">Alamat</th>
          <th scope="col">Kelas</th>
          <th scope="col">Tahun Akademik</th>
          <th scope="col">Prodi</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($item['NPM']); ?>

                </td>
                <td>
                    <a href="/display-nilai/<?php echo e($item['NPM']); ?>">
                        <?php echo e($item['nama_mahasiswa']); ?>

                    </a>
                </td>
                <td>
                    <?php echo e($item['alamat']); ?>

                </td>
                <td>
                    <?php echo e($item['kelas']); ?>

                </td>
                <td>
                    <?php echo e($item['tahun_akademik']); ?>

                </td>
                <td>
                    <?php echo e($item['id_prodi']); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\laragon\www\Sistem_Pengelolaan_Nilai_Mahasiswa\resources\views/display-mahasiswa.blade.php ENDPATH**/ ?>