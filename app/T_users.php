<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// memanggil fitur softDeletes
use Illuminate\Database\Eloquent\SoftDeletes;

class T_users extends Model
{
  //handle table
  protected $table = 't_users';

  // deklarasi atribut primarykey dari default yaitu id
  protected $primaryKey = 'id_user';

  // menggunakan softdeletes
  // use SoftDeletes;

  protected $dates =['deleted_at'];

  // method relasi
  public function role()
  {
    return $this->belongsTo('App\T_users_role', 'id_role');
  }
  // public function user()
  // {
  //   return $this->hasMany('App\T_users_role');
  // }
}
