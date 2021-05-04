<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class agregarPController extends Controller
{
    public function __invoke()
    {
        $productos = Producto::paginate();
        return view('Producto.agregarP', compact('productos'));
    }

    public function lista(Request $request){
        $productos = new Producto();
        $productos->Nombre_producto=$request->Nombre_producto;
        $productos->Peso=$request->Peso;
        $productos->Fecha_Elaboracion=$request->Fecha_Elaboracion;
        $productos->Precio=$request->Precio;
        $productos->Marca=$request->Marca;
        $productos->Descripcion=$request->Descripcion;
        $productos->Stock=$request->Stock;
        $productos->Tipo_Producto_idTipo_Producto=$request->Tipo_Producto_idTipo_Producto;
        $productos->save();
        return redirect()->route('home');
    }
    public function Modificarp(Producto $producto){
        return view('Producto.modificarP',compact('productos'));

    }
}

