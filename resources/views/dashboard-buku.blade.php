@extends('template.template')
@section('content')

<div class="row">
    <div class="col-md-12">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4> <center> <b>LIST BUKU PERPUSTAKAAN SMKN 13</b> </center></h4>

      <a href="#myModal"  data-toggle="modal" class="btn btn-info" style="margin-left: 20px;">Input Buku</a>
                            <hr>
                              <thead>
                              <tr>
                                  <th>NO</th>
                                  <th><i class="icon-certificate"></i>ISBN</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Nama Buku</th>
                                  <th><i class="fa fa-bookmark"></i> pengarang</th>
                                  <th><i class=" fa fa-edit"></i> Penerbit</th>
                                  <th><i class=" fa fa-edit"></i> Jenis</th>
                                  <th><i class=" fa fa-edit"></i> Tahun Terbit</th>
                                  <th><i class=" fa fa-edit"></i> Stock Buku</th>
                                  <th><i class=" fa fa-edit"></i> Foto Buku</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                              </tr>
                              </thead>

                              <tbody>
                              <?php $no=1; ?>
                        @foreach($buku as $buku)
                              <tr>
                                  <td>{{$no++}}</td>
                                  <td><a href="basic_table.html#"><a href="/liblary/{{$buku->slug}}"><p> {{ $buku->isbn}} </p></a></a></td>
                                  <td class="hidden-phone">{{ $buku->nama_buku}}</td>
                                  <td>{{ $buku->pengarang}}</td>
                                  <td>{{ $buku->penerbit}}</td>
                                  <td>{{ $buku->jenis}}</td>
                                  <td>{{ $buku->thn_terbit}}</td>
                                  <td><span class="label label-info label-mini" style="text-align: center;">{{ $buku->jml_buku }}</span></td>
                                  <td>{{ $buku->foto_buku}}</td>
                                  <td>

    <button class="btn btn-primary btn-xs">
    
<a href="/liblary/{{$buku->slug}}"><i class='fa fa-pencil' style="color: white"></i></a> 
    </button>


  <form action="/liblary/{{$buku->id}}" method="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="delete" name="_method">
  <button class="btn btn-danger btn-xs" type="submit" value="delete" ><i class="fa fa-trash-o "></i></button>

    </form>


                                  </td>
                              </tr>
  @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
        </div>
</div><!-- row -->



<!--start modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title"><center>Input Buku Baru</center></h4>
                </div>
                <div class="modal-body">
                    <p>Silahkan masukan Data Buku yang sesuai</p>
                    <form class="form-horizontal" role="form" method="POST">
                    <input type="text" id="isbn" name="isbn" value="" placeholder="isbn"  class="form-control placeholder-no-fix"> <br>
                    <input type="text" id="nama_buku" name="nama_buku" value="" placeholder="nama buku"  class="form-control placeholder-no-fix"> <br>
                    <input type="text" id="foto_buku" name="foto_buku" value="" placeholder="foto buku"  class="form-control placeholder-no-fix"><br>
                    <input type="text" id="pengarang" name="pengarang" value="" placeholder="pengarang"  class="form-control placeholder-no-fix"><br>
                    <input type="text" id="penerbit" name="penerbit" value="" placeholder="penerbit"  class="form-control placeholder-no-fix"><br>
                    <input type="text" id="thn_terbit" name="thn_terbit" value="" placeholder="tahun terbit"  class="form-control placeholder-no-fix"><br>

                  <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="buku_sekolah">buku_sekolah</label>
                  <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="majalah">majalah</label>
                  <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="komik">komik</label>
                  <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="tips">tips</label>
                  <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="novel">novel</label>
                  <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="kamus">kamus</label>
                  <label class="radio-inline"><input type="radio" name="jenis" id="jenis" value="karya_siswa">karya_siswa</label>

                    <input type="text" name="jml_buku" value="" id="jml_buku" placeholder="jumlah buku"  class="form-control placeholder-no-fix"><br>
                  </form>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-theme" type="submit" value="submit" id="add">Submit</button>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                </div>
            </div>
        </div>
    </div>
<!--end modal -->
 
@stop



       
