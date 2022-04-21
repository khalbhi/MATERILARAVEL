@extends("layout.master")
@section('title', "Halaman Tambah Program Studi")

@section("content")
    <h1>Form Tambah Program Studi</h1>
    @if (session()->has('info'))
        <div class="alert alert-success">
            {{ session()->get('info') }}
        </div>
    @endif
    <form action="{{ url('programstudi/store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="kode">Kode Prodi</label>
            <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Program Studi" class="form-control" value="{{ old('kode')}}">
            @error('kode')
                <div class="text-danger"> {{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama Prodi</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Program Studi" class="form-control" value="{{ old('nama')}}">
            @error('nama')
                <div class="text-danger"> {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection