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
        Route::post('/catalog/cliente/save/', [CatalogController::class, 'clienteSave'])->name('cliente.save');
        Route::delete('/catalog/cliente/destroy/{id}', [CatalogController::class, 'clienteDestroy'])->name('cliente.destroy');

        Route::post('/catalog/clienteUsuario/save/', [CatalogController::class, 'clienteUsuarioSave'])->name('cliente.usuario.save');
        Route::delete('/catalog/clienteUsuario/destroy/{id}', [CatalogController::class, 'clienteUsuarioDestroy'])->name('cliente.usuario.destroy');



        // Route::post('/dashboard/administrador/clienteUsuario', [AdministrationController::class, 'clienteUsuario'])->name('administracion.clienteUsuario');


        // Route::post('/dashboard/administrador/proveedor', [AdministrationController::class, 'proveedor'])->name('administracion.proveedor');
        // Route::post('/dashboard/administrador/empleado', [AdministrationController::class, 'empleado'])->name('administracion.empleado');

        // Route::post('/dashboard/administrador/empleado', [AdministrationController::class, 'empleado'])->name('administracion.empleado');
    });
});
