<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Pacific Reef</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('head')
</head>

<body style="margin: 0; padding: 0;">
    <div style="background: linear-gradient(to bottom, #f0f9ff 0%, #ffffff 100%); min-height: 100vh;">
        <nav class="navbar navbar-expand-lg navbar-light"
            style="background-color: #0891b2; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <div class="container">
                <a class="navbar-brand" href="/" style="color: white; font-size: 1.5rem; font-weight: 600;">
                    🌊 Hotel Pacific Reef
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    style="border-color: white;">
                    <span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rooms.available') }}"
                                style="color: white; font-weight: 500;">Reservar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery" style="color: white; font-weight: 500;">Galería</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historial', [], false) }}"
                                style="color: white; font-weight: 500;">Mis Reservas</a>
                        </li>
                        @auth
                            <li class="nav-item d-flex align-items-center">
                                <span class="nav-link" style="color: white; font-weight: bold; margin-right: 15px;">
                                    Hola, {{ Auth::user()->name }}
                                </span>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                                    @csrf
                                    <button type="submit" class="nav-link"
                                        style="background: none; border: none; padding: 8px 0; color: white; font-weight: 500; cursor:pointer;">
                                        Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"
                                    style="color: white; font-weight: 500;">Iniciar sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"
                                    style="color: white; font-weight: 500;">Registrarse</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="py-4" style="background-color: #0891b2; color: white;">
            <div class="container text-center">
                <p class="mb-0">&copy; 2026 Hotel Pacific Reef. Todos los derechos reservados.</p>
                <p class="mb-0 mt-2">Tu paraíso costero te espera</p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>