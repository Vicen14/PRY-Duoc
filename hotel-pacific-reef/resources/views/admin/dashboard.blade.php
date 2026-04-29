<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelManager - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif;
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

        /* KPI Cards */
        .kpi-card {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            transition: box-shadow 0.2s;
        }

        .kpi-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .icon-box-blue {
            background-color: #eff6ff;
            color: #2563eb;
        }

        .icon-box-green {
            background-color: #f0fdf4;
            color: #16a34a;
        }

        .icon-box-purple {
            background-color: #faf5ff;
            color: #9333ea;
        }

        .icon-box-orange {
            background-color: #fff7ed;
            color: #ea580c;
        }

        /* Calendar Styles */
        .calendar-cell {
            width: 48px;
            min-width: 48px;
            text-align: center;
            border-right: 1px solid #e2e8f0;
        }

        .room-row {
            height: 64px;
            border-bottom: 1px solid #e2e8f0;
        }

        .booking-bar {
            height: 24px;
            border-radius: 4px;
            color: white;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            padding: 0 8px;
            position: absolute;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .booking-bar:hover {
            opacity: 0.9;
        }

        .status-confirmed {
            background-color: #3b82f6;
        }

        .status-checked-in {
            background-color: #22c55e;
        }

        .status-pending {
            background-color: #eab308;
        }

        .bg-slate-900 {
            background-color: #0f172a;
        }
    </style>
</head>

<body>

    <div class="d-flex vh-100 overflow-hidden">
        <aside class="sidebar d-flex flex-column">
            <div class="p-4 border-bottom">
                <h1 class="h5 fw-semibold mb-1">HotelManager</h1>
                <p class="text-muted small mb-0">Panel de Gestión</p>
            </div>

            <nav class="flex-grow-1 p-3">
                <ul class="nav flex-column gap-1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link-custom active d-flex align-items-center gap-3 py-2 px-3"
                            data-bs-toggle="pill" data-bs-target="#dashboard-tab" type="button" role="tab">
                            <i class="bi bi-grid-1x2"></i> Panel Principal
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link-custom d-flex align-items-center gap-3 py-2 px-3"
                            data-bs-toggle="pill" data-bs-target="#reservas-tab" type="button" role="tab">
                            <i class="bi bi-calendar3"></i> Reservas
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link-custom d-flex align-items-center gap-3 py-2 px-3"
                            data-bs-toggle="pill" data-bs-target="#habitaciones-tab" type="button" role="tab">
                            <i class="bi bi-door-open"></i> Habitaciones
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link-custom d-flex align-items-center gap-3 py-2 px-3"
                            data-bs-toggle="pill" data-bs-target="#huespedes-tab" type="button" role="tab">
                            <i class="bi bi-people"></i> Huéspedes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.operaciones') }}"
                            class="nav-link nav-link-custom d-flex align-items-center gap-3 py-2 px-3">
                            <i class="bi bi-briefcase"></i> Operaciones
                        </a>
                    </li>
                </ul>

                <div class="mt-4 pt-4 border-top">
                    <a href="#configuracion" class="nav-link nav-link-custom d-flex align-items-center gap-3 py-2 px-3">
                        <i class="bi bi-gear"></i> Configuración
                    </a>
                </div>
            </nav>

            <div class="p-3 border-top">
                <div class="d-flex align-items-center gap-3 px-3 py-2">
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                        style="width: 32px; height: 32px;">
                        <i class="bi bi-person text-secondary"></i>
                    </div>
                    <div>
                        <p class="small fw-medium mb-0">Usuario Admin</p>
                        <p class="text-muted mb-0" style="font-size: 0.75rem;">admin1@hotelpacificreef.com</p>
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
                        <h2 class="h4 fw-semibold mb-1" id="page-title">Panel Principal</h2>
                        <p class="text-muted small mb-0">{{ date('l, d \d\e F \d\e Y') }}</p>
                    </div>
                    <div>
                        <button class="btn btn-light position-relative rounded-circle p-2">
                            <i class="bi bi-bell"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">Nuevas alertas</span>
                            </span>
                        </button>
                    </div>
                </div>
            </header>

            <main class="flex-grow-1 overflow-auto p-4 bg-light">
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel">
                        <div class="row g-4 mb-4">
                            <div class="col-md-6 col-lg-3">
                                <div class="bg-white p-4 kpi-card">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="text-muted small mb-1">Tasa de Ocupación</p>
                                            <h3 class="fw-semibold mb-2">78.5%</h3>
                                            <div class="d-flex align-items-center gap-1 text-success small">
                                                <i class="bi bi-graph-up-arrow"></i> +5.2%
                                            </div>
                                        </div>
                                        <div class="p-2 rounded icon-box-blue"><i class="bi bi-percent fs-5"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="bg-white p-4 kpi-card">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="text-muted small mb-1">Check-ins Pendientes</p>
                                            <h3 class="fw-semibold mb-2">12</h3>
                                            <div class="text-muted small">Hoy</div>
                                        </div>
                                        <div class="p-2 rounded icon-box-green"><i class="bi bi-people fs-5"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="bg-white p-4 kpi-card">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="text-muted small mb-1">Ingresos de Hoy</p>
                                            <h3 class="fw-semibold mb-2">$8,450</h3>
                                            <div class="d-flex align-items-center gap-1 text-success small">
                                                <i class="bi bi-graph-up-arrow"></i> +12.3%
                                            </div>
                                        </div>
                                        <div class="p-2 rounded icon-box-purple"><i
                                                class="bi bi-currency-dollar fs-5"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="bg-white p-4 kpi-card">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="text-muted small mb-1">Habitaciones Disponibles</p>
                                            <h3 class="fw-semibold mb-2">24</h3>
                                            <div class="text-muted small">de 112</div>
                                        </div>
                                        <div class="p-2 rounded icon-box-orange"><i class="bi bi-door-open fs-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded border overflow-hidden">
                            <div class="border-bottom px-4 py-3">
                                <h3 class="h6 fw-semibold mb-1">Calendario de Disponibilidad de Habitaciones</h3>
                                <p class="text-muted small mb-0">Vista Gantt mostrando reservas para prevenir sobreventa
                                </p>
                            </div>

                            <div class="overflow-auto">
                                <div
                                    class="d-flex align-items-center justify-content-between px-4 py-2 bg-light border-bottom">
                                    <h4 class="small fw-semibold mb-0">abril de 2026</h4>
                                    <div>
                                        <button class="btn btn-sm btn-light"><i class="bi bi-chevron-left"></i></button>
                                        <button class="btn btn-sm btn-light"><i
                                                class="bi bi-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="d-flex gap-4 px-4 py-2 bg-light border-bottom small">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded status-confirmed" style="width:12px; height:12px;"></div>
                                        Confirmada
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded status-checked-in" style="width:12px; height:12px;"></div>
                                        Registrado
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded status-pending" style="width:12px; height:12px;"></div>
                                        Pendiente
                                    </div>
                                </div>

                                <div style="min-width: 1500px;">
                                    <div class="d-flex border-bottom bg-light">
                                        <div class="py-2 px-3 border-end fw-semibold small" style="width: 120px;">
                                            Habitación</div>
                                        <div class="d-flex">
                                            @for ($i = 1; $i <= 30; $i++)
                                                <div
                                                    class="calendar-cell py-2 small {{ $i == 16 ? 'bg-slate-900 text-white' : 'text-muted' }}">
                                                    {{ $i }}
                                                </div>
                                            @endfor
                                        </div>
                                    </div>

                                    <div class="d-flex room-row position-relative">
                                        <div class="px-3 py-2 border-end bg-white" style="width: 120px;">
                                            <p class="mb-0 fw-semibold small">101</p>
                                            <p class="text-muted mb-0" style="font-size: 0.7rem;">Standard</p>
                                        </div>
                                        <div class="d-flex">
                                            @for ($i = 1; $i <= 30; $i++)
                                                <div class="calendar-cell {{ $i == 16 ? 'bg-light' : '' }}"></div>
                                            @endfor
                                        </div>
                                        <div class="position-absolute"
                                            style="left: 120px; top: 0; bottom: 0; right: 0; pointer-events: none;">
                                            <div class="booking-bar status-confirmed pointer-events-auto"
                                                style="left: {{ (2 - 1) * 48 }}px; width: {{ 3 * 48 }}px; top: 8px;">
                                                John
                                                Smith</div>
                                            <div class="booking-bar status-checked-in pointer-events-auto"
                                                style="left: {{ (8 - 1) * 48 }}px; width: {{ 5 * 48 }}px; top: 36px;">
                                                Emma
                                                Wilson</div>
                                            <div class="booking-bar status-confirmed pointer-events-auto"
                                                style="left: {{ (18 - 1) * 48 }}px; width: {{ 4 * 48 }}px; top: 8px;">
                                                Mike
                                                Brown</div>
                                        </div>
                                    </div>

                                    <div class="d-flex room-row position-relative">
                                        <div class="px-3 py-2 border-end bg-white" style="width: 120px;">
                                            <p class="mb-0 fw-semibold small">201</p>
                                            <p class="text-muted mb-0" style="font-size: 0.7rem;">Deluxe</p>
                                        </div>
                                        <div class="d-flex">
                                            @for ($i = 1; $i <= 30; $i++)
                                                <div class="calendar-cell {{ $i == 16 ? 'bg-light' : '' }}"></div>
                                            @endfor
                                        </div>
                                        <div class="position-absolute"
                                            style="left: 120px; top: 0; bottom: 0; right: 0; pointer-events: none;">
                                            <div class="booking-bar status-checked-in pointer-events-auto"
                                                style="left: {{ (1 - 1) * 48 }}px; width: {{ 4 * 48 }}px; top: 8px;">
                                                David Lee
                                            </div>
                                            <div class="booking-bar status-confirmed pointer-events-auto"
                                                style="left: {{ (10 - 1) * 48 }}px; width: {{ 8 * 48 }}px; top: 36px;">
                                                Anna
                                                Martinez</div>
                                            <div class="booking-bar status-confirmed pointer-events-auto"
                                                style="left: {{ (22 - 1) * 48 }}px; width: {{ 5 * 48 }}px; top: 8px;">
                                                Chris
                                                Taylor</div>
                                        </div>
                                    </div>

                                    <div class="d-flex room-row position-relative">
                                        <div class="px-3 py-2 border-end bg-white" style="width: 120px;">
                                            <p class="mb-0 fw-semibold small">301</p>
                                            <p class="text-muted mb-0" style="font-size: 0.7rem;">Suite</p>
                                        </div>
                                        <div class="d-flex">
                                            @for ($i = 1; $i <= 30; $i++)
                                                <div class="calendar-cell {{ $i == 16 ? 'bg-light' : '' }}"></div>
                                            @endfor
                                        </div>
                                        <div class="position-absolute"
                                            style="left: 120px; top: 0; bottom: 0; right: 0; pointer-events: none;">
                                            <div class="booking-bar status-confirmed pointer-events-auto"
                                                style="left: {{ (7 - 1) * 48 }}px; width: {{ 10 * 48 }}px; top: 8px;">
                                                Robert
                                                Chen</div>
                                            <div class="booking-bar status-confirmed pointer-events-auto"
                                                style="left: {{ (20 - 1) * 48 }}px; width: {{ 8 * 48 }}px; top: 36px;">
                                                Diana
                                                Prince</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="reservas-tab" role="tabpanel">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="d-flex gap-3 flex-grow-1" style="max-width: 500px;">
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i
                                            class="bi bi-search text-muted"></i></span>
                                    <input type="text" class="form-control" placeholder="Buscar reservas...">
                                </div>
                                <button class="btn btn-outline-secondary d-flex align-items-center gap-2"><i
                                        class="bi bi-funnel"></i> Filtrar</button>
                            </div>
                            <button class="btn btn-dark d-flex align-items-center gap-2"><i class="bi bi-plus-lg"></i>
                                Nueva Reserva</button>
                        </div>

                        <div class="bg-white rounded border overflow-hidden">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th class="fw-medium py-3 px-4">ID Reserva</th>
                                        <th class="fw-medium py-3">Nombre del Huésped</th>
                                        <th class="fw-medium py-3">Habitación</th>
                                        <th class="fw-medium py-3">Check-in</th>
                                        <th class="fw-medium py-3">Check-out</th>
                                        <th class="fw-medium py-3">Estado</th>
                                        <th class="fw-medium py-3">Monto</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    <tr>
                                        <td class="py-3 px-4 fw-medium text-dark">RES-001</td>
                                        <td class="py-3 text-muted">John Smith</td>
                                        <td class="py-3 text-muted">101</td>
                                        <td class="py-3 text-muted">2 abr 2026</td>
                                        <td class="py-3 text-muted">5 abr 2026</td>
                                        <td class="py-3"><span
                                                class="badge bg-primary bg-opacity-10 text-primary">Confirmada</span>
                                        </td>
                                        <td class="py-3 fw-medium text-dark">$450</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium text-dark">RES-002</td>
                                        <td class="py-3 text-muted">Emma Wilson</td>
                                        <td class="py-3 text-muted">101</td>
                                        <td class="py-3 text-muted">8 abr 2026</td>
                                        <td class="py-3 text-muted">13 abr 2026</td>
                                        <td class="py-3"><span
                                                class="badge bg-success bg-opacity-10 text-success">Registrado</span>
                                        </td>
                                        <td class="py-3 fw-medium text-dark">$750</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium text-dark">RES-004</td>
                                        <td class="py-3 text-muted">Tom Johnson</td>
                                        <td class="py-3 text-muted">102</td>
                                        <td class="py-3 text-muted">15 abr 2026</td>
                                        <td class="py-3 text-muted">18 abr 2026</td>
                                        <td class="py-3"><span
                                                class="badge bg-warning bg-opacity-10 text-warning">Pendiente</span>
                                        </td>
                                        <td class="py-3 fw-medium text-dark">$450</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="habitaciones-tab" role="tabpanel">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="d-flex gap-3 flex-grow-1" style="max-width: 500px;">
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i
                                            class="bi bi-search text-muted"></i></span>
                                    <input type="text" class="form-control" placeholder="Buscar habitaciones...">
                                </div>
                            </div>
                            <button class="btn btn-dark d-flex align-items-center gap-2">
                                <i class="bi bi-plus-lg"></i> Agregar Habitación
                            </button>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div class="bg-white rounded border p-4 kpi-card position-relative"
                                    style="cursor: pointer;">
                                    <div class="d-flex align-items-start justify-content-between mb-4">
                                        <div>
                                            <h3 class="h5 fw-semibold mb-1 text-dark">Habitación 101</h3>
                                            <p class="text-muted small mb-0">Estándar · Piso 1</p>
                                        </div>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">Ocupada</span>
                                    </div>
                                    <div class="d-flex justify-content-between py-2 border-top">
                                        <span class="text-muted small">Precio por noche</span>
                                        <span class="fw-semibold small text-dark">$150</span>
                                    </div>
                                    <div class="d-flex justify-content-between py-2 border-top">
                                        <span class="text-muted small">Huésped Actual</span>
                                        <span class="fw-medium small text-dark">John Smith</span>
                                    </div>
                                    <button
                                        class="btn border border-secondary-subtle w-100 mt-3 small fw-medium text-muted">Ver
                                        Detalles</button>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="bg-white rounded border p-4 kpi-card position-relative"
                                    style="cursor: pointer;">
                                    <div class="d-flex align-items-start justify-content-between mb-4">
                                        <div>
                                            <h3 class="h5 fw-semibold mb-1 text-dark">Habitación 103</h3>
                                            <p class="text-muted small mb-0">Estándar · Piso 1</p>
                                        </div>
                                        <span class="badge bg-success bg-opacity-10 text-success">Disponible</span>
                                    </div>
                                    <div class="d-flex justify-content-between py-2 border-top">
                                        <span class="text-muted small">Precio por noche</span>
                                        <span class="fw-semibold small text-dark">$150</span>
                                    </div>
                                    <button
                                        class="btn border border-secondary-subtle w-100 mt-3 small fw-medium text-muted">Ver
                                        Detalles</button>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="bg-white rounded border p-4 kpi-card position-relative"
                                    style="cursor: pointer;">
                                    <div class="d-flex align-items-start justify-content-between mb-4">
                                        <div>
                                            <h3 class="h5 fw-semibold mb-1 text-dark">Habitación 202</h3>
                                            <p class="text-muted small mb-0">Deluxe · Piso 2</p>
                                        </div>
                                        <span class="badge bg-warning bg-opacity-10 text-warning">Limpieza</span>
                                    </div>
                                    <div class="d-flex justify-content-between py-2 border-top">
                                        <span class="text-muted small">Precio por noche</span>
                                        <span class="fw-semibold small text-dark">$200</span>
                                    </div>
                                    <button
                                        class="btn border border-secondary-subtle w-100 mt-3 small fw-medium text-muted">Ver
                                        Detalles</button>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="bg-white rounded border p-4 kpi-card position-relative"
                                    style="cursor: pointer;">
                                    <div class="d-flex align-items-start justify-content-between mb-4">
                                        <div>
                                            <h3 class="h5 fw-semibold mb-1 text-dark">Habitación 401</h3>
                                            <p class="text-muted small mb-0">Estándar · Piso 4</p>
                                        </div>
                                        <span class="badge bg-danger bg-opacity-10 text-danger">Mantenimiento</span>
                                    </div>
                                    <div class="d-flex justify-content-between py-2 border-top">
                                        <span class="text-muted small">Precio por noche</span>
                                        <span class="fw-semibold small text-dark">$150</span>
                                    </div>
                                    <button
                                        class="btn border border-secondary-subtle w-100 mt-3 small fw-medium text-muted">Ver
                                        Detalles</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="huespedes-tab" role="tabpanel">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="d-flex gap-3 flex-grow-1" style="max-width: 500px;">
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i
                                            class="bi bi-search text-muted"></i></span>
                                    <input type="text" class="form-control" placeholder="Buscar huéspedes...">
                                </div>
                                <button class="btn btn-outline-secondary d-flex align-items-center gap-2"><i
                                        class="bi bi-funnel"></i> Filtrar</button>
                            </div>
                            <button class="btn btn-dark d-flex align-items-center gap-2"><i
                                    class="bi bi-person-plus"></i> Agregar Huésped</button>
                        </div>

                        <div class="bg-white rounded border overflow-hidden">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th class="fw-medium py-3 px-4">Nombre del Huésped</th>
                                        <th class="fw-medium py-3">Correo Electrónico</th>
                                        <th class="fw-medium py-3">Teléfono</th>
                                        <th class="fw-medium py-3">Habitación</th>
                                        <th class="fw-medium py-3">Check-in</th>
                                        <th class="fw-medium py-3">Check-out</th>
                                        <th class="fw-medium py-3">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    <tr>
                                        <td class="py-3 px-4 fw-medium text-dark">John Smith</td>
                                        <td class="py-3 text-muted">john.smith@email.com</td>
                                        <td class="py-3 text-muted">+1 (555) 123-4567</td>
                                        <td class="py-3 text-muted">101</td>
                                        <td class="py-3 text-muted">2 abr 2026</td>
                                        <td class="py-3 text-muted">5 abr 2026</td>
                                        <td class="py-3"><span
                                                class="badge bg-success bg-opacity-10 text-success">Registrado</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium text-dark">Emma Wilson</td>
                                        <td class="py-3 text-muted">emma.wilson@email.com</td>
                                        <td class="py-3 text-muted">+1 (555) 234-5678</td>
                                        <td class="py-3 text-muted">101</td>
                                        <td class="py-3 text-muted">8 abr 2026</td>
                                        <td class="py-3 text-muted">13 abr 2026</td>
                                        <td class="py-3"><span
                                                class="badge bg-primary bg-opacity-10 text-primary">Reservado</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium text-dark">David Lee</td>
                                        <td class="py-3 text-muted">david.lee@email.com</td>
                                        <td class="py-3 text-muted">+1 (555) 456-7890</td>
                                        <td class="py-3 text-muted">201</td>
                                        <td class="py-3 text-muted">1 abr 2026</td>
                                        <td class="py-3 text-muted">5 abr 2026</td>
                                        <td class="py-3"><span
                                                class="badge bg-success bg-opacity-10 text-success">Registrado</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const tabLinks = document.querySelectorAll('.nav-link-custom[data-bs-toggle="pill"]');
        const pageTitle = document.getElementById('page-title');

        tabLinks.forEach(tab => {
            tab.addEventListener('click', function () {
                // Remover clase active de todos los links
                tabLinks.forEach(l => l.classList.remove('active'));
                // Agregar active al clickeado
                this.classList.add('active');

                // Actualizar el título superior según la pestaña clickeada
                const titleText = this.innerText.trim();
                pageTitle.innerText = titleText;
            });
        });
    </script>
</body>

</html>