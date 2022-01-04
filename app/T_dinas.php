<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\T_pegawai;
use App\T_peserta;

class T_dinas extends Model
{
    //
    protected $table = 't_bagian';
    protected $primaryKey = 'id_bagian';

    public function peserta()
    {
        return $this->hasOne(T_peserta::class, 'id_bagian');
    }

    public function pegawai()
    {
        return $this->hasOne(T_pegawai::class, 'id_bagian');
    }
}
