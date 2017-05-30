<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_peminjam');
            $table->string('kelas_peminjam');
            $table->integer('no_kontak');
            $table->string('isbn');
            $table->integer('jml_pinjam');
            $table->timestamps('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->string('voucher');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('peminjaman');
    }
}
