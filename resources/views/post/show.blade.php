@extends('template.main')
@section('title')
  Show
@endsection
@section('content')

  <div class="thumbnail">
    <div class="caption">
      @foreach ($post as $p)
        <div class="panel panel-primary">
          <div class="panel-heading">
              <h3 class="panel-title">
                  <span class="badge">{{$p->user->name}}</span>
                  {{$p->titulo}}
                </a>
                <span style="float:right">{{$p->created_at}}</span>
              </h3>
              <h6>
                {{$p->categoria->nombre}} |
                {{$p->materia->nombre}}
                <div class="pull-right">
                  <span class="label label-warning">Comentarios
                    <span class="badge">{{$p->comentario->count()}}</span>
                  </span>
                </div>
              </h6>
          </div>
          <div class="panel-body">
            {{ $p->intro}}
            <br>
              {{ $p->cuerpo}}
          </div>
        </div>


          <div class="panel-footer">
            <h3>Deja un comentario</h3>
            <br>
            {{-- <h5>tu dirección de correo electrónico no sera publicado.</h5> --}}
            {{Form::open(['route'=>'comentario.store','method'=>'POST'])}}
            @if (Auth::user())
              <div class="panel-group">
                {!!Form::label('contenido','Tu comentario')!!}
                {!!Form::text('contenido',null,['class'=>'form-control','placeholder'=>'escribe tu comentario aqui','required'])!!}
              </div>
              <div class="panel-group">
                {!!Form::hidden('user_id',Auth::user()->id)!!}
              </div>
              <div class="panel-group">
                {!!Form::hidden('publicacion_id',$p->id)!!}
              </div>
              <div class="panel-footer">
                {!!Form::submit('PUBLICAR COMENTARIO',['class'=>'btn btn-primary btn-sm'])!!}
              </div>
              @else
                <div class="panel-group">
                  {!!Form::label('contenido','Tu comentario')!!}
                  {!!Form::text('contenido',null,['class'=>'form-control','placeholder'=>'Debes estar logueado para poder comentar','required'])!!}
                </div>
              @endif
            {{Form::close()}}
          </div>


        <div class="panel-footer">
         @foreach ($p->comentario as $comen)
           <div class="thumbnail">
             <div class="caption">
              <h3>{{$comen->user->name}}</h3>
              <span class="label label-success"></span>
                 <blockquote>
                  <p>{{$comen->contenido}}</p>
                  <small> <cite title="Source Title">{{$comen->created_at}}</cite></small>
                </blockquote>
             </div>
           </div>
         @endforeach
        </div>

      @endforeach
    </div>
  </div>


@endsection
