{{-- @include("layout.header") --}}

@extends("layout.master")
@section('title', 'Halaman Fakultas')

@section("content")
<h1>Detail Fakultas</h1>
Fakultas ID = {{ $fakultas->id }}<br/>
Nama Fakultas  = {{ $fakultas->nama }}<br/>
@endsection

{{-- @include("layout.footer") --}}