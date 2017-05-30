<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn');
            $table->string('nama_buku',200);
            $table->string('slug');
            $table->string('foto_buku');
            $table->string('pengarang',100);
            $table->string('penerbit',50);
            $table->integer('thn_terbit');
            $table->enum('jenis', ['buku_sekolah', 'majalah', 'komik', 'tips', 'novel', 'kamus', 'karya_siswa', 'lainya']);
            $table->integer('jml_buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('buku');
    }
}