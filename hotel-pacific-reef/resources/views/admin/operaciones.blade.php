<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Pacific Reef - Gestión de Operaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #6b7280;
            padding: 1rem 1.5rem;
            font-weight: 500;
        }

        .nav-tabs .nav-link.active {
            color: #2563eb;
            border-bottom: 2px solid #2563eb;
            background: none;
        }

        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .btn-blue {
            background-color: #2563eb;
            color: white;
        }

        .btn-blue:hover {
            background-color: #1d4ed8;
            color: white;
        }

        .btn-green {
            background-color: #16a34a;
            color: white;
        }

        .btn-green:hover {
            background-color: #15803d;
            color: white;
        }

        .status-badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
        }

        .bg-registrado {
            background-color: #dcfce7;
            color: #166534;
        }

        .bg-reservado {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .bg-salida {
            background-color: #f3f4f6;
            color: #374151;
        }
    </style>
</head>

<body>

    <header class="bg-white shadow-sm border-bottom">
        <div class="container-fluid px-4 py-3">
            <div class="d-flex align-items-center gap-3">
                <i class="bi bi-buildings-fill text-primary fs-2"></i>
                <div>
                    <h1 class="h4 mb-0 text-dark">Hotel Pacific Reef</h1>
                    <p class="text-muted small mb-0">Panel Administrativo</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4 py-4">
        <div class="card mb-4">
            <div class="card-header bg-white p-0">
                <ul class="nav nav-tabs border-0" id="operationTabs" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active d-flex align-items-center gap-2" id="guests-tab"
                            data-bs-toggle="tab" data-bs-target="#guests-content" type="button">
                            <i class="bi bi-people-fill"></i> Gestión de Huéspedes
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link d-flex align-items-center gap-2" id="financial-tab" data-bs-toggle="tab"
                            data-bs-target="#financial-content" type="button">
                            <i class="bi bi-currency-dollar"></i> Reportes Financieros
                        </button>
                    </li>
                </ul>
            </div>

            <div class="card-body p-4">
                <div class="tab-content" id="operationTabsContent">

                    <div class="tab-pane fade show active" id="guests-content" role="tabpanel">
                        <div
                            class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                            <div class="position-relative flex-grow-1" style="max-width: 450px;">
                                <i
                                    class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                <input type="text" id="guestSearch" class="form-control ps-5"
                                    placeholder="Buscar por nombre, habitación o estado...">
                            </div>
                            <button class="btn btn-blue d-flex align-items-center gap-2 px-4 py-2"
                                onclick="alert('Diálogo de registro manual abierto')">
                                <i class="bi bi-person-plus-fill"></i> Registro Manual
                            </button>
                        </div>

                        <div class="table-responsive bg-white rounded border">
                            <table class="table table-hover align-middle mb-0" id="guestsTable">
                                <thead class="bg-light">
                                    <tr class="text-muted small text-uppercase">
                                        <th class="px-4 py-3">ID Huésped</th>
                                        <th class="py-3">Nombre</th>
                                        <th class="py-3">Habitación</th>
                                        <th class="py-3">Entrada</th>
                                        <th class="py-3">Salida</th>
                                        <th class="py-3">Estado</th>
                                        <th class="py-3">Monto Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-3">001</td>
                                        <td class="fw-medium">Sarah Johnson</td>
                                        <td>301</td>
                                        <td>2026-04-15</td>
                                        <td>2026-04-20</td>
                                        <td><span class="status-badge bg-registrado">Registrado</span></td>
                                        <td>$750</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3">002</td>
                                        <td class="fw-medium">Michael Chen</td>
                                        <td>205</td>
                                        <td>2026-04-16</td>
                                        <td>2026-04-19</td>
                                        <td><span class="status-badge bg-registrado">Registrado</span></td>
                                        <td>$450</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3">004</td>
                                        <td class="fw-medium">David Thompson</td>
                                        <td>108</td>
                                        <td>2026-04-20</td>
                                        <td>2026-04-25</td>
                                        <td><span class="status-badge bg-reservado">Reservado</span></td>
                                        <td>$875</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3">005</td>
                                        <td class="fw-medium">Jessica Martinez</td>
                                        <td>315</td>
                                        <td>2026-04-12</td>
                                        <td>2026-04-18</td>
                                        <td><span class="status-badge bg-salida">Salida</span></td>
                                        <td>$900</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="financial-content" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="h4 mb-0">Resumen Financiero - 2026</h2>
                            <button class="btn btn-green d-flex align-items-center gap-2"
                                onclick="alert('Reporte generado exitosamente')">
                                <i class="bi bi-file-earmark-text"></i> Generar Reporte
                            </button>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="bg-white p-4 border rounded shadow-sm">
                                    <p class="text-muted small mb-1">Ingresos Totales</p>
                                    <h3 class="text-success fw-bold">$703,000</h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-white p-4 border rounded shadow-sm">
                                    <p class="text-muted small mb-1">Gastos Totales</p>
                                    <h3 class="text-danger fw-bold">$372,000</h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-white p-4 border rounded shadow-sm">
                                    <p class="text-muted small mb-1">Ganancia Neta</p>
                                    <h3 class="text-primary fw-bold">$331,000</h3>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 border rounded shadow-sm mb-4">
                            <h3 class="h6 mb-4">Ingresos vs Gastos Mensuales</h3>
                            <div style="height: 400px; width: 100%;">
                                <canvas id="financialChart"></canvas>
                            </div>
                        </div>

                        <div class="bg-white border rounded shadow-sm overflow-hidden">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th class="px-4 py-3">Mes</th>
                                        <th class="py-3">Ingresos</th>
                                        <th class="py-3">Gastos</th>
                                        <th class="py-3">Ganancia Neta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-3">Enero</td>
                                        <td class="text-success">$45,000</td>
                                        <td class="text-danger">$28,000</td>
                                        <td class="text-primary">$17,000</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3">Febrero</td>
                                        <td class="text-success">$52,000</td>
                                        <td class="text-danger">$30,000</td>
                                        <td class="text-primary">$22,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Configuración del Gráfico (FinancialReports)
        const ctx = document.getElementById('financialChart').getContext('2d');
        const financialChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [
                    {
                        label: 'Ingresos',
                        data: [45000, 52000, 48000, 61000, 55000, 67000, 72000, 68000, 58000, 63000, 59000, 75000],
                        backgroundColor: '#10b981', // green-500
                        borderRadius: 4
                    },
                    {
                        label: 'Gastos',
                        data: [28000, 30000, 29000, 32000, 31000, 33000, 35000, 34000, 31000, 32000, 30000, 36000],
                        backgroundColor: '#ef4444', // red-500
                        borderRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return context.dataset.label + ': $' + context.raw.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value) { return '$' + value.toLocaleString(); }
                        }
                    }
                }
            }
        });

        // Buscador básico para la tabla de huéspedes
        document.getElementById('guestSearch').addEventListener('keyup', function () {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("#guestsTable tbody tr");

            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().indexOf(value) > -1 ? "" : "none";
            });
        });
    </script>
</body>

</html>