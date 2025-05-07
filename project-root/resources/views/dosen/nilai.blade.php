@extends('dosen.layout')
@section('content')
<h1 style="width: 100%; text-align: center; margin-top: 2rem;">DATA NILAI MAHASISWA</h1>
<div class="d-flex justify-content-end mx-5 mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputNilaiModal">
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
<div class="d-flex mt-4 justify-content-center">
    <table class="table border mx-5">
        <thead>
            <tr>
                <th scope="col">NPM</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Nama Prodi</th>
                <th scope="col">Nama Matkul</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Nilai Akhir</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{$item['NPM'] }}</td>
                <td>{{$item['nama_mahasiswa'] }}</td>
                <td>{{$item['nama_prodi'] }}</td>
                <td>{{$item['nama_matkul'] }}</td>
                <td>{{$item['nama_dosen'] }}</td>
                <td>{{$item['nilai_akhir'] }}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm"
                    onclick="openEditModal({{ $item['id_nilai'] }})">
                    <i class="bi bi-pencil-square"></i> Edit
                </button>
                
                
                <form action="{{ route('dosen.nilai-mahasiswa.destroy', $item['id_nilai']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<!-- Modal -->
<div class="modal fade" id="inputNilaiModal" tabindex="-1" aria-labelledby="inputNilaiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('dosen.nilai-mahasiswa.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="inputNilaiModalLabel">Input Nilai Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row g-3 px-4">
                    <div class="col-md-6">
                        <label for="NPM" class="form-label">Mahasiswa</label>
                        <select id="NPM" name="NPM" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Mahasiswa --</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="id_dosen" class="form-label">Dosen</label>

                        <input type="hidden" name="id_dosen" value="{{ session('user')['id_dosen'] }}">

                        <input type="text" class="form-control" value="{{ session('user')['nama_dosen'] }}" readonly>

                    </div>
                    <div class="col-md-4">
                        <label for="nilai_tugas" class="form-label">Nilai Tugas</label>
                        <input type="number" id="nilai_tugas" name="nilai_tugas" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-md-4">
                        <label for="nilai_uts" class="form-label">Nilai UTS</label>
                        <input type="number" id="nilai_uts" name="nilai_uts" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-md-4">
                        <label for="nilai_uas" class="form-label">Nilai UAS</label>
                        <input type="number" id="nilai_uas" name="nilai_uas" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-12">
                        <label for="id_matkul" class="form-label">Mata Kuliah</label>
                        <select id="id_matkul" name="id_matkul" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Mata Kuliah --</option>
                        </select>
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


