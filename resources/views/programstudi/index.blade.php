{{-- @include("layout.header") --}}

@extends("layout.master")
@section('title', 'Halaman Program Studi')

@section("content")
<h1>Program Studi</h1>
<div class = "row pt-4">
        <div class="col">
            <h2>Daftar Prodi</h2>

            @if (session()->has('info'))
                <div class="alert alert-success">
                    {{ session()->get('info') }}
                </div>
            @endif
            
            <div class = "d-md-flex justify-content-md-end">
                <a href="{{ route('programstudi.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Prodi</th>
                        <th>Fakultas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programstudi as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->kode_prodi }}</td>
                            <td>{{ $item->nama_prodi }}</td>
                            <td>{{ $item->fakultas->nama }}</td>
                            <td>
                                <a href="{{ url('/programstudi/detail/'.$item->id) }}" class="btn btn-warning">Detail</a>
                                <form action="{{ url('/programstudi/delete/'.$item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>                                
                                <a href="{{ url('/programstudi/edit/'.$item->id) }}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{-- @include("layout.footer") --}}