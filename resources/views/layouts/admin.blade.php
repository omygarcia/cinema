<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <link rel="stylesheet" href="{{url("css/admin.css")}}" /> 
</head>
<body>
    <header class="header-admin">
        <h1 class="col-20">Cinema Admin</h1>
        <nav class="header-nav-user">
            <ul>
                <li>
                    @if(Auth::check())
                    <a href="#">Usuario: {!! Auth::user()->name !!}</a>
                    <ul>                        
                        <li><a href="{{url("logout")}}">Cerrar Sessión</a></li>
                    </ul>
                    @endif
                </li> 
            </ul> 
        </nav>
    </header>
    <nav class="nav-admin">
        <ul>
            <li><a href="#">Usuario</a>
                <ul>
                    <li><a href="{{url("usuario")}}">Listar</a></li>
                    <li><a href="{{url("usuario/create")}}">Crear Usuario</a></li>
                </ul>
            </li>
            <li><a href="{{url("usuario/create")}}">Peliculas</a></li>
            <li><a href="{{url("genero/create")}}">Generos</a></li>
        </ul>
    </nav>
    <section class="section-admin">
        @yield("content")
    </section>
    <!--<footer>
        <p>Todos lo derchos reservados</p>
    </footer>-->
    
    {!! Html::script("js/jquery.min.js") !!}
    {!! Html::script("js/funciones.js") !!}
</body>
</html>