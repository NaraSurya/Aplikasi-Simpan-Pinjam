<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JenisTransaksi;

class anggota extends Model
{
    protected $fillable = ['nama' , 'no_ktp' , 'no_anggota' , 'alamat' , 'no_tlp' , 'jenis_kelamin' , 'foto_profile' , 'user_id' , 'tgl_lahir'];

    public function create_no_anggota($no_ktp){
        return $no_ktp.time(); 
    }

    public function simpanan(){
        return $this->hasMany('App\Simpanan');
    }

    public function saldo(){
        $saldo = 0;
        $transaksis = $this->simpanan;
        $tipe = JenisTransaksi::all(); 
        foreach($transaksis as $transaksi){
            $saldo += $transaksi->nominal_transaksi * $tipe->where('id' , $transaksi->jenis_transaksi)->first()->tipe;  
        }
        return $saldo;
    }

}
