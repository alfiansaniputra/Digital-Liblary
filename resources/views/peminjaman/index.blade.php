@extends('template.template')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel" id="konten-tengah">
        <h4> <center> <b>LIST BUKU PERPUSTAKAAN SMKN 13</b> </center></h4> <hr style="margin: 0px 20px 20px 20px;">
		<a href="/create" class="btn btn-info" style="margin-left: 20px;">Input Buku</a>
		  <div class="fixfix" style="margin: 20px;">
   		   <div class="table-responsive">
	        <table class="table table-borderless" id="table">
	          <tr>
	              <th>NO</th>
	              <th> Nama Peminjam </th>
	              <th> Kelas </th>
	              <th> No HP</th>
	              <th> Nama Buku </th>
	              <th> Jumlah </th>
	              <th> Tahun Terbit</th>
	              <th> Tgl Pinjam </th>
	              <th> Tgl Kembali </th>
	              <th> Kode Vocher </th>
	              <th> Action</th>
	          </tr>
	          	{{ csrf_field() }}

	          <?php $no=1; ?>
	          @foreach($peminjaman as $peminjaman)
	          <tr class="item{{$buku->id}}">
	              <td>{{ $no++ }}</td>
	              <td><a href="basic_table.html#"><a href="/liblary/{{$buku->slug}}"><p> {{ $peminjaman->nama_peminjam }} </p></a></a></td>
	              <td>{{ $peminjaman->kelas_peminjam }}</td>
	              <td>{{ $peminjaman->no_kontak }}</td>
	              <td>{{ $peminjaman->buku->nama_buku}}</td>
	              <td>{{ $peminjaman->jml_pinjam }}</td>
	              <td>{{ $peminjaman->tgl_pinjam }}</td>
	              <td><span class="label label-info label-mini" style="text-align: center;">{{ $peminjaman->tgl_kembali  }}</span></td>
	              <td>{{ $peminjaman->vocher }}</td>
	              <td>
						<button class="edit-modal btn btn-primary btn-xs" data-id="{{$buku->id}}" data-isbn="{{$buku->isbn}}" data-nama_buku="{{$buku->nama_buku}}" data-slug="{{$buku->slug}}" data-foto_buku="{{$buku->foto_buku}}" data-pengarang="{{$buku->pengarang}}" data-penerbit="{{$buku->penerbit}}" data-thn_terbit="{{$buku->thn_terbit}}" data-jenis="{{$buku->jenis}}" data-jml_buku="{{$buku->jml_buku}}" data-timestamps="{{$buku->timestamps}}">
	    					<i class='fa fa-pencil' style="color: white"></i>
	    				</button>


						<button class="delete-modal btn btn-danger btn-xs" data-id="{{$peminjaman->nama_peminjam}}" data-isbn="{{$peminjaman->kelas_peminjam }}" data-nama_buku="{{$peminjaman->no_kontak}}" data-slug="{{$peminjaman->buku->nama_buku}}" data-foto_buku="{{$peminjaman->jml_pinjam}}" data-pengarang="{{$peminjaman->tgl_pinjam}}" data-penerbit="{{$peminjaman->tgl_kembali}}" data-thn_terbit="{{$peminjaman->voucher}}">
	              			<span class="glyphicon glyphicon-trash"></span>
	            		</button>
	              </td>
	          </tr>
	     	@endforeach
	    </table>
				</div><!--end tabel resvonsive-->
				</div><!--end fix fix-->
				</div><!-- /content-panel -->
			</div><!-- /col-md-12 -->
		</div><!-- /row -->
	</div>
</div><!-- row -->

<!--============================= START MODAL =============================-->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">


    <form class="form-horizontal" role="form">
       <input type="text" id="isbn" name="isbn" value="" placeholder="isbn"  class="form-control placeholder-no-fix"> <br>
              <input type="text" id="nama_buku" name="nama_buku" value="" placeholder="nama buku"  class="form-control placeholder-no-fix"> <br>
              <input type="text" id="foto_buku" name="foto_buku" value="" placeholder="foto buku"  class="form-control placeholder-no-fix"><br>
              <input type="text" id="pengarang" name="pengarang" value="" placeholder="pengarang"  class="form-control placeholder-no-fix"><br>
              <input type="text" id="penerbit" name="penerbit" value="" placeholder="penerbit"  class="form-control placeholder-no-fix"><br>
              <input type="text" id="thn_terbit" name="thn_terbit" value="" placeholder="tahun terbit"  class="form-control placeholder-no-fix">

            <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="buku_sekolah"
            >buku sekolah</label>
            <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="majalah">majalah</label>
            <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="komik">komik</label>
            <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="tips">tips</label>
            <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="novel">novel</label>
            <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="kamus">kamus</label>
            <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="karya_siswa" 
            <?php if ($buku['jenis'] == "karya_siswa") {echo "checked"; } ?>
            >karya_siswa</label>

            <input type="text" name="jml_buku" value="" id="jml_buku" placeholder="jumlah buku"  class="form-control placeholder-no-fix">
    </form>



      <div class="deleteContent">
        Are you Sure you want to delete <span class="title"></span> ?
        <span class="hidden id"></span>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Close
            </button>
          </div>
        </div>
      </div>
     </div>
  </div>
<!--============================= END MODAL =============================-->
@stop