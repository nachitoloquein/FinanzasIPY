<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\documento;


class crearCreditoController extends Controller
{

    public function store(Request $request)
    {
        $documento = new documento();
        $documento->Numero_Documento = $request->nDocumento;
        $documento->Valor_Total = $request->vTotal;
        $documento->precio = $request->precio;
        $documento->Fecha_emision = $request->fecEmision;
        $documento->Tipo_Movimiento_idTipo_Movimiento = 2;
        $documento->Tipo_documento_idTipo_Documento = 4;
        $documento->Usuario_idUsuario = 1;
        $documento->Estado_Venta_idEstado_Venta = 1;
        $documento->save();
        return redirect()->route('documentos');
    }

    public function crearCredito($idDocumento)
    {
        $doc = documento::find($idDocumento);
        if ($doc == null) {
            return view('error');
        }

        return view('dashboards.crearCredito', compact('doc'));
    }

    public function update(Request $request, $idDocumento)
    {
        $variables = $request->all();

        $a1 = $variables['Valor_Total'];
        $a2 = $variables['Precio'];
        $a3 = $a2 - $a1;
        $fecha = $variables['Fecha_emision'];
        $detalle = $variables['Detalle'];
        $doc = new Documento();
        $doc->Valor_Total = $a3;
        $doc->Numero_Documento = $idDocumento;
        $doc->Tipo_Documento_idTipo_Documento = 4;
        $doc->idDocumento = $idDocumento + 100;
        $doc->Tipo_Movimiento_idTipo_Movimiento = 2;
        $doc->Usuario_idUsuario = 2;
        $doc->Fecha_emision = $fecha;
        $doc->Estado_Venta_idEstado_Venta = 1;
        $doc->Detalle = $detalle;
        $doc->save();
        $anterior = Documento::find($idDocumento);
        $anterior->activo = 0;
        $anterior->save();
        return redirect()->route('documentos');
    }
}
