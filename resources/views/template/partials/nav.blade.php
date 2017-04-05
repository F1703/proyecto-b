<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}">Inicio</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{route('publicacion.index')}}">Publicaciones</a></li>
        {{-- @if (Auth::guest() || Auth::user()->type=="comun" || Auth::user()->type=="admin")
          <li><a href="{{route('publicacion.index')}}">Publicaciones</a></li>
        @endif --}}
        @if (Auth::check())
          <li><a href="{{route('perfil.edit',Auth::user()->id)}}">Perfil</a></li>
          <li><a href="{{route('post.create')}}">CrearPost</a></li>
          <li><a href="{{route('post.index')}}">MisPost</a></li>
          @if (Auth::user()->type=="admin")
            <li><a href="{{route('categoria.index')}}">Categorias</a></li>
            <li><a href="{{route('materia.index')}}">Materias</a></li>
            <li><a href="{{route('users.index')}}">Usuarios</a></li>

          @endif
        @endif
      </ul>

      {{-- <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuracion <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul> --}}


      <ul class="nav navbar-nav navbar-right">
      @if (Auth::guest())
        <li><a href="{{route('auth.login')}}">Login</a></li>
        <li><a href="{{route('users.create')}}">Sign up</a></li>
      @else
        <a class="navbar-brand" href="#" style="padding:0px;">
          @if (Auth::check())
            {{-- <img src="{{public_path()}}/files/{{Auth::user()->picture}}" alt="Picture" --}}
              <img src="/files/{{Auth::user()->picture}}" alt="Picture"
              style="height:100%;padding:5px;width:auto;" class="img-circle">

          @endif
        </a>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}
            <span class="caret"></span>
            {{-- <i class="glyphicon glyphicon-user"></i> --}}
          </a>
          <ul class="dropdown-menu">
            @if (Auth::user()->type=='admin')
              <li><a href="{{route('categoria.create')}}">AgregarCategoria</a></li>
              <li><a href="{{route('materia.create')}}">AgregarMateria</a></li>
              <li><a href="{{route('users.index')}}">Usuarios</a></li>
            @endif
            <li><a href="{{route('perfil.edit',Auth::user()->id)}}">Perfil</a></li>
            <li><a href="{{route('post.create')}}">CrearPost</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{route('auth.logout')}}">Logout</a></li>
          </ul>
        </li>
      </ul>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
