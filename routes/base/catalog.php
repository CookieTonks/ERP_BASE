<?php

/**
 * This file contains the routes for the tools.
 */

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;


Route::group(['middleware' => ['auth']], function () {
    Route::middleware(['can:catalog_dashboard'])->group(function () {
        Route::get('/catalog/home', [CatalogController::class, 'home'])->name('catalog.home');
        Route::delete('/catalog/destroy/{id}', [CatalogController::class, 'destroy'])->name('clientes.destroy');

        // Route::post('/dashboard/administrador/empleado', [AdministrationController::class, 'empleado'])->name('administracion.empleado');
    });
});
