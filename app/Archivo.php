<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    //
    protected $table = 'archivos';
    protected $fillable =['nombre'];

    public function publicacion(){
      return $this->hasOne('App\Publicacion');
    }
}
