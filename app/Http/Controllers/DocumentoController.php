<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\documento;

class DocumentoController extends Controller
{
    public function index()
    {
        return view('dashboards.agregarDocumento');
    }

    public function create()
    {
        //
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
