<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;
use App\Materia;
use App\Publicacion;
use App\Archivo;
use App\Comentario;
use Laracasts\Flash\Flash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

          $posts = Publicacion::searchUser(\Auth::user()->id)->orderby('id','asc')->paginate(2);
          return view('post.index')
          ->with('posts', $posts);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias=Categoria::lists('nombre','id');
        $materias = Materia::lists('nombre','id');
        return view('post.create')
          ->with('categorias', $categorias)
          ->with('materias', $materias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        if ($request->file('archivo_id') !=null) {
          $file=$request->file('archivo_id');
          $name= date('d.m.Y').'_'.time().'_'.$file->getClientOriginalName().'_.'.$file->getClientOriginalExtension();
          $path=public_path().'/files';
          // $file->move($path,$name);
          $archivo= new Archivo;
          $archivo->nombre= $name;
          $archivo->save();
          $publicacion=new Publicacion($request->all());
          $archivo= Archivo::find($archivo->id);
          $publicacion->archivo_id=$archivo->id;
          $publicacion->save();
        }else {
          $publicacion=new Publicacion($request->all());
          $publicacion->save();
        }
        Flash::success('Se creo con exito el usario '.$publicacion->slug.' !!');
        return redirect()->route('post.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        ;
        $post= Publicacion::Search($slug)->get();
        $post->each(function($post){
          // $comentario= Comentario::Search($post->id)->get();
          // $comentario->publicacion;
          // dd($comentario);
          $post->comentario;
        });
        return view('post.show')
          ->with('post', $post);
          // ->with('comentario', $comentario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
