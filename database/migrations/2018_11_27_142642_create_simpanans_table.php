<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimpanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simpanans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anggota_id');
            $table->datetime('tanggal');
            $table->integer('jenis_transaksi');
            $table->double('nominal_transaksi',10,2);
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simpanans');
    }
}
