<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaDocumentosController extends Controller
{
    public function __invoke(){
        $documentos = \DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM')
                    ->orderBy('idDocumento')
                    ->get();
        $tipos = \DB::table('tipo_documento')
                    ->select('tipo_documento.*')
                    ->get();
    return view('/dashboards/listaDocumentos',compact('documentos','tipos'));
    }
<<<<<<< Updated upstream
=======

    public function filtro($id){

        $tipo = Documento::find($id);
        if($tipo == null){
            $documentos = \DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM')
                    ->orderBy('idDocumento')
                    ->get();
            $tipos = \DB::table('tipo_documento')
                    ->select('tipo_documento.*')
                    ->get();
    return view('/dashboards/listaDocumentos',compact('documentos','tipos'));
        }
    return view('/dashboards/listaDocumentos', compact('tipo'));
    }
>>>>>>> Stashed changes
}
