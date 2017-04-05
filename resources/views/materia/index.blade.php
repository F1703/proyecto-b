@extends('template.main')
@section('title')
  ListaMateria
@endsection
@section('content')
<a href="{{ route('materia.create') }}" class="btn btn-info btn-sm"> AgregarMateria</a><br><br>
  <table class="table table-bordered table-responsive table-hover table-striped">
    <thead>
      <th>Id</th>
      <th>Nombre</th>
      <th>FechaCreacion</th>
      <th>Accion</th>
    </thead>
    <tbody>
      @foreach ($materias as $materia)
        <tr>
          <td>{{$materia->id}}</td>
          <td>{{$materia->nombre}}</td>
          <td>{{$materia->created_at}}</td>
          <td>
            <a href="#" class="btn btn-warning btn-sm"><i class="icon-fixed-width icon-pencil"></i></a>
            <a href="#" class="btn btn-danger btn-sm"><i class="icon-fixed-width icon-trash"></i></a>
            {{-- <a href="{{route('admin.articles.destroy',$article->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><i class="icon-fixed-width icon-trash"></i></a> --}}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
