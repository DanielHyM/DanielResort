<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary" style="font-weight:bolder">
    <a class="navbar-brand" href="#" >DanielResort</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav" style="font-size: 1.2em">
        <ul class="navbar-nav" style="margin: auto">


            <li class="nav-item active">
                <a class="nav-link" href="{{route('/')}}">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Quiénes Somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Donde Estamos</a>
            </li>

            @can('admin')

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.create')}}">Crear Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Editar Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Crear Apartamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Editar Apartamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Crear Reserva</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Editar Reserva</a>
                    </li>

            @endcan




        </ul>

        @if(!Auth::user())
            <a href="{{route('register')}}"  class="btn btn-success"><i class="fas fa-angle-double-right"></i> Registrarse</a>
            <a href="{{route('login')}}" class="btn btn-success"><i class="fas fa-angle-double-right"></i> Acceder</a>

        @else


                <a href="#" class="btn btn-success" onclick="document.getElementById('logout-form-menu').submit();"><i class="fas fa-angle-double-right"></i>Cerrar Sesion
                    <form id="logout-form-menu" action="{{route('logout')}}" method="POST">
                    @csrf
                    </form>


                </a>


        @endif



    </div>

</nav>
