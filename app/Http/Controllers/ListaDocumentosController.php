<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaDocumentosController extends Controller
{
    public function __invoke(){
        $documentos = \DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->select('documento.*', 'tipo_documento.Descripcion')
                    ->orderBy('idDocumento')
                    ->get([]);
        $tipos = \DB::table('tipo_documento')
                    ->select('tipo_documento.*')
                    ->get();
    return view('/dashboards/listaDocumentos',compact('documentos','tipos'));
    }

}
