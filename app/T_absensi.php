<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_absensi extends Model
{
    //
    protected $table = 't_absensi_magang';
    protected $primaryKey = 'id_absensi';

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public $timestamps = false;
}
