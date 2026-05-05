@extends('layouts.app')

@section('content')
    <div class="position-relative"
        style="height: 600px; background: linear-gradient(rgba(8, 145, 178, 0.3), rgba(6, 182, 212, 0.3)), url('https://images.unsplash.com/photo-1763415674390-fc606bc292ac?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBjb2FzdGFsJTIwaG90ZWwlMjBleHRlcmlvciUyMG9jZWFuJTIwdmlld3xlbnwxfHx8fDE3NzYzNTI4Nzh8MA&ixlib=rb-4.1.0&q=80&w=1080'); background-size: cover; background-position: center;">
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center">
            <h1 class="display-3 mb-4" style="color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">
                Bienvenido al Paraíso
            </h1>
            <p class="lead mb-5" style="color: white; font-size: 1.3rem; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                Experimenta la vida costera de lujo en Hotel Pacific Reef
            </p>
            <div class="card shadow-lg" style="max-width: 900px; width: 100%; border-radius: 12px; border: none;">
                <div class="card-body p-4">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3 text-start">
                            <label class="form-label" style="color: #0891b2; font-weight: 500;">
                                📅 Entrada
                            </label>
                            <input type="date" id="checkin-date" class="form-control form-control-lg"
                                style="border-color: #0891b2;">
                        </div>
                        <div class="col-md-3 text-start">
                            <label class="form-label" style="color: #0891b2; font-weight: 500;">
                                📅 Salida
                            </label>
                            <input type="date" id="checkout-date" class="form-control form-control-lg"
                                style="border-color: #0891b2;">
                        </div>
                        <div class="col-md-3 text-start">
                            <label class="form-label" style="color: #0891b2; font-weight: 500;">
                                👥 Huéspedes
                            </label>
                            <select class="form-select form-select-lg" style="border-color: #0891b2;">
                                <option value="1">1 Huésped</option>
                                <option value="2" selected>2 Huéspedes</option>
                                <option value="3">3 Huéspedes</option>
                                <option value="4">4 Huéspedes</option>
                                <option value="5">5+ Huéspedes</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('rooms.available') }}" class="btn btn-lg w-100"
                                style="background-color: #0891b2; color: white; border: none; font-weight: 500;">
                                🔍 Buscar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5" id="book">
        <div class="text-center mb-5">
            <h2 class="display-5 mb-3" style="color: #0891b2;">Nuestras Habitaciones</h2>
            <p class="lead text-muted">Elige entre nuestra selección de habitaciones bellamente decoradas</p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card h-100 shadow" style="border-radius: 12px; border: none; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1611501239910-81bc09b19e80?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800"
                        alt="Habitación Individual" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column text-start">
                        <h5 class="card-title fw-bold" style="color: #0891b2;">Habitación Individual</h5>
                        <p class="card-text text-muted flex-grow-1">Habitación acogedora perfecta para viajeros
                            solitarios con vistas al océano y comodidades modernas.</p>

                        <div class="mb-3">
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">1 Cama
                                Queen</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">Vista al
                                Mar</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">WiFi
                                Gratis</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">Mini Bar</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span style="color: #0891b2; font-size: 1.5rem; font-weight: 600;">$120</span>
                                <span class="text-muted"> / noche</span>
                            </div>
                            <a href="/reservar/pasos" class="btn"
                                style="background-color: #0891b2; color: white; border: none; font-weight: 500;">Reservar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow" style="border-radius: 12px; border: none; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1603152481281-9fc1b9810e10?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800"
                        alt="Habitación Doble" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column text-start">
                        <h5 class="card-title fw-bold" style="color: #0891b2;">Habitación Doble</h5>
                        <p class="card-text text-muted flex-grow-1">Habitación espaciosa con dos camas cómodas,
                            ideal para familias o amigos.</p>

                        <div class="mb-3">
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">2 Camas
                                Queen</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">Vista al
                                Mar</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">WiFi
                                Gratis</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">Balcón</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span style="color: #0891b2; font-size: 1.5rem; font-weight: 600;">$180</span>
                                <span class="text-muted"> / noche</span>
                            </div>
                            <a href="/reservar/pasos" class="btn"
                                style="background-color: #0891b2; color: white; border: none; font-weight: 500;">Reservar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow" style="border-radius: 12px; border: none; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1775866914767-7e4646f2481a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800"
                        alt="Suite de Lujo" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column text-start">
                        <h5 class="card-title fw-bold" style="color: #0891b2;">Suite de Lujo</h5>
                        <p class="card-text text-muted flex-grow-1">Suite premium con sala de estar separada,
                            comodidades premium y panorama impresionante del océano.</p>

                        <div class="mb-3">
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">1 Cama
                                King</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">Sala de
                                Estar</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">Vista al
                                Mar</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">Jacuzzi</span>
                            <span class="badge me-2 mb-2"
                                style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">Premium</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span style="color: #0891b2; font-size: 1.5rem; font-weight: 600;">$350</span>
                                <span class="text-muted"> / noche</span>
                            </div>
                            <a href="/reservar/pasos" class="btn"
                                style="background-color: #0891b2; color: white; border: none; font-weight: 500;">Reservar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="py-5" style="background-color: #e0f2fe;">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="p-4">
                        <div class="mb-3" style="font-size: 3rem;">🏖️</div>
                        <h4 style="color: #0891b2; font-weight: bold;">Acceso a la Playa</h4>
                        <p class="text-muted">Acceso directo a playas de arena blanca prístina</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4">
                        <div class="mb-3" style="font-size: 3rem;">🍽️</div>
                        <h4 style="color: #0891b2; font-weight: bold;">Gastronomía</h4>
                        <p class="text-muted">Restaurantes premiados con vistas al océano</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4">
                        <div class="mb-3" style="font-size: 3rem;">💆</div>
                        <h4 style="color: #0891b2; font-weight: bold;">Spa y Bienestar</h4>
                        <p class="text-muted">Centro de spa y bienestar de servicio completo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkinInput = document.getElementById('checkin-date');
            const checkoutInput = document.getElementById('checkout-date');

            // Establecer la fecha mínima de entrada para que sea hoy
            const today = new Date().toISOString().split('T')[0];
            checkinInput.setAttribute('min', today);

            checkinInput.addEventListener('change', function () {
                if (this.value) {
                    // Cuando se selecciona la fecha de entrada, se establece la fecha mínima de salida
                    const checkinDate = new Date(this.value);

                    // La fecha de salida debe ser al menos un día después de la entrada
                    checkinDate.setDate(checkinDate.getDate() + 1);
                    const nextDay = checkinDate.toISOString().split('T')[0];

                    checkoutInput.setAttribute('min', nextDay);

                    // Si la fecha de salida no está configurada o es anterior a la nueva mínima, la actualizamos
                    if (!checkoutInput.value || checkoutInput.value <= this.value) {
                        checkoutInput.value = nextDay;
                    }
                }
            });
        });
    </script>
@endsection