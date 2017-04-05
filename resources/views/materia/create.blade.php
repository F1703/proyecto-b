@extends('template.main')
@section('title')
  Materia
@endsection
@section('content')

  <div class="panel panel-default">

    <div class="panel-heading">
      <h3 class="panel-title">Materia</h3>
    </div>
    <div class="panel-body">
      {!!Form::open(['route'=>'materia.store','method'=>'POST'])!!}
        <div class="panel-group">
          {!!Form::label('nombre','Materia')!!}
          {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Programacion web','required'])!!}
        </div>
    </div>
    <div class="panel-footer">
      {!!Form::submit('Agregar materia',['class'=>'btn btn-primary btn-sm'])!!}
    </div>
    {!!Form::close()!!}
  </div>


@endsection
