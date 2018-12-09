<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_anggota')->nullable();
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_tlp');
            $table->string('no_ktp');
            $table->enum('jenis_kelamin' , ['L','P']);
            $table->date('tgl_lahir');
            $table->enum('status_aktif' , ['1','0'])->default('1');
            $table->string('foto_profile');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('anggotas');
    }
}
