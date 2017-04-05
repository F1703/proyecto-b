<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Publicacion extends Model
{
    //
    use Sluggable;

    protected $table = 'publicacions';
    protected $fillable =['titulo','intro','cuerpo','slug','user_id','categoria_id','materia_id','archivo_id'];



    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }

    public function archivo(){
      return $this->belongsTo('App\Archivo');
    }

    public function materia(){
      return $this->belongsTo('App\Materia');
    }

    public function categoria(){
      return $this->belongsTo('App\Categoria');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }


    public function comentario(){
      return $this->hasMany('App\Comentario');
    }

    public function scopeSearch($query, $slug){
      return $query->where('slug','=',$slug);
    }
    public function scopeSearchUser($query,$user_id){
      return $query->where('user_id','=', $user_id);
    }
}
