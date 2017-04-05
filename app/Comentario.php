<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $table = 'comentarios';
    protected $fillable =['contenido','user_id','publicacion_id'];

    public function publicacion(){
        return $this->hasMany('App\Publicacion','publicacion_id','user_id');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function scopeSearch($query,$id){
      return $query->where('publicacion_id','=',$id);
    }

}
