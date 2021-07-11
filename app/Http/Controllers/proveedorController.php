<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;

class proveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region = DB::table('region')
                ->select('region.*')
                ->get();
        $provincia = DB::table('provincia')
                ->select('provincia.*')
                ->get();
        $comuna = DB::table('comuna')
                ->select('comuna.*')
                ->get();

        return view('dashboards.agregarProveedor',compact('region','provincia','comuna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new Persona();
        $proveedor->Tipo_persona_idTipo_persona=3;
        $proveedor->Nombre=$request->Nombre;
        $proveedor->Razon_Social=$request->razonSocialProveedor;
        $proveedor->Run=$request->RutProveedor;
        $proveedor->Correo_electronico=$request->CorreoProveedor;
        $proveedor->Direccion=$request->DireccionProveedor;
        $proveedor->Comuna_idComuna=1;
        $proveedor->Generos_idGenero=1;
        $proveedor->save();
        return redirect()->route('listaProveedores');

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
        //
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
        //
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

    public function obtenerDatos(){
        $proveedores = DB::table('persona')
                        ->select('persona.*')
                        ->where('Tipo_persona_idTipo_persona','=',3)
                        ->get();
        return view('dashboards.listaProveedores',compact('proveedores'));
    }
}
