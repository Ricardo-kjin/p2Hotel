<ul class="navbar-nav">

    {{-- Gestion personal --}}
    <li class="nav-item">
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#gruposMenu" role="button" aria-expanded="false">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons">people</i>
            </div>
            {{-- <span class="nav-link-text ms-1">Gestion del Personal</span> --}}
            <h6 class="text-uppercase text-xs text-white font-weight-bolder opacity-8">Control del Personal</h6>
        </a>
        <div class="collapse" id="gruposMenu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/recepcionistas') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i class="material-icons opacity-10">person_outline</i> --}}
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <span class="nav-link-text ms-1">Recepcionistas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/clientes') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i class="material-icons opacity-10">group_work</i> --}}
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <span class="nav-link-text ms-1">Clientes</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

        {{-- Gestion personal --}}
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#procedencia" role="button" aria-expanded="false">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons">people</i>
                </div>
                {{-- <span class="nav-link-text ms-1">Gestion del Personal</span> --}}
                <h6 class="text-uppercase text-xs text-white font-weight-bolder opacity-8"> Procedencia</h6>
            </a>
            <div class="collapse" id="procedencia">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/paises') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                {{-- <i class="material-icons opacity-10">person_outline</i> --}}
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <span class="nav-link-text ms-1">Paises</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/provincias') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                {{-- <i class="material-icons opacity-10">group_work</i> --}}
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <span class="nav-link-text ms-1">Ciudad</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    {{-- Gestion reserva --}}
    <li class="nav-item">
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#reserva" role="button" aria-expanded="false">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons">people</i>
            </div>
            {{-- <span class="nav-link-text ms-1">Gestion del Personal</span> --}}
            <h6 class="text-uppercase text-xs text-white font-weight-bolder opacity-8">Gestion de Reserva</h6>
        </a>
        <div class="collapse" id="reserva">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/reservas/create') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i class="material-icons opacity-10">person_outline</i> --}}
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <span class="nav-link-text ms-1">Nueva Reserva</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/clientes') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i class="material-icons opacity-10">group_work</i> --}}
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <span class="nav-link-text ms-1">Lista de reservas</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    {{-- Gestion promocion --}}
    <li class="nav-item">
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#promocion" role="button" aria-expanded="false">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons">people</i>
            </div>
            {{-- <span class="nav-link-text ms-1">Gestion del Personal</span> --}}
            <h6 class="text-uppercase text-xs text-white font-weight-bolder opacity-8">ADMINISTRACION</h6>
        </a>
        <div class="collapse" id="promocion">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/servicios') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i class="material-icons opacity-10">person_outline</i> --}}
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <span class="nav-link-text ms-1">SERVICIOS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/promociones') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i class="material-icons opacity-10">group_work</i> --}}
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <span class="nav-link-text ms-1">PROMOCIONES</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/tipos-habitacion') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i class="material-icons opacity-10">group_work</i> --}}
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <span class="nav-link-text ms-1">TIPO HABITACIONES</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/habitaciones') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i class="material-icons opacity-10">group_work</i> --}}
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <span class="nav-link-text ms-1">HABITACIONES</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    {{-- Perfil --}}
    <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Control de Cerradura</h6>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white " href="{{url('/imagenes/create')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Añadir una imagen al perfil</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white " href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Abrir cerradura</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white " href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Cerrar Cerradura</span>
        </a>
    </li>
    {{-- Perfil --}}
    <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Gestionar Perfil</h6>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white " href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Perfil</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">exit_to_app</i>
            </div>
            <span class="nav-link-text ms-1">Cerrar sesión</span>
            <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
                @csrf
            </form>
        </a>
    </li>
