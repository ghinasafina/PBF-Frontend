@extends('layouts.app')

@section('content')
<div class="container">
    <h4>DATA NILAI MAHASISWA</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3" onclick="showData('mahasiswa')">
                <div class="card-header">Total Mahasiswa</div>
                <div class="card-body">
                    <h3>{{ count($mahasiswa) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3" onclick="showData('dosen')">
                <div class="card-header">Total Dosen</div>
                <div class="card-body">
                    <h3>{{ count($dosen) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3" onclick="showData('matakuliah')">
                <div class="card-header">Total Mata Kuliah</div>
                <div class="card-body">
                    <h3>{{ count($mataKuliah) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3" onclick="showData('nilai')">
                <div class="card-header">Rata-rata Nilai</div>
                <div class="card-body">
                    <h3>{{ number_format($rataRataNilai, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Area untuk Menampilkan Data Detail -->
    <div id="detailData" class="mt-4"></div>
</div>

<script>
    function showData(type) {
        let data = '';

        switch(type) {
            case 'mahasiswa':
                data = `<h5>Daftar Mahasiswa</h5>
                        <ul>
                            @foreach($mahasiswa as $m)
                                <li>{{ $m['npm'] }} - {{ $m['nama'] }} ({{ $m['kelas'] }})</li>
                            @endforeach
                        </ul>`;
                break;

            case 'dosen':
                data = `<h5>Daftar Dosen</h5>
                        <ul>
                            @foreach($dosen as $d)
                                <li>{{ $d['id_dosen'] }} - {{ $d['nama'] }}</li>
                            @endforeach
                        </ul>`;
                break;

            case 'matakuliah':
                data = `<h5>Daftar Mata Kuliah</h5>
                        <ul>
                            @foreach($mataKuliah as $mk)
                                <li>{{ $mk['id_matkul'] }} - {{ $mk['nama'] }} ({{ $mk['sks'] }} SKS)</li>
                            @endforeach
                        </ul>`;
                break;

            case 'nilai':
                data = `<h5>Nilai Mahasiswa</h5>
                        <ul>
                            @foreach($nilaiMahasiswa as $n)
                                <li>{{ $n['npm'] }} - Nilai: {{ $n['nilai'] }}</li>
                            @endforeach
                        </ul>`;
                break;
        }

        document.getElementById('detailData').innerHTML = data;
    }
</script>
@endsection
