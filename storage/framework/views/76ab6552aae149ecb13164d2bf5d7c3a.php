<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">INPUT DATA MAHASISWA</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
        </div>
    </div>
</nav>

<?php if(session('success')): ?>
<p style="color: green;"><?php echo e(session('success')); ?></p>
<?php endif; ?>

<?php if(session('error')): ?>
<p style="color: red;"><?php echo e(session('error')); ?></p>
<?php endif; ?>

<div style="width: 100%; min-height: 90vh;display: flex; justify-content: center; align-items; margin-top:4rem;">
    <form style="width: 70%;" id="mahasiswaForm" action="<?php echo e(route('form.mahasiswa.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="inputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputNama" aria-describedby="emailHelp" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="inputNPM" class="form-label">NPM</label>
            <input type="text" class="form-control" id="inputNPM" aria-describedby="emailHelp" name="npm" required>
        </div>
        <div class="mb-3">
            <label for="inputAlamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="inputAlamat" aria-describedby="emailHelp" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="inputProdi" class="form-label">Prodi</label>
            <select class="form-select" id="inputProdi" name="id_prodi">
                <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item['id_prodi']); ?>"><?php echo e($item['nama_prodi']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="inputTahunAkademik" class="form-label" >Tahun Akademik</label>
            <input type="text" class="form-control" id="inputTahunAkademik" name="tahun_akademik" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="inputKelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="inputKelas" name="kelas" aria-describedby="emailHelp" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\laragon\www\Sistem_Pengelolaan_Nilai_Mahasiswa\resources\views/form-mahasiswa.blade.php ENDPATH**/ ?>