<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisTransaksi extends Model
{
    public function simpanan (){
        return $this->hasMany('App\Simpanan','jenis_transaksi');
    }
}
