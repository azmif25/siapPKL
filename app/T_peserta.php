<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_Peserta extends Model
{
    //
    protected $table = 't_peserta_magang';
    protected $primaryKey = 'nik';

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function dinas()
    {
        return $this->belongsTo(T_dinas::class,'id_bagian');
    }
}
