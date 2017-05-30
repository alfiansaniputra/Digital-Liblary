@extends('template.template')
@section('content')
<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">

	<h1>{{$buku->slug}}</h1>
 	<p> {{ $buku->isbn}} </p>
    <p> {{ $buku->nama_buku}} </p>
    <p> {{ $buku->foto_buku}} </p>
    <p> {{ $buku->pengarang}} </p>
    <p> {{ $buku->penerbit}} </p>
    <p> {{ $buku->thn_terbit}} </p>
    <p> {{ $buku->jenis}} </p>
	<p> {{ $buku->jml_buku}} </p>



</div></div></div>
@endsection