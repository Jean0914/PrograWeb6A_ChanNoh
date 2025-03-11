<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

// Rutas para reservas
Route::prefix('reservations')->group(function () {
    Route::get('/', [ReservationController::class, 'index']); // Listar reservas
    Route::post('/', [ReservationController::class, 'store']); // Crear una reserva
    Route::delete('/{id}', [ReservationController::class, 'destroy']); // Cancelar una reserva
});