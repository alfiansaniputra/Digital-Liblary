<?php

namespace App\Http\Controllers;
use App\Buku;
use App\Peminjaman;
use Auth;
use Input;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $bukus = Buku::all();
         return view('buku.index',['buku' => $bukus]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('buku.create');
        return redirect('buku');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
           'isbn' => 'required', 'nama_buku' => 'required', 'foto_buku' => 'required', 'pengarang' => 'required', 'penerbit' => 'required', 'thn_terbit' => 'required', 'jenis' => 'required', 'jml_buku' => 'required', 
        ]);
        
        $buku = new Buku;
        $buku->isbn         = $request->isbn;
        $buku->nama_buku    = $request->nama_buku;
        $buku->foto_buku    = $request->foto_buku;
        $buku->pengarang    = $request->pengarang;
        $buku->penerbit     = $request->penerbit;
        $buku->thn_terbit   = $request->thn_terbit;
        $buku->jenis        = $request->jenis;
        $buku->jml_buku     = $request->jml_buku;
        $buku->slug         = str_slug($request->nama_buku, '-');

        $buku->save();
        return redirect('liblary');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($namabuku)
    {
        $buku= Buku::where('slug', $namabuku)->first();
        if ($buku == null) {
           abort(404);
        }
        return view('buku.singgle')->with('buku',$buku);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($namabuku)
    {
         $buku= Buku::where('slug', $namabuku)->first();
        if(!$buku){
            abort(404);
        }
        
        return view('buku.edit')->with('buku', $buku);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $namabuku)
    {
        $this->validate($request, [
           'isbn' => 'required', 'nama_buku' => 'required', 'foto_buku' => 'required', 'pengarang' => 'required', 'penerbit' => 'required', 'thn_terbit' => 'required', 'jenis' => 'required', 'jml_buku' => 'required', 
        ]);
        
        $buku= Buku::where('slug', $namabuku)->first();

        $buku->isbn = $request->isbn;
        $buku->nama_buku = $request->nama_buku;
        $buku->foto_buku = $request->foto_buku;
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->thn_terbit = $request->thn_terbit;
        $buku->jenis = $request->jenis;
        $buku->jml_buku = $request->jml_buku;
        $buku->slug         = str_slug($request->nama_buku, '-');
        
        $buku->save();
        return redirect('liblary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku ->delete();
    }

    // FUNGSI CREATE //
    public function addItem(Request $req) {
      $rules = array(
        'isbn' => 'required', 'nama_buku' => 'required', 'foto_buku' => 'required', 'pengarang' => 'required', 'penerbit' => 'required', 'thn_terbit' => 'required', 'jenis' => 'required', 'jml_buku' => 'required'
      );
      // for Validator
      $validator = Validator::make ( Input::all (), $rules );
      if ($validator->fails())
      return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

      else {
        
        $buku = new Buku;
        $buku->isbn         = $req->isbn;
        $buku->nama_buku    = $req->nama_buku;
        $buku->foto_buku    = $req->foto_buku;
        $buku->pengarang    = $req->pengarang;
        $buku->penerbit     = $req->penerbit;
        $buku->thn_terbit   = $req->thn_terbit;
        $buku->jenis        = $req->jenis;
        $buku->jml_buku     = $req->jml_buku;
        $buku->slug         = str_slug($req->nama_buku, '-');

        $buku->save();
        return response()->json($buku);
      }
    }


    // edit data function
      public function editItem(Request $req) {
      $buku = Buku::find ($req->id);
        $buku->isbn         = $req->isbn;
        $buku->nama_buku    = $req->nama_buku;
        $buku->foto_buku    = $req->foto_buku;
        $buku->pengarang    = $req->pengarang;
        $buku->penerbit     = $req->penerbit;
        $buku->thn_terbit   = $req->thn_terbit;
        $buku->jenis        = $req->jenis;
        $buku->jml_buku     = $req->jml_buku;
        $buku->slug         = str_slug($req->nama_buku, '-');
        $buku->save();
        return response()->json($buku);
    }



    public function deleteItem(Request $req) {
      Buku::find($req->id)->delete();
      return response()->json();
    }

    public function peminjaman(Request $request)
    {
        peminjaman::create($request->all());
        return $request->all();
        return view('peminjaman.index');

    }

}
