@extends('template.main')
@section('title')
  Post
@endsection
@section('content')

  <div class="panel panel-default">

    <div class="panel-heading">
      <div class="media">
        <div class="media-left">
          {{-- <img class="img-circle" src="/files/{{$user->picture}}" width="50px" height="50px" alt="" > --}}
        </div>
        <div class="media-body">
          <h3 class="media-heading">Post</h3>
        </div>
      </div>
    </div>
    <div class="panel-body">
      {!!Form::open(['route'=>'post.store','method'=>'POST','files'=>true])!!}
        <div class="panel-group">
          {!!Form::label('titulo','Titulo')!!}
          {!!Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Titulo','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('intro','Introduccion')!!}
          {!!Form::textarea('intro',null,['class'=>'form-control','placeholder'=>'escribe algo aqi','rows'=>'3','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('cuerpo','Cuerpo')!!}
          {!!Form::textarea('cuerpo',null,['class'=>'form-control','placeholder'=>'escribe algo aqi','rows'=>'3','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::hidden('user_id',Auth::user()->id)!!}
        </div>
        <div class="panel-group">
          {!!Form::label('categoria_id','Categoria')!!}
          {!!Form::select('categoria_id',$categorias,null,['class'=>'form-control','placeholder'=>'Seleccione una categoria..','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('materia_id','Materia')!!}
          {!!Form::select('materia_id',$materias,null,['class'=>'form-control','placeholder'=>'Seleccione una materia..','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('archivo_id','Archivo')!!}
          {!!Form::file('archivo_id',['class'=>'form-control'])!!}
        </div>

    </div>
    <div class="panel-footer">
      {!!Form::submit('Crear Post',['class'=>'btn btn-primary btn-sm'])!!}
    </div>
    {!!Form::close()!!}
  </div>


@endsection
