<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AvailableRoomsController extends Controller
{
    public function index(Request $request)
    {
        // Puedes agregar filtros aquí si lo deseas
        $rooms = Room::all();
        return view('rooms.available', compact('rooms'));
    }
}
