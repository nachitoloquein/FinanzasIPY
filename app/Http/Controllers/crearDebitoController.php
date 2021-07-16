<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\documento;
use Illuminate\Support\Facades\DB;


class crearDebitoController extends Controller
{
    public function __invoke(){
        return view('dashboards.crearDebito');
    }

    public function store(Request $request)
    {
        $documento = new documento();
        $documento->idDocumento=$request->idD;
        $documento->Numero_Documento=$request->nDocumento;
        $documento->Valor_Total=$request->vTotal;
        $documento->precio=$request->precio;
        $documento->Fecha_emision=$request->fecEmision;
        $documento->Tipo_Movimiento_idTipo_Movimiento=2;
        $documento->Tipo_documento_idTipo_Documento=4;
        $documento->Usuario_idUsuario=1;
        $documento->Estado_Venta_idEstado_Venta=1;
        $documento->save();
        return redirect()->route('documentos');
    }

    public function crearDebito($idDocumento)
    {
        $doc = documento::findOrFail($idDocumento);
        return view('dashboards.crearDebito', compact('doc'));
    }

    public function AgregarNotaDebito($idDocumento)
    {
       $documentoUpdate = documento::findOrFail($idDocumento);
       /*$documento->Numero_Documento=documento::find($Numero_Documento);
       $documento->Valor_Total=documento::find($Valor_Total);
       $documento->precio=documento::find($precio);
       $documento->Fecha_emision=documento::find($Fecha_emision);
       $documento->Fecha_vencimiento=documento::find($Fecha_vencimiento);
       $documento->Iva=documento::find($Iva);
       $documento->Giro=documento::find($Giro);
       $documento->Tipo_Movimiento_idTipo_Movimiento=documento::find($Tipo_Movimiento_idTipo_Movimiento);*/
       $documentoUpdate->Tipo_documento_idTipo_Documento=4;
       /*$documento->Usuario_idUsuario=documento::find($Usuario_idUsuario);
       $documento->Estado_Venta_idEstado_Venta=documento::find($Estado_Venta_idEstado_Venta);*/
       $documentoUpdate->save();
       return redirect()->route('documentos');
    }
    
}
