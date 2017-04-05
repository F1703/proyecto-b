@extends('template.main')
@section('title')
  Perfil de {{$user->name}}
@endsection
@section('content')

  <div class="panel panel-default">

    <div class="panel-heading">
      <div class="media">
        <div class="media-left">
          <img class="img-circle" src="/files/{{$user->picture}}" width="50px" height="50px" alt="" >
        </div>
        <div class="media-body">
          <h3 class="media-heading">Perfil de {{$user->name}}</h3>
        </div>
      </div>
    </div>
    <div class="panel-body">
      {!!Form::open(['route'=>['perfil.update',$user],'method'=>'PUT','files'=>true])!!}
        <div class="panel-group">
          {!!Form::label('name','Nombre')!!}
          {!!Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Franco','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('apellido','Apellido')!!}
          {!!Form::text('apellido',$user->apellido,['class'=>'form-control','placeholder'=>'Herrera','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('email','Email')!!}
          {!!Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'Franco@gmail.com','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('password','Password')!!}
          {!!Form::password('password',['class'=>'form-control','placeholder'=>'*******','required'])!!}
        </div>
        @if (Auth::user()->type=="admin")
          <div class="panel-group">
            {!!Form::label('type','Tipo')!!}
            {!!Form::select('type',['comun'=>'Comun','admin'=>'Admin'],$user->type,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required'])!!}
            {{-- {!!Form::select('type',null,null,['class'=>'form-control select-type','required'])!!} --}}
          </div>
        @endif
        <div class="panel-group">
          {!!Form::label('picture','Imagen')!!}
          {!!Form::file('picture',['class'=>'form-control','required'])!!}
        </div>
    </div>
    <div class="panel-footer">
      {!!Form::submit('Editar perfil',['class'=>'btn btn-primary btn-sm'])!!}
    </div>
    {!!Form::close()!!}
  </div>


@endsection
