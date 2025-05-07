<?php $__env->startSection('content'); ?>
  <h1 style="width: 100%; text-align: center; margin-top: 2rem;">DATA DOSEN</h1>
  <div class="d-flex mt-4 justify-content-center">
    <table class="table border mx-5">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dosen.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\TUGAS KULIAH\PBF\Front _Sistem_Pengelolaan_Nilai_Mahasiswa\resources\views/display-dosen.blade.php ENDPATH**/ ?>