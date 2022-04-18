{{-- @include("layout.header") --}}

@extends("layout.master")
@section('title', 'Halaman Program Studi')

@section("content")
<h1>Program Studi</h1>
<ol>
    @foreach ($programstudi as $key => $value)
        <li>
            {{ $value->nama_prodi }} <br>
            Fakultas : {{ $value->fakultas->nama }} 
        </li>
    @endforeach
</ol>
@endsection

{{-- @include("layout.footer") --}}