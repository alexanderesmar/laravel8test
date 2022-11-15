<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/facturas', [App\Http\Controllers\FacturasController::class, 'index'])->name('facturas');
Route::get('/factura/{id}', [App\Http\Controllers\FacturasController::class, 'show'])->name('ver_factura');
Route::get('/facturar', [App\Http\Controllers\FacturasController::class, 'facturar'])->name('facturar');

Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos');
Route::get('/productos/crear', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos_crear');
Route::post('/productos/store', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos_guardar');
Route::get('/productos/ver/{id}', [App\Http\Controllers\ProductosController::class, 'show'])->name('productos_editar');
Route::get('/productos/editar/{id}', [App\Http\Controllers\ProductosController::class, 'edit'])->name('productos_editar');
Route::put('/productos/update/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos_actualizar');
Route::delete('/productos/delete/{id}', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos_borrar');

Route::post('/buy', [App\Http\Controllers\ComprasController::class, 'store'])->name('comprar');


