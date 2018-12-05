<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    public function transaksi (){
        return $this->belongsTo('App\JenisTransaksi','jenis_transaksi');
    }

    protected $fillable = ['anggota_id' , 'tanggal' , 'jenis_transaksi' , 'nominal_transaksi','user_id'];
    public $timestamps = false;

    public function anggota(){
        return $this->belongsTo('App\anggota');
    }
  
}
