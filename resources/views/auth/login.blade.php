@extends('template.main')
@section('title')
  Login
@endsection
@section('content')

  <div class="panel panel-default">

    <div class="panel-heading">
      <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
      {!!Form::open(['route'=>'auth.login','method'=>'POST','files'=>true])!!}
        <div class="panel-group">
          {!!Form::label('email','Email')!!}
          {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Franco@gmail.com','required'])!!}
        </div>
        <div class="panel-group">
          {!!Form::label('password','Password')!!}
          {!!Form::password('password',['class'=>'form-control','placeholder'=>'*******','required'])!!}
        </div>
    </div>
    <div class="panel-footer">
      {!!Form::submit('Login',['class'=>'btn btn-primary btn-sm'])!!}
    </div>
    {!!Form::close()!!}
  </div>


@endsection
