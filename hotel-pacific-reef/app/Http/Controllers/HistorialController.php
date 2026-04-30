<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Buscar el guest_id asociado al usuario
        $guest = DB::table('guests')->where('email', $user->email)->first();
        $reservas = [];
        if ($guest) {
            $reservas = DB::table('reservations')
                ->where('guest_id', $guest->id)
                ->orderByDesc('created_at')
                ->get();
        }
        // Puedes mejorar esto usando Eloquent y relaciones si tienes los modelos
        return view('historial', compact('reservas'));
    }
}
