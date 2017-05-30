@extends('template.template')
@section('content')

<div class="row mt">
    @if(count($errors)>0)
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif

    <form action="/liblary" method="post" enctype="multipart/form-data">


        <input type="text" name="isbn" value="" placeholder="isbn"><br>
        <input type="text" name="nama_buku" value="" placeholder="nama_buku"><br>
        <input type="file" name="foto_buku" value="" placeholder="foto_buku"><br>
        <input type="text" name="pengarang" value="" placeholder="pengarang"><br>
        <input type="text" name="penerbit" value="" placeholder="penerbit"><br>
        <input type="text" name="thn_terbit" value="" placeholder="thn_terbit"><br>
        <input type="text" name="jenis" value="" placeholder="jenis"><br>
        <input type="text" name="jml_buku" value="" placeholder="jml_buku"><br>
        <input type="submit" value="post">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>
</div>

@stop