@extends('dosen.layout')
@section('content')
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
        @foreach($data['data'] as $item)
        <tr>
          <td>{{$item['id_dosen'] }}</td>
          <td>{{$item['nama_dosen'] }}</td>
          <td>{{$item['email'] }}</td>
          <td>{{$item['no_telp'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>
@endsection