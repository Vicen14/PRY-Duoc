<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8fafc;
        }

        .sidebar {
            width: 256px;
            border-right: 1px solid #e2e8f0;
            background-color: white;
        }

        .nav-link-custom {
            color: #334155;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
            cursor: pointer;
        }

        .nav-link-custom:hover {
            background-color: #f1f5f9;
            color: #0f172a;
        }

        .nav-link-custom.active {
            background-color: #0f172a !important;
            color: white !important;
        }

        .table thead {
            background-color: #0891b2;
            color: white;
        }

        .table tbody tr {
            background-color: #fff;
        }

        .status-confirmed {
            color: #22c55e;
            font-weight: bold;
        }

        .status-cancelled {
            color: #ef4444;
            font-weight: bold;
        }

        .status-pending {
            color: #eab308;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="d-flex vh-100 overflow-hidden">
        <aside class="sidebar d-flex flex-column">
            <div class="p-4 border-bottom">
                <h1 class="h5 fw-semibold mb-1">Hotel Pacific Reef</h1>
                <p class="text-muted small mb-0">Panel de Usuario</p>
            </div>
            <nav class="flex-grow-1 p-3">
                <ul class="nav flex-column gap-1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link-custom active d-flex align-items-center gap-3 py-2 px-3"
                            href="/historial">
                            <i class="bi bi-clock-history"></i> Historial de Reservas
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link-custom d-flex align-items-center gap-3 py-2 px-3" href="/">
                            <i class="bi bi-house"></i> Volver al Inicio
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-3 border-top">
                <div class="d-flex align-items-center gap-3 px-3 py-2">
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                        style="width: 32px; height: 32px;">
                        <i class="bi bi-person text-secondary"></i>
                    </div>
                    <div>
                        <p class="small fw-medium mb-0">{{ Auth::user()->name }}</p>
                        <p class="text-muted mb-0" style="font-size: 0.75rem;">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="mt-2 text-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger w-100">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </aside>
        <div class="flex-grow-1 d-flex flex-column overflow-hidden">
            <header class="bg-white border-bottom px-4 py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="h4 fw-semibold mb-1">Historial de Reservas</h2>
                        <p class="text-muted small mb-0">{{ date('l, d \d\e F \d\e Y') }}</p>
                    </div>
                </div>
            </header>
            <main class="flex-grow-1 overflow-auto p-4 bg-light">
                <div class="bg-white rounded shadow-sm p-4">
                    <h5 class="mb-4">Tus Reservas</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha de Reserva</th>
                                    <th>Habitación</th>
                                    <th>Entrada</th>
                                    <th>Salida</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reservas as $reserva)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $reserva->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $reserva->room->nombre ?? '-' }}</td>
                                        <td>{{ $reserva->fecha_entrada }}</td>
                                        <td>{{ $reserva->fecha_salida }}</td>
                                        <td>
                                            <span class="status-{{ $reserva->estado }}">
                                                {{ ucfirst($reserva->estado) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No tienes reservas previas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>