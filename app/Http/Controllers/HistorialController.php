<?php

namespace App\Http\Controllers;


use App\Models\Documento;
use App\Models\tipo_movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request) {
            $mov = tipo_movimiento::all();
            $datas = trim($request->get('buscar'));
            $movimiento = DB::table('documento')
            ->join('tipo_movimiento', 'documento.Tipo_Movimiento_idTipo_Movimiento', '=', 'tipo_movimiento.idTipo_Movimiento')
            ->select('idDocumento','Numero_Documento','Valor_Total','Precio','Fecha_emision','DescripcionM','Tipo_Documento_idTipo_Documento')
            ->where('idTipo_Movimiento','LIKE','%' . $datas . '%')->get();
            return view('historial.vista',compact('datas','movimiento','mov'));
        }
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