<!-- Modal Edit -->
<div class="modal fade" id="editNilaiModal" tabindex="-1" aria-labelledby="editNilaiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editNilaiForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Nilai Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row g-3 px-4">
                    <input type="hidden" name="id_nilai" id="edit_id_nilai">
                    <input type='hidden' name="id_detail" id='edit_id_detail'>
                    <div class="col-md-6">
                        <label for="edit_NPM" class="form-label">Mahasiswa</label>
                        <select id="edit_NPM" name="NPM" class="form-select" required></select>
                    </div>
                    <div class="col-md-6">
                        <label for="edit_id_dosen" class="form-label">Dosen</label>
                        <input type="hidden" name="id_dosen" value="{{ session('user')['id_dosen'] }}">

                        <input type="text" class="form-control" value="{{ session('user')['nama_dosen'] }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="edit_nilai_tugas" class="form-label">Nilai Tugas</label>
                        <input type="number" id="edit_nilai_tugas" name="nilai_tugas" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-md-4">
                        <label for="edit_nilai_uts" class="form-label">Nilai UTS</label>
                        <input type="number" id="edit_nilai_uts" name="nilai_uts" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-md-4">
                        <label for="edit_nilai_uas" class="form-label">Nilai UAS</label>
                        <input type="number" id="edit_nilai_uas" name="nilai_uas" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-12">
                        <label for="edit_id_matkul" class="form-label">Mata Kuliah</label>
                        <select id="edit_id_matkul" name="id_matkul" class="form-select" required></select>
                    </div>
                </div>
                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    const idDosen = "{{ session('user')['id_dosen'] }}";

    document.addEventListener('DOMContentLoaded', function () {
        const loadData = (url, elementId, mapOption) => {
            fetch(url)
            .then(res => res.json())
            .then(data => {
                const dropdown = document.getElementById(elementId);
                data.data.forEach(item => {
                    const opt = document.createElement('option');
                    opt.value = item[mapOption.value];
                    opt.innerText = mapOption.text(item);
                    dropdown.appendChild(opt);
                });
            })
            .catch(err => console.error(`Error loading ${elementId}:`, err));
        };
        
        loadData('http://localhost:8080/api/mahasiswa', 'NPM', {
            value: 'NPM',
            text: m => `${m.NPM} - ${m.nama_mahasiswa}`
        });
        
        loadData(`http://localhost:8080/api/matkul/dosen/${idDosen}`, 'id_matkul', {
            value: 'id_matkul',
            text: m => m.nama_matkul
        });
        
        loadData('http://localhost:8080/api/mahasiswa', 'edit_NPM', {
            value: 'NPM',
            text: m => `${m.NPM} - ${m.nama_mahasiswa}`
        });
        
        
        loadData(`http://localhost:8080/api/matkul/dosen/${idDosen}`, 'edit_id_matkul', {
            value: 'id_matkul',
            text: m => m.nama_matkul
        });
    });
    
    function openEditModal(id) {
        Promise.all([
        fetchSelectOptions('http://localhost:8080/api/mahasiswa', 'edit_NPM', {
            value: 'NPM',
            text: m => `${m.NPM} - ${m.nama_mahasiswa}`
        }),
        fetchSelectOptions(`http://localhost:8080/api/matkul/dosen/${idDosen}`, 'edit_id_matkul', {
            value: 'id_matkul',
            text: m => m.nama_matkul
        })
        ]).then(() => {
            fetch(`http://localhost:8080/api/nilainilai/id/${id}`)
            .then(res => res.json())
            .then(res => {
                const data = res.data[0];
                
                document.getElementById('edit_id_nilai').value = data.id_nilai;
                document.getElementById('edit_id_detail').value = data.id_detail;
                document.getElementById('edit_nilai_tugas').value = data.nilai_tugas;
                document.getElementById('edit_nilai_uts').value = data.nilai_uts;
                document.getElementById('edit_nilai_uas').value = data.nilai_uas;
                
                document.getElementById('edit_NPM').value = data.NPM;
                document.getElementById('edit_id_matkul').value = data.id_matkul;
                
                document.getElementById('editNilaiForm').action = `/nilai-mahasiswa/${data.id_nilai}`;
                
                const modal = new bootstrap.Modal(document.getElementById('editNilaiModal'));
                modal.show();
            })
            .catch(err => console.error('Gagal ambil data nilai:', err));
        });
    }
    
    function fetchSelectOptions(url, elementId, mapOption) {
        return new Promise((resolve, reject) => {
            const selectElement = document.getElementById(elementId);
            
            if (selectElement.options.length > 1) {
                resolve();
                return;
            }
            
            fetch(url)
            .then(res => res.json())
            .then(data => {
                while (selectElement.options.length > 0) {
                    selectElement.remove(0);
                }
                
                const placeholderOpt = document.createElement('option');
                placeholderOpt.value = "";
                placeholderOpt.disabled = true;
                placeholderOpt.selected = true;
                placeholderOpt.textContent = "-- Pilih --";
                selectElement.appendChild(placeholderOpt);
                
                data.data.forEach(item => {
                    const opt = document.createElement('option');
                    opt.value = item[mapOption.value];
                    opt.textContent = mapOption.text(item);
                    selectElement.appendChild(opt);
                });
                
                resolve();
            })
            .catch(err => {
                console.error(`Error loading ${elementId}:`, err);
                reject(err);
            });
        });
    }
    
    
    
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>
@endsection