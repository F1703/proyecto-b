@extends('template.main')
@section('title')
  Categoria
@endsection
@section('content')

  <div class="panel panel-default">

    <div class="panel-heading">
      <h3 class="panel-title">Categoria</h3>
    </div>
    <div class="panel-body">
      {!!Form::open(['route'=>'categoria.store','method'=>'POST'])!!}
        <div class="panel-group">
          {!!Form::label('nombre','Nombre')!!}
          {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'categoria','required'])!!}
        </div>
    </div>
    <div class="panel-footer">
      {!!Form::submit('Agregar categoria',['class'=>'btn btn-primary btn-sm'])!!}
    </div>
    {!!Form::close()!!}
  </div>


@endsection
