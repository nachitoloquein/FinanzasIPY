<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\documento;
use Illuminate\Support\Facades\DB;

class crearCreditoController extends Controller
{
    /*
    public function index(){
        return view('dashboards.crearCredito');
    }
    */

    public function store(Request $request)
    {
        $documento = new documento();
        $documento->Numero_Documento=$request->nDocumento;
        $documento->Valor_Total=$request->vTotal;
        $documento->precio=$request->precio;
        $documento->Fecha_emision=$request->fecEmision;
        $documento->Tipo_Movimiento_idTipo_Movimiento=2;
        $documento->Tipo_documento_idTipo_Documento=3;
        $documento->Usuario_idUsuario=1;
        $documento->Estado_Venta_idEstado_Venta=1;
        $documento->save();
        return redirect()->route('documentos');

    }

    public function crearCredito($idDocumento)
    {
        $doc = documento::findOrFail($idDocumento);
        return view('dashboards.crearCredito', compact('doc'));
    }

     public function AgregarNotaCredito($idDocumento)
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
        $documentoUpdate->Tipo_documento_idTipo_Documento=3;
        /*$documento->Usuario_idUsuario=documento::find($Usuario_idUsuario);
        $documento->Estado_Venta_idEstado_Venta=documento::find($Estado_Venta_idEstado_Venta);*/
        $documentoUpdate->save();
        return redirect()->route('documentos');
     }


/*
    public function AgregarNotaCredito($Numero_Documento, $Valor_Total, $precio, $Fecha_emision, $Fecha_vencimiento, $Iva, $Giro, $Tipo_Movimiento_idTipo_Movimiento, $Usuario_idUsuario, $Estado_Venta_idEstado_Venta )
    {
        $numDoc = documento::find($Numero_Documento);
        $valorTotal = documento::find($Valor_Total);
        $precio = documento::find($precio );
        $Fecha_emision = documento::find($Fecha_emision);
        $Fecha_vencimiento = documento::find($Fecha_vencimiento);
        $Iva = documento::find($Iva);
        $Giro = documento::find($Giro);
        $Tipo_Movimiento_idTipo_Movimiento = documento::find($Tipo_Movimiento_idTipo_Movimiento);
        $Usuario_idUsuario = documento::find($Usuario_idUsuario);
        $Estado_Venta_idEstado_Venta = documento::find($Estado_Venta_idEstado_Venta);
        $documento = new documento();
        $documento->Numero_Documento=$numDoc;
        $documento->Valor_Total=$valorTotal;
        $documento->precio=$precio;
        $documento->Fecha_emision=$Fecha_emision;
        $documento->Fecha_vencimiento=$Fecha_vencimiento;
        $documento->Tipo_Movimiento_idTipo_Movimiento=$Tipo_Movimiento_idTipo_Movimiento;
        $documento->Tipo_documento_idTipo_Documento=3;
        $documento->Usuario_idUsuario=$Usuario_idUsuario;
        $documento->Estado_Venta_idEstado_Venta=$Estado_Venta_idEstado_Venta;
        $documento->save();
        return redirect()->route('documentos');
    }
*/
}
