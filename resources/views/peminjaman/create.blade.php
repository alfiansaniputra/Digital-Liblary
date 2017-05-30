@extends('template.template')
@section('content')
    <div class="row mt">
        <form action="/peminjaman" method="post">

            <input type="text" name="nama_peminjam" value="" placeholder="nama_peminjam"><br>
            <input type="text" name="kelas_peminjam" value="" placeholder="kelas_peminjam"><br>
            <input type="text" name="no_kontak" value="" placeholder="no_kontak"><br>
            <input type="text" name="isbn" value="" placeholder="isbn"><br>
            <input type="text" name="jml_pinjam" value="" placeholder="jml_pinjam"><br>
            <input type="text" name="tgl_pinjam" value="" placeholder="tgl_pinjam"><br>
            <input type="text" name="tgl_kembali" value="" placeholder="tgl_kembali"><br>
            <input type="text" name="voucher" value="" placeholder="voucher"><br>
            <input type="submit" value="post">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">


        </form>
    </div>
@stop