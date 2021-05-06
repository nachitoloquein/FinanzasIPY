<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ListaDocumentosController extends Controller
{
    /*public function __invoke(){
        
        $documentos = \DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->orderBy('idDocumento')
                    ->get();
        $tipos = \DB::table('tipo_documento')
                    ->select('tipo_documento.*')
                    ->get();
    return view('/dashboards/listaDocumentos',compact('documentos','tipos'));
    }*/

    public function __invoke(Request $request){

        $tipo = trim($request->get('select'));
        $tipoE = trim($request->get('estado'));
        $tipos = DB::table('tipo_documento')
                    ->select('tipo_documento.*')
                    ->get();
        $tiposE= DB::table('estado')
                    ->select('estado.*')
                    ->get();
        if($tipo != 'Seleccione...' && $tipoE != 'Seleccione...' && $tipo != null && $tipoE != null ){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.tipo_documento_idTipo_Documento','=',$tipo)
                    ->where('documento.Estado_Venta_idEstado_Venta','=', $tipoE)
                    ->orderBy('idDocumento')
                    ->get();
            
            
        }
        else if($tipo == 'Seleccione...' && $tipoE == 'Seleccione...'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->orderBy('idDocumento')
                    ->get();
        }
        else if($tipo != '0' && $tipoE == 'Seleccione...'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.tipo_documento_idTipo_Documento','=',$tipo)
                    ->orderBy('idDocumento')
                    ->get();
            
            
        }
        else if($tipo == 'Seleccione...' &&$tipoE != '0'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.Estado_Venta_idEstado_Venta','=', $tipoE)
                    ->orderBy('idDocumento')
                    ->get();
            
            
        }
        else{
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->orderBy('idDocumento')
                    ->get();
        }

        
            
        
    return view('/dashboards/listaDocumentos', compact('documentos','tipo', 'tipos', 'tiposE', 'tipoE'));
    }
}
