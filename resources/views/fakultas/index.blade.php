{{-- @include("layout.header") --}}

@extends("layout.master")
@section('title', 'Halaman Fakultas')

@section("content")
<h1>Fakultas</h1>
<ol>
    @foreach ($fakultas as $key => $value)
        <li>{{ $value->nama }}
            <br/>
            Email : {{ $value->email }}<br/>
            Kode : {{ $value->kode }}<br/>
            Prodi : 
            @foreach ($value->prodi as $p => $v)
                - {{ $v->nama_prodi }} <br/>
            @endforeach
            <a href="{{route('detailfakultas', [$value->id])}}">
                Detail
            </a>
        </li>
    @endforeach
</ol>
@endsection

{{-- @include("layout.footer") --}}