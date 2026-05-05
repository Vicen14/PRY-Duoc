<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvailableRoomsController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});

// --- RUTA DE LOGIN ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- RUTA DE REGISTRO ---
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// --- RUTAS DE ADMINISTRACIÓN ---
// Vista Principal Admin
Route::get('/admin/dashboard', function () {
    if (!session('is_admin')) {
        return redirect()->route('login');
    }
    return view('admin.dashboard');
})->name('admin.dashboard');

// Gestión de Operaciones (Habitaciones, Precios, etc.)
Route::get('/admin/operaciones', function () {
    if (!session('is_admin')) {
        return redirect()->route('login');
    }
    return view('admin.operaciones');
})->name('admin.operaciones');

// --- RUTA DE RESERVA (USUARIO FINAL) ---
// Flujo de Reserva
Route::get('/reservar/pasos', function () {
    return view('reserva.flujo');
});

// Habitaciones disponibles
Route::get('/habitaciones', [AvailableRoomsController::class, 'index'])->name('rooms.available');

// Ruta para buscar habitaciones disponibles
Route::get('/rooms/search', [RoomController::class, 'search'])->name('rooms.search');

// --- HISTORIAL DE RESERVAS (USUARIO) ---
use App\Http\Controllers\HistorialController;
Route::middleware('auth')->get('/historial', [HistorialController::class, 'index'])->name('historial');
