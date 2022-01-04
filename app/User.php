<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $primaryKey = 'id_user';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class,'roles_id');
    }

    public function pesertadata()
    {
        return $this->hasOne(T_peserta::class,'id_user');
    }

    public function pegawai()
    {
        return $this->hasOne(T_pegawai::class,'id_user');
    }

    public function absensi()
    {
        return $this->hasMany(T_absensi::class,'id_user');
    }

    public function hasil()
    {
        return $this->hasMany(T_hasil::class, 'id_user');
    }

    public function punyaRule($rolename)
    {
      // dd($this->role->rolename == 'SuperAdmin');
      // dd($this->session());
      if ($this->role->rolename == $rolename) {
        return true;
      }
      return false;
    }
}
