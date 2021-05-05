<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaProductoController;
use App\Http\Controllers\ListaDocumentosController;
use App\Http\Controllers\CrearCreditoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\lobyController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {return view('auth.login');});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/listaProductos', ListaProductoController::class)->name('listaP');
Route::get('/listaDocumentos',ListaDocumentosController::class);
Route::get('/listaDocumentos/{idTipo_Documento}',ListaDocumentosController::class);
Route::get('/crearCredito',CrearCreditoController::class);
Route::get('/agregarp',[ProductoController::class,'create'])->name('agregarp');
Route::post('/agregarp',[ProductoController::class,'store'])->name('agregarp.lista');
Route::get('/modificarp/{id}',[ProductoController::class,'edit'])->name('edit');
Route::patch('/modificarp/producto/{id}', [ProductoController::class,'update'])->name('update');
Route::get('/loby', [lobyController::class, 'index'])->name('loby');
Route::get('/historial',[HistorialController::class,'index'])->name('historial');
