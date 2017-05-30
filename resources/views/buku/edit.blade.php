@extends('template.template')
@section('content')


@if(count($errors)>0)
    <ul>
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif

<h1>CREATE</h1>

<form action="/liblary/{{$buku->slug}}" method="post">
    <input type="text" name="isbn" value="{{$buku->isbn}}" placeholder="isbn"><br>
    <input type="text" name="nama_buku" value="{{$buku->nama_buku}}" placeholder="nama_buku"><br>
    <input type="text" name="foto_buku" value="{{$buku->foto_buku}}" placeholder="foto_buku"><br>
    <input type="text" name="pengarang" value="{{$buku->pengarang}}" placeholder="pengarang"><br>
    <input type="text" name="penerbit" value="{{$buku->penerbit}}" placeholder="penerbit"><br>
    <input type="text" name="thn_terbit" value="{{$buku->thn_terbit}}" placeholder="thn_terbit"><br>
    <input type="text" name="jenis" value="{{$buku->jenis}}" placeholder="jenis"><br>
    <input type="text" name="jml_buku" value="{{$buku->jml_buku}}" placeholder="jml_buku"><br>
	<input type="submit" value="edit">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="put" name="_method">
</form>


@stop