@extends("layout.master")
@section('title', "Halaman Tambah Program Studi")

@section("content")
    <h1>Form Tambah Program Studi</h1>
    <form action="{{ url('programstudi/store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Prodi</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Program Studi" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection