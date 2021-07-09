<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\documento;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.agregarDocumento');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $documento = new documento();
        $documento->Numero_Documento = $request->numDoc;
        $documento->Fecha_emision = $request->fechaE;
        $documento->Valor_Total = $request->valTot;
        $documento->IVA = $request->iva;
        $documento->Tipo_Documento_idTipo_Documento = $request->tDoc;
        $documento->Tipo_Movimiento_idTipo_Movimiento = $request->tMov;
        $documento->Estado_Venta_idEstado_Venta = $request->est;
        $documento->Usuario_idUsuario = 1;
        $documento->save();

        return redirect()->route('documentos');
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
