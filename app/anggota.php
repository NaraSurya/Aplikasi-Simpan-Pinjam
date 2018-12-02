<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    protected $fillable = ['nama' , 'no_ktp' , 'no_anggota' , 'alamat' , 'no_tlp' , 'jenis_kelamin' , 'foto_profile' , 'user_id' , 'tgl_lahir'];

    public function create_no_anggota($no_ktp){
        return $no_ktp.time(); 
    }
}
