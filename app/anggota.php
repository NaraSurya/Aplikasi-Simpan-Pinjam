<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JenisTransaksi;
use Carbon\Carbon;
class anggota extends Model
{
    
    protected $fillable = ['nama' , 'no_ktp' , 'alamat' , 'no_tlp' , 'jenis_kelamin' , 'foto_profile' , 'user_id' , 'tgl_lahir'];
    
    public function no_urut(){
        return $this->id % 1000; 
    }
    public function generate_no_anggota(){
        $date = carbon::now()->format('dmy');
        return (string)$date*1000+$this->no_urut();
    }
    
    public function saldo(){
        $saldo =0;
        $transaksis = $this->simpanan;
        $tipe = JenisTransaksi::all(); 
        foreach($transaksis as $transaksi){
            $saldo += $transaksi->nominal_transaksi * $tipe->where('id' , $transaksi->jenis_transaksi)->first()->tipe;  
        }
        return $saldo;
    }

    public function total_bunga(){
        $bunga = 0; 
        $transaksis = $this->simpanan; 
        foreach($transaksis->where('jenis_transaksi' , '3') as $transaksi ){
            $bunga += $transaksi->nominal_transaksi; 
        }
        return $bunga;
    }

    public function saldoAt($transaksi_id){
        $saldo =0;
        $transaksis = $this->simpanan;
        $tipe = JenisTransaksi::all(); 
        foreach($transaksis as $transaksi){
            $saldo += $transaksi->nominal_transaksi * $tipe->where('id' , $transaksi->jenis_transaksi)->first()->tipe;
            if($transaksi->id == $transaksi_id){
                return $saldo;
            }  
        }
        return $saldo;
    }

    // Relathionship function~
    public function simpanan(){
        return $this->hasMany('App\Simpanan');
    }


}
