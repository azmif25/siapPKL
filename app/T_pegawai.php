<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_pegawai extends Model
{
    //
    protected $table = 't_pegawai';
    protected $primaryKey = 'nip';
    protected $fillable = ['nik','nip'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function dinas()
    {
        return $this->belongsTo(T_dinas::class, 'id_bagian');
    }
}
