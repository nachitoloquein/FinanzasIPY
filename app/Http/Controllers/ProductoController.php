<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::paginate();
        return view('Producto.agregarP', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        
        $producto = Producto::find($id);
        if ($producto == null){
            $productos = DB::table('producto')
            ->select('producto.*')
            ->orderBy('idProducto')
            ->get();
            echo "<script>alert('Producto no encontrado');</script>";
            return view('dashboards.listaProductos',compact('productos'));
        }
            return view('Producto.modificarP',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->Precio=$request->Precio;
        $producto->save();

        if ($producto == null){
            return view('error');
        }

        return redirect()->route('listaP');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
