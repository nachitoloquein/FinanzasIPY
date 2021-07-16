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
        $documento->idDocumento=$request->idD;
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

    public function editar($id)
    {
        $doc = documento::find($id);
        return view('dashboards.crearCredito', compact('doc'));
    }
}
