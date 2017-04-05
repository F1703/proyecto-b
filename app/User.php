<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','apellido' ,'email', 'password','picture','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function publicacion(){
      return $this->hasOne('App\Publicacion');
    }

    public function comentario(){
      return $this->hasOne('App\Comentario');
    }

}
