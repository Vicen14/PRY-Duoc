<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function search(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
            'guests' => 'required|integer|min:1',
        ]);

        // Obtener habitaciones disponibles
        $rooms = Room::where('max_guests', '>=', $validated['guests'])
            ->whereDoesntHave('reservations', function ($query) use ($validated) {
                $query->where(function ($q) use ($validated) {
                    $q->whereBetween('checkin', [$validated['checkin'], $validated['checkout']])
                        ->orWhereBetween('checkout', [$validated['checkin'], $validated['checkout']]);
                });
            })
            ->get();

        // Redirigir a la vista de flujo con las habitaciones disponibles
        return view('reserva.flujo', [
            'rooms' => $rooms,
            'checkin' => $validated['checkin'],
            'checkout' => $validated['checkout'],
            'guests' => $validated['guests'],
        ]);
    }
}