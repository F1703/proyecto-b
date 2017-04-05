@extends('template.main')
@section('title')
  Post Creados
@endsection
@section('content')
  <h3 class="title">Ultimas Publicaciones</h3>
  {{-- <div class="thumbnail">
    <div class="caption">

    </div>
  </div> --}}

<div class="row">
  <div class="col-md-8">
    <div class="row">

      @foreach ($posts as $post)
        <div class="caption">
          <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="panel-title">
                  <a href="{{route('post.show',$post->slug)}}">
                    <span class="badge">{{$post->user->name}}</span>
                    <strong> {{$post->titulo}}</strong>
                  </a>
                  <span style="float:right" class="label label-success">{{$post->created_at}}</span>
                </h2>
                {{-- <div class="nav nav-pills">
                </div> --}}
                <h6>
                  {{$post->categoria->nombre}} |
                  {{$post->materia->nombre}}
                  <div class="pull-right">
                    <span class="label label-warning">Comentarios
                      <span class="badge">{{$post->comentario->count()}}</span>
                    </span>
                  </div>
                </h6>

            </div>
            <div class="panel-body">
              {{ $post->intro}}
            </div>
            <div class="panel-footer">
                <a href="{{route('post.show',$post->slug)}}">ver mas</a>
            </div>
          </div>
          </div>

      @endforeach
    </div>
  </div>


        {{-- panel aside --}}
        <div class="col-md-4 aside">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Categorias</h3>
          </div>
          <div class="panel-body">
            {{-- @foreach ($categorias as $cat)
              <span class="label label-primary">
                {{$cat->nombre}}
              </span>
            @endforeach --}}
          </div>
        </div>
        </div>
        {{-- panel aside --}}

        {{-- panel aside --}}
        <div class="col-md-4 aside">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h3 class="panel-title">Materias</h3>
          </div>
          <div class="panel-body">

          </div>
        </div>
        </div>
        {{-- panel aside --}}

</div> {{-- row--}}

{{ $posts->render() }}





@endsection
