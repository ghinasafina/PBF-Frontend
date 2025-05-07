@extends('dosen.layout')
@section('content')
<h1 style="width: 100%; text-align: center; margin-top: 2rem;">DATA MATKUL</h1>

<div class="d-flex justify-content-end mx-5 mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputMatkulModal">
        Tambah Data
    </button>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show mx-5" role="alert">
    {{ session('error') }}
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-center mx-5">
    <table class="table border">
        <thead>
            <tr>
                <th scope="col">Kode Mata Kuliah</th>
                <th scope="col">Nama Mata Kuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Semester</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $matkul)
            <tr>
                <td>{{ $matkul['id_matkul'] }}</td>
                <td>{{ $matkul['nama_matkul'] }}</td>
                <td>{{ $matkul['sks'] }}</td>
                <td>{{ $matkul['semester'] }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editMatkulModal"
                    data-id="{{ $matkul['id_matkul'] }}"
                    data-nama="{{ $matkul['nama_matkul'] }}"
                    data-sks="{{ $matkul['sks'] }}"
                    data-semester="{{ $matkul['semester'] }}">
                    Edit
                </button>
                <form action="{{ route('dosen.matkul.destroy', $matkul['id_matkul']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus matkul ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>

</div>

<div class="modal fade" id="inputMatkulModal" tabindex="-1" aria-labelledby="inputMatkulModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('dosen.matkul.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="inputNilaiModalLabel">Input Nilai Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row g-2 px-4">
                    
                    <div class="col-md-6">
                        <label for="id_dosen" class="form-label">Dosen</label>
                        <input type="hidden" name="id_dosen" value="{{ session('user')['id_dosen'] }}">
                        <input type="text" class="form-control" value="{{ session('user')['nama_dosen'] }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="id_matkul" class="form-label">Kode Matkul</label>
                        <input type="text" id="id_matkul" name="id_matkul" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_matkul" class="form-label">Nama Matkul</label>
                        <input type="text" id="nama_matkul" name="nama_matkul" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="number" id="sks" name="sks" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-12">
                        <label for="semester" class="form-label">Semester</label>
                        <input type="number" id="semester" name="semester" class="form-control" min="0" max="14" required>
                    </div>
                </div>
                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editMatkulModal" tabindex="-1" aria-labelledby="editMatkulModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="formEditMatkul" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title">Edit Mata Kuliah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row g-2 px-4">
            <input type="hidden" name="id_dosen" value="{{ session('user')['id_dosen'] }}">
            <div class="col-md-6">
                <label class="form-label">Dosen</label>
                <input type="text" id="edit_dosen" class="form-control" value="{{ session('user')['nama_dosen'] }}" readonly>
            </div>  
            <div class="col-md-6">
              <label class="form-label">Kode Matkul</label>
              <input type="text" id="edit_id_matkul" name="id_matkul" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Nama Matkul</label>
              <input type="text" id="edit_nama_matkul" name="nama_matkul" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">SKS</label>
              <input type="number" id="edit_sks" name="sks" class="form-control" required>
            </div>
            <div class="col-12">
              <label class="form-label">Semester</label>
              <input type="number" id="edit_semester" name="semester" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer px-4">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editModal = document.getElementById('editMatkulModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
    
            const id = button.getAttribute('data-id');
            const nama = button.getAttribute('data-nama');
            const sks = button.getAttribute('data-sks');
            const semester = button.getAttribute('data-semester');
    
            document.getElementById('edit_id_matkul').value = id;
            document.getElementById('edit_nama_matkul').value = nama;
            document.getElementById('edit_sks').value = sks;
            document.getElementById('edit_semester').value = semester;
    
            // Ganti action form edit
            document.getElementById('formEditMatkul').action = `/matkul-dosen/${id}`;
        });
    });
    </script>    
@endsection