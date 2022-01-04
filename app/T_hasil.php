<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_hasil extends Model
{
    //
    protected $table = 't_upload_file';
    protected $primaryKey = 'id_upload';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
