<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// --- RUTAS DE ADMINISTRACIÓN ---
// Vista Principal Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// Gestión de Operaciones (Habitaciones, Precios, etc.)
Route::get('/admin/operaciones', function () {
    return view('admin.operaciones');
});

// --- RUTA DE RESERVA (USUARIO FINAL) ---
// Flujo de Reserva
Route::get('/reservar/pasos', function () {
    return view('reserva.flujo');
});
