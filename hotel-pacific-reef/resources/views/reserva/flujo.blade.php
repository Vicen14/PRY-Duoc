<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Pacific Reef - Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: system-ui, -apple-system, sans-serif;
            color: #0f172a;
        }

        .text-muted-foreground {
            color: #64748b;
        }

        .bg-card {
            background-color: #ffffff;
        }

        .border-border {
            border-color: #e2e8f0;
        }

        .bg-primary-custom {
            background-color: #2563eb;
            color: white;
        }

        .text-primary-custom {
            color: #2563eb;
        }

        .border-primary-custom {
            border-color: #2563eb;
        }

        .btn-primary-custom {
            background-color: #2563eb;
            color: white;
            border: none;
        }

        .btn-primary-custom:hover {
            background-color: #1d4ed8;
            color: white;
        }

        /* Stepper Styles */
        .step-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            border: 2px solid #e2e8f0;
            background-color: white;
            color: #64748b;
            transition: all 0.3s;
        }

        .step-circle.active {
            border-color: #2563eb;
            color: #2563eb;
        }

        .step-circle.completed {
            background-color: #2563eb;
            border-color: #2563eb;
            color: white;
        }

        .step-line {
            height: 2px;
            flex-grow: 1;
            background-color: #e2e8f0;
            margin: 0 1rem;
            transition: all 0.3s;
        }

        .step-line.completed {
            background-color: #2563eb;
        }

        /* Room Card */
        .room-card {
            transition: box-shadow 0.2s;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .room-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .amenity-badge {
            background-color: #f1f5f9;
            color: #475569;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }

        /* Payment Toggles */
        .payment-toggle {
            border: 2px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.2s;
            background: white;
        }

        .payment-toggle.selected {
            border-color: #2563eb;
            background-color: #eff6ff;
        }

        .payment-toggle:hover:not(.selected) {
            border-color: #93c5fd;
        }
    </style>
</head>

<body>

    <div class="min-vh-100 p-4 p-md-5">
        <div class="container" style="max-width: 1140px;">

            <div class="mb-5 text-center text-md-start">
                <h1 class="h3 fw-bold mb-2">Sistema de Reservas Hoteleras</h1>
                <p class="text-muted-foreground mb-0">Complete los pasos para confirmar su reserva en Hotel Pacific Reef
                </p>
            </div>

            <div class="mb-5 max-w-3xl mx-auto" style="max-width: 768px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column align-items-center position-relative z-1">
                        <div class="step-circle active" id="indicator-1">1</div>
                        <span class="mt-2 small fw-medium d-none d-md-block" id="label-1">Buscar Habitación</span>
                    </div>
                    <div class="step-line" id="line-1"></div>
                    <div class="d-flex flex-column align-items-center position-relative z-1">
                        <div class="step-circle" id="indicator-2">2</div>
                        <span class="mt-2 small text-muted-foreground d-none d-md-block" id="label-2">Datos del
                            Huésped</span>
                    </div>
                    <div class="step-line" id="line-2"></div>
                    <div class="d-flex flex-column align-items-center position-relative z-1">
                        <div class="step-circle" id="indicator-3">3</div>
                        <span class="mt-2 small text-muted-foreground d-none d-md-block" id="label-3">Pago</span>
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-3 border border-border p-4 p-md-5 shadow-sm">

                <div id="step-1">
                    <h2 class="h5 fw-bold mb-4">Buscar Habitación Disponible</h2>

                    <div class="row g-3 mb-5">
                        <div class="col-md-4 col-lg-2">
                            <label class="form-label small"><i class="bi bi-calendar3"></i> Entrada</label>
                            <input type="date" class="form-control" id="filter-checkin" min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label class="form-label small"><i class="bi bi-calendar3"></i> Salida</label>
                            <input type="date" class="form-control" id="filter-checkout">
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label class="form-label small"><i class="bi bi-people"></i> Huéspedes</label>
                            <select class="form-select" id="filter-guests">
                                <option value="1">1 Huésped</option>
                                <option value="2" selected>2 Huéspedes</option>
                                <option value="3">3 Huéspedes</option>
                                <option value="4">4 Huéspedes</option>
                                <option value="5">5 Huéspedes</option>
                                <option value="6">6 Huéspedes</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label class="form-label small">Precio Min ($)</label>
                            <input type="number" class="form-control" id="filter-minprice" placeholder="0">
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label class="form-label small">Precio Max ($)</label>
                            <input type="number" class="form-control" id="filter-maxprice" placeholder="1000">
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label class="form-label small">Tipo</label>
                            <select class="form-select" id="filter-type">
                                <option value="">Todos</option>
                                <option value="Suite">Suite</option>
                                <option value="Estándar">Estándar</option>
                                <option value="Suite Premium">Suite Premium</option>
                                <option value="Individual">Individual</option>
                                <option value="Familiar">Familiar</option>
                            </select>
                        </div>
                        <div class="col-12 mt-3 text-end">
                            <button class="btn btn-primary-custom px-4 py-2" onclick="filterRooms()">
                                <i class="bi bi-search"></i> Buscar Habitaciones
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="h6 fw-bold mb-0" id="results-count">Habitaciones Disponibles (5)</h3>
                        <span class="small text-muted-foreground">Actualizado en tiempo real</span>
                    </div>

                    <div class="row g-4" id="rooms-grid">
                    </div>
                </div>

                <div id="step-2" class="d-none">
                    <div class="row g-5">
                        <div class="col-lg-8 order-2 order-lg-1">
                            <h2 class="h5 fw-bold mb-2">Datos del Huésped</h2>
                            <p class="text-muted-foreground small mb-4">Complete su información personal para continuar
                            </p>

                            <form id="guest-form" onsubmit="handleGuestSubmit(event)">
                                <div class="row g-4 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium"><i class="bi bi-person"></i> Nombre
                                            *</label>
                                        <input type="text" class="form-control" id="guest-firstName" required
                                            minlength="2" placeholder="Juan">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium"><i class="bi bi-person"></i> Apellido
                                            *</label>
                                        <input type="text" class="form-control" id="guest-lastName" required
                                            minlength="2" placeholder="Pérez">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium"><i class="bi bi-credit-card"></i> DNI
                                            / Pasaporte *</label>
                                        <input type="text" class="form-control" id="guest-document" required
                                            minlength="5" placeholder="12345678A">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium"><i class="bi bi-envelope"></i> Correo
                                            Electrónico *</label>
                                        <input type="email" class="form-control" id="guest-email" required
                                            placeholder="juan.perez@email.com">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-medium"><i class="bi bi-telephone"></i>
                                            Teléfono *</label>
                                        <input type="tel" class="form-control" id="guest-phone" required
                                            placeholder="+56 9 1234 5678">
                                    </div>
                                </div>

                                <div class="bg-light p-3 rounded text-muted-foreground small mb-4">
                                    Al continuar, acepta que sus datos personales sean procesados de acuerdo con nuestra
                                    política de privacidad. Sus datos serán utilizados únicamente para gestionar su
                                    reserva.
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary px-4 py-2"
                                        onclick="goToStep(1)">
                                        <i class="bi bi-arrow-left"></i> Volver
                                    </button>
                                    <button type="submit" class="btn btn-primary-custom px-4 py-2">
                                        Continuar al Pago
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-4 order-1 order-lg-2">
                            <div class="bg-light p-4 rounded-3 border border-border sticky-top" style="top: 2rem;">
                                <h3 class="h6 fw-bold mb-3">Resumen de Reserva</h3>
                                <div class="d-flex flex-column gap-3 small">
                                    <div><span class="text-muted-foreground d-block">Habitación:</span> <span
                                            class="fw-medium" id="summary-room-name">-</span></div>
                                    <div><span class="text-muted-foreground d-block">Huéspedes:</span> <span
                                            class="fw-medium" id="summary-guests">-</span></div>
                                    <div><span class="text-muted-foreground d-block">Entrada:</span> <span
                                            class="fw-medium" id="summary-checkin">-</span></div>
                                    <div><span class="text-muted-foreground d-block">Salida:</span> <span
                                            class="fw-medium" id="summary-checkout">-</span></div>
                                    <div><span class="text-muted-foreground d-block">Noches:</span> <span
                                            class="fw-medium" id="summary-nights">-</span></div>
                                    <hr class="my-1">
                                    <div><span class="text-muted-foreground d-block">Total:</span> <span
                                            class="fw-bold text-primary-custom fs-5" id="summary-total">-</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="step-3" class="d-none">
                    <div class="row g-5">
                        <div class="col-lg-8">
                            <h2 class="h5 fw-bold mb-2">Método de Pago</h2>
                            <p class="text-muted-foreground small mb-4">Seleccione su método de pago preferido</p>

                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <div class="payment-toggle selected text-center" id="toggle-card"
                                        onclick="setPaymentMethod('card')">
                                        <i class="bi bi-credit-card fs-3 mb-2 d-block"></i>
                                        <div class="fw-medium">Tarjeta de Crédito</div>
                                        <div class="small text-muted-foreground">Visa, Mastercard</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="payment-toggle text-center" id="toggle-bank"
                                        onclick="setPaymentMethod('bank')">
                                        <i class="bi bi-bank fs-3 mb-2 d-block"></i>
                                        <div class="fw-medium">Transferencia</div>
                                        <div class="small text-muted-foreground">Bancaria</div>
                                    </div>
                                </div>
                            </div>

                            <form id="form-card" onsubmit="processPayment(event)">
                                <div
                                    class="bg-light p-3 rounded border border-border small text-muted-foreground mb-4 d-flex align-items-center gap-2">
                                    <i class="bi bi-lock-fill"></i> Pago seguro con encriptación SSL
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium">Número de Tarjeta *</label>
                                    <input type="text" class="form-control" required pattern="[0-9]{16}" maxlength="16"
                                        placeholder="1234567890123456">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium">Nombre del Titular *</label>
                                    <input type="text" class="form-control" required minlength="3"
                                        placeholder="JUAN PEREZ">
                                </div>
                                <div class="row g-3 mb-4">
                                    <div class="col-6">
                                        <label class="form-label small fw-medium">Expiración *</label>
                                        <input type="text" class="form-control" required
                                            pattern="^(0[1-9]|1[0-2])\/([0-9]{2})$" placeholder="MM/AA" maxlength="5">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small fw-medium">CVV *</label>
                                        <input type="text" class="form-control" required pattern="[0-9]{3,4}"
                                            placeholder="123" maxlength="4">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary px-4 py-2 btn-back"
                                        onclick="goToStep(2)">
                                        <i class="bi bi-arrow-left"></i> Volver
                                    </button>
                                    <button type="submit" class="btn btn-primary-custom px-4 py-2 w-50 btn-pay">
                                        <i class="bi bi-lock-fill"></i> Pagar <span id="pay-btn-amount"></span>
                                    </button>
                                </div>
                            </form>

                            <form id="form-bank" class="d-none" onsubmit="processPayment(event)">
                                <div class="bg-light p-3 rounded border border-border small text-muted-foreground mb-4">
                                    <p class="mb-2">Una vez confirmada la reserva, recibirá un correo con los datos
                                        bancarios para realizar la transferencia.</p>
                                    <p class="mb-0">La reserva se confirmará una vez recibamos el pago (generalmente
                                        24-48 horas).</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium">Titular de la Cuenta *</label>
                                    <input type="text" class="form-control" required minlength="3"
                                        placeholder="Juan Pérez">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium">Número de Cuenta / IBAN *</label>
                                    <input type="text" class="form-control" required minlength="10"
                                        placeholder="ES12 1234 5678 9012 3456 7890">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label small fw-medium">Nombre del Banco *</label>
                                    <input type="text" class="form-control" required minlength="3"
                                        placeholder="Banco Santander">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary px-4 py-2 btn-back"
                                        onclick="goToStep(2)">
                                        <i class="bi bi-arrow-left"></i> Volver
                                    </button>
                                    <button type="submit" class="btn btn-primary-custom px-4 py-2 w-50 btn-pay">
                                        Confirmar Reserva
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-4">
                            <div class="bg-light p-4 rounded-3 border border-border sticky-top" style="top: 2rem;">
                                <h3 class="h6 fw-bold mb-4">Resumen del Pedido</h3>
                                <div class="small mb-4 pb-3 border-bottom border-border">
                                    <div class="mb-3">
                                        <div class="text-muted-foreground">Habitación</div>
                                        <div class="fw-medium" id="final-room">-</div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="text-muted-foreground">Huésped</div>
                                        <div class="fw-medium" id="final-guest">-</div>
                                    </div>
                                    <div>
                                        <div class="text-muted-foreground">Fechas</div>
                                        <div class="fw-medium" id="final-dates">-</div>
                                    </div>
                                </div>
                                <div class="small mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted-foreground" id="final-calc-text">-</span>
                                        <span id="final-subtotal">-</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted-foreground">IVA (21%)</span>
                                        <span id="final-tax">-</span>
                                    </div>
                                </div>
                                <div
                                    class="d-flex justify-content-between align-items-center pt-3 border-top border-border fw-bold">
                                    <span>Total</span>
                                    <span class="text-primary-custom fs-5" id="final-total">-</span>
                                </div>
                                <div class="mt-4 p-2 bg-white rounded text-center text-muted-foreground"
                                    style="font-size: 0.7rem;">
                                    <i class="bi bi-shield-lock"></i> Transacción 100% segura y encriptada
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // 1. Estado y Datos
        const mockRooms = [
            { id: 1, name: 'Suite Ejecutiva', type: 'Suite', price: 150, available: 3, image: 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=400&h=250&fit=crop', amenities: ['WiFi', 'TV', 'Minibar', 'Vista al mar'], maxGuests: 2 },
            { id: 2, name: 'Habitación Doble Estándar', type: 'Estándar', price: 89, available: 5, image: 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=400&h=250&fit=crop', amenities: ['WiFi', 'TV', 'Aire acondicionado'], maxGuests: 2 },
            { id: 3, name: 'Suite Presidencial', type: 'Suite Premium', price: 350, available: 1, image: 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&h=250&fit=crop', amenities: ['WiFi', 'TV', 'Minibar', 'Jacuzzi', 'Balcón'], maxGuests: 4 },
            { id: 4, name: 'Habitación Individual', type: 'Individual', price: 65, available: 8, image: 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?w=400&h=250&fit=crop', amenities: ['WiFi', 'TV'], maxGuests: 1 },
            { id: 5, name: 'Suite Familiar', type: 'Familiar', price: 200, available: 2, image: 'https://images.unsplash.com/photo-1560185007-5f0bb1866cab?w=400&h=250&fit=crop', amenities: ['WiFi', 'TV', 'Cocina', 'Sala'], maxGuests: 6 }
        ];

        let bookingData = {
            room: null,
            guests: 1,
            checkIn: '',
            checkOut: '',
            guestDetails: null,
            nights: 0,
            total: 0
        };

        // 2. Renderizado Inicial de Habitaciones
        function renderRooms(rooms) {
            const grid = document.getElementById('rooms-grid');
            grid.innerHTML = '';

            if (rooms.length === 0) {
                grid.innerHTML = '<div class="col-12 text-center py-5 text-muted-foreground"><i class="bi bi-search fs-1 mb-3 d-block opacity-50"></i><p>No se encontraron habitaciones.</p></div>';
                return;
            }

            rooms.forEach(room => {
                const amenitiesHtml = room.amenities.slice(0, 3).map(a => `<span class="amenity-badge">${a}</span>`).join('');
                const extraAmenities = room.amenities.length > 3 ? `<span class="small text-muted-foreground ms-1">+${room.amenities.length - 3} más</span>` : '';
                const btnState = room.available === 0 ? 'disabled' : '';
                const btnText = room.available === 0 ? 'No Disponible' : 'Seleccionar Habitación';

                grid.innerHTML += `
                    <div class="col-md-6 col-lg-6">
                        <div class="room-card bg-card h-100 d-flex flex-column">
                            <div class="position-relative" style="height: 200px;">
                                <img src="${room.image}" class="w-100 h-100 object-fit-cover" alt="${room.name}">
                                <div class="position-absolute top-0 end-0 m-2 bg-primary-custom px-3 py-1 rounded-pill small">
                                    ${room.available} disponibles
                                </div>
                            </div>
                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <h4 class="h6 fw-bold mb-1">${room.name}</h4>
                                        <p class="small text-muted-foreground mb-0">${room.type}</p>
                                    </div>
                                    <div class="text-end">
                                        <div class="text-primary-custom fw-bold">$${room.price}</div>
                                        <div class="small text-muted-foreground" style="font-size: 0.7rem;">por noche</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 mb-4">${amenitiesHtml} ${extraAmenities}</div>
                                <div class="mt-auto">
                                    <div class