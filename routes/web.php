<?php

use App\Http\Controllers\BoletaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaProductoController;
use App\Http\Controllers\ListaDocumentosController;
use App\Http\Controllers\CrearCreditoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\pagoController;
use App\Http\Controllers\SoapController;
use App\Http\Controllers\jsonController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\JsonProveedoresController;
use App\Http\Controllers\webpaycontroller;
use App\Http\Controllers\TransaccionController;

//vistas
Route::get('/', function () {return view('auth.login');});
Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/listaProductos', ListaProductoController::class)->name('listaP');
Route::get('/listaDocumentos',ListaDocumentosController::class)->name('documentos');
Route::get('/modificarProv/{id}',[proveedorController::class,'edit'])->name('editproveedor');
Route::get('/eliminarProv/{id}',[proveedorController::class,'destroy'])->name('deleteproveedor');
Route::patch('/modificarProv/proveedor/{id}', [proveedorController::class,'update'])->name('updateproveedor');
Route::get('/eliminarp/{id}',[ProductoController::class,'destroy'])->name('delete');
Route::post('/agregarDocumento',[DocumentoController::class,'store'])->name('agregarD');
Route::get('/agregarDocumento',[DocumentoController::class,'index'])->name('indexDoc');
Route::get('/listaDocumentos/{tipo}',[ListaDocumentosController::class,'__invoke']);
Route::get('/crearCredito/{id}',[CrearCreditoController::class,'editar'])->name('CrearCredito');
Route::post('/crearCredito',[CrearCreditoController::class,'store'])->name('notaC');
Route::get('/historial',[HistorialController::class,'index'])->name('historial');

//métodos
Route::get('/agregarProveedor',[proveedorController::class,'index'])->name('agregarProveedor');
Route::post('/agregarProveedor',[proveedorController::class,'store'])->name('agregarProveedor.lista');
Route::get('/listaProveedores',[proveedorController::class,'obtenerDatos'])->name('listaProveedores');
Route::get('/agregarp',[ProductoController::class,'create'])->name('agregarp');
Route::post('/agregarp',[ProductoController::class,'store'])->name('agregarp.lista');
Route::get('/modificarp/{id}',[ProductoController::class,'edit'])->name('edit');
Route::patch('/modificarp/producto/{id}', [ProductoController::class,'update'])->name('update');

//ruta de integraciones
Route::get('soap',[SoapController::class, 'index'])->name('soap');
Route::get('json',[jsonController::class,'index'])->name('json');
Route::get('/jsonProveedores',[JsonProveedoresController::class,'index'])->name('jsonProveedores');
Route::get('/boletasoap',[BoletaController::class,'index'])->name('boleta');

//ruta de pago
Route::get('/webpay/{id}',[webpaycontroller::class, 'index'])->name('Webpay');
Route::get('/transaccion',[TransaccionController::class, 'index'])->name('transaccion');
Route::get('/pago/{id}',[pagoController::class,'pago'])->name('pago');
Route::get('/confirmacion',[webpaycontroller::class,'confirmar_t'])->name('confirmacion');

//ruta de exportaciones
Route::get('estadistica-excel', [HomeController::class, 'exportEstadistica'])->name('estadistica.exel');
Route::get('ventas-list-excel', [ListaDocumentosController::class, 'exportExcel'])->name('documentos.excel');