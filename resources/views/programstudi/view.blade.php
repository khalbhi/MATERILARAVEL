{{-- @include("layout.header") --}}

@extends("layout.master")
@section('title', 'Halaman Detail Program Studi')

@section("content")
<h1>Detail Program Studi</h1>
ID Prodi = {{ $programstudi->id }}<br/>
Kode Prodi = {{ $programstudi->kode_prodi }}<br/>
Nama Prodi = {{ $programstudi->nama_prodi }}
@endsection

{{-- @include("layout.footer") --}}