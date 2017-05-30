<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
	protected $table = 'peminjaman';

	public function Buku ()
	{
    	
    	return $this->belongsTo('App\Buku');
    }
}
