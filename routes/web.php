<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaProductoController;
use App\Http\Controllers\ListaDocumentosController;
use App\Http\Controllers\CrearCreditoController;
use App\Http\Controllers\crearDebitoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\lobyController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaginaPrincipalController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\pagoController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/listaProductos', ListaProductoController::class)->name('listaP');
Route::get('/listaDocumentos',ListaDocumentosController::class)->name('documentos');
Route::get('/listaDocumentos/{tipo}',[ListaDocumentosController::class,'__invoke']);
Route::get('/crearCredito',[CrearCreditoController::class,'index'])->name('CrearCredito');
Route::post('/crearCredito',[CrearCreditoController::class,'store'])->name('notaC');
Route::get('/crearDebito',crearDebitoController::class);
Route::get('/agregarp',[ProductoController::class,'create'])->name('agregarp');
Route::post('/agregarp',[ProductoController::class,'store'])->name('agregarp.lista');
Route::get('/modificarp/{id}',[ProductoController::class,'edit'])->name('edit');
Route::patch('/modificarp/producto/{id}', [ProductoController::class,'update'])->name('update');
Route::get('/historial',[HistorialController::class,'index'])->name('historial');
Route::post('/home',PaginaPrincipalController::class);
Route::get('/agregarProveedor',[proveedorController::class,'index'])->name('agregarProveedor');
Route::post('/agregarProveedor',[proveedorController::class,'store'])->name('agregarProveedor.lista');
Route::get('/listaProveedores',[proveedorController::class,'obtenerDatos'])->name('listaProveedores');
Route::get('/pago/{id}',[pagoController::class,'pago'])->name('pago');
Route::get('ventas-list-excel', [ListaDocumentosController::class, 'exportExcel'])->name('documentos.excel');


