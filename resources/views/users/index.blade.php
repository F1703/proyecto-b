@extends('template.main')
@section('title')
  ListaUsuarios
@endsection
@section('content')

  <table class="table table-bordered table-responsive table-hover table-striped table-condensed">
    <thead>
      <th>Id</th>
      <th>Photo</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
      <th>Type</th>
      <th>FechaCreacion</th>
      <th>Accion</th>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td><img src="/files/{{$user->picture}}" class="img-circle" width="50px" height="50px" alt=""></td>
          <td>{{$user->name}}</td>
          <td>{{$user->apellido}}</td>
          <td>{{$user->email}}</td>
          @if ($user->type=="comun")
            <td><span class="label label-primary">{{$user->type}}</span></td>
          @else
            <td><span class="label label-danger">{{$user->type}}</span></td>
          @endif
          <td>{{$user->created_at}}</td>
          <td>
            <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning btn-sm"><i class="icon-fixed-width icon-pencil"></i></a>
            <a href="{{route('users.edit',$user->id)}}" class="btn btn-danger btn-sm"><i class="icon-fixed-width icon-trash"></i></a>
            {{-- <a href="{{route('admin.articles.destroy',$article->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><i class="icon-fixed-width icon-trash"></i></a> --}}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
