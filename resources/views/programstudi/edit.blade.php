@extends("layout.master")
@section('title', "Halaman Edit Program Studi")

@section("content")
    <h1>Form Edit Program Studi</h1>
    @if (session()->has('info'))
        <div class="alert alert-success">
            {{ session()->get('info') }}
        </div>
    @endif
    <form action="{{ url('programstudi/update/'. $programstudi->id) }}" method="post">
        @csrf
        @method("PATCH")
        
        <div class="form-group">
            <label for="kode">Kode Prodi</label>
            <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Program Studi" class="form-control" value="{{ old('kode') ?? $programstudi->kode_prodi }}">
            @error('kode')
                <div class="text-danger"> {{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama Prodi</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Program Studi" class="form-control" value="{{ old('nama') ?? $programstudi->nama_prodi}}">
            @error('nama')
                <div class="text-danger"> {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection