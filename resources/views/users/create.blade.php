@extends('template.main')
@section('title')
  Register
@endsection
@section('content')
  <div class="panel panel-default">

    <div class="panel-heading">
      <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
      {!!Form::open(['route'=>'users.store','method'=>'POST','files'=>true])!!}
        <div class="panel-group">
          {!!Form::label('name','Nombre')!!}
          {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Franco','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('apellido','Apellido')!!}
          {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Herrera','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('email','Email')!!}
          {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Franco@gmail.com','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('password','Password')!!}
          {!!Form::password('password',['class'=>'form-control','placeholder'=>'*******','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('picture','Imagen')!!}
          {!!Form::file('picture',['class'=>'form-control','required'])!!}
        </div>
    </div>
    <div class="panel-footer">
      {!!Form::submit('Registrar',['class'=>'btn btn-primary btn-sm'])!!}
    </div>
    {!!Form::close()!!}
  </div>


@endsection
