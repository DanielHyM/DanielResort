<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary" style="font-weight:bolder">
    <img id="danielResortIcon" class=" navbar-expand-lg" src="{{asset('images/resort-icon.png')}}">
    <a class="navbar-brand" href="#" >DanielResort</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav" style="font-size: 1.2em">
        <ul class="navbar-nav" style="margin: auto">


            <li class="nav-item active">
                <a class="nav-link" href="{{route('/')}}">Inicio <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('home.whereWeAre')}}">Dónde Estamos <span class="sr-only">(current)</span></a>

            </li>




            @can('admin')

                <li class="dropdown  nav-item {{in_array(Route::currentRouteName(),['users.create','users.index']) ? "show" : null }}">
                    <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion de Usuarios
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('users.index')}}">Lista de Usuarios</a>
                        <a class="dropdown-item" href="{{route('users.create')}}">Crear Usuarios</a>

                    </div>
                </li>

                <li class="dropdown   nav-item   {{in_array(Route::currentRouteName(),['housings.create','housings.index']) ? "show" : null }} ">
                    <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion de Apartamentos
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('housings.index')}}">Tabla Lista de Apartamentos</a>
                        <a class="dropdown-item" href="{{route('housings.create')}}">Crear Apartamentos</a>

                    </div>
                </li>

                <li class="dropdown   nav-item   {{in_array(Route::currentRouteName(),['bookings.create','bookings.index']) ? "show" : null }}">
                    <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservas
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('bookings.index')}}">Lista de Reservas</a>
                        <a class="dropdown-item" href="{{route('bookings.create')}}">Crear Reservas</a>

                    </div>
                </li>

                <li class="dropdown   nav-item   {{in_array(Route::currentRouteName(),['statistics.index']) ? "show" : null }}">
                    <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Estadísticas
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('statistics.index')}}">Estadísticas de Reservas</a>

                    </div>
                </li>




            @endcan


                <li class="dropdown   nav-item   {{in_array(Route::currentRouteName(),['user.housing.list','user.booking.list']) ? "show" : null }} ">
                    <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Apartamentos
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('user.housing.list')}}">Lista de Apartamentos</a>
                    @can('user')
                        <a class="dropdown-item" href="{{route('user.booking.list')}}">Mis Reservas</a>
                    @endcan
                    </div>

                </li>




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
