@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 mb-3" style="color: #0891b2;">Habitaciones Disponibles</h2>
            <p class="lead text-muted">Elige entre nuestra selección de habitaciones bellamente decoradas</p>
        </div>
        <div class="row g-4">
            @forelse($rooms as $room)
                <div class="col-md-4">
                    <div class="card h-100 shadow" style="border-radius: 12px; border: none; overflow: hidden;">
                        <img src="{{ $room->image_url ?? 'https://via.placeholder.com/400x250?text=Habitacion' }}"
                            alt="{{ $room->name }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column text-start">
                            <h5 class="card-title fw-bold" style="color: #0891b2;">{{ $room->name }}</h5>
                            <p class="card-text text-muted flex-grow-1">{{ $room->description }}</p>
                            <div class="mb-3">
                                @if($room->features)
                                    @foreach(explode(',', $room->features) as $feature)
                                        <span class="badge me-2 mb-2"
                                            style="background-color: #e0f2fe; color: #0891b2; font-weight: 500;">{{ trim($feature) }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span
                                        style="color: #0891b2; font-size: 1.5rem; font-weight: 600;">${{ $room->price }}</span>
                                    <span class="text-muted"> / noche</span>
                                </div>
                                <a href="#" class="btn"
                                    style="background-color: #0891b2; color: white; border: none; font-weight: 500;">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">No hay habitaciones disponibles.</div>
            @endforelse
        </div>
    </div>
@endsection