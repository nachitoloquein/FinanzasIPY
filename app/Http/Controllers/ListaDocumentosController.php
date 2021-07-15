<?php

namespace App\Http\Controllers;


use App\Models\documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VentasExport;

class ListaDocumentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request){

        $tipo = trim($request->get('select'));
        $tipoE = trim($request->get('estado'));
        $tipoM = trim($request->get('movimiento'));
        $tipos = DB::table('tipo_documento')
                    ->select('tipo_documento.*')
                    ->get();
        $tiposE= DB::table('estado')
                    ->select('estado.*')
                    ->get();
        $tiposM= DB::table('tipo_movimiento')
                    ->select('tipo_movimiento.*')
                    ->get();
        if($tipo != 'Seleccione...' && $tipoM != 'Seleccione...' && $tipoE != 'Seleccione...' && $tipo != null && $tipoE != null && $tipoM != null){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.tipo_documento_idTipo_Documento','=',$tipo)
                    ->where('documento.Estado_Venta_idEstado_Venta','=', $tipoE)
                    ->where('documento.Tipo_Movimiento_idTipo_Movimiento','=', $tipoM)
                    ->orderBy('idDocumento')
                    ->get();
            
            
        }
        else if($tipo == 'Seleccione...' && $tipo == 'Seleccione...' && $tipoE == 'Seleccione...'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->orderBy('idDocumento')
                    ->get();
        }
        else if($tipo != '0' && $tipoE == 'Seleccione...' && $tipoM == 'Seleccione...'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.tipo_documento_idTipo_Documento','=',$tipo)
                    ->orderBy('idDocumento')
                    ->get();
            
            
        }
        else if($tipo == 'Seleccione...' &&$tipoE != '0' && $tipoM == 'Seleccione...'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.Estado_Venta_idEstado_Venta','=', $tipoE)
                    ->orderBy('idDocumento')
                    ->get();
            
            
        }

        
        else if($tipo != '0' &&$tipoE == 'Seleccione...' && $tipoM != '0'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.Tipo_Movimiento_idTipo_Movimiento','=', $tipoM)
                    ->where('documento.tipo_documento_idTipo_Documento','=',$tipo)
                    ->orderBy('idDocumento')
                    ->get();
            
            
        }
        else if($tipo == 'Seleccione...' &&$tipoE != '0' && $tipoM != '0'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.Estado_Venta_idEstado_Venta','=', $tipoE)
                    ->where('documento.Tipo_Movimiento_idTipo_Movimiento','=', $tipoM)
                    ->orderBy('idDocumento')
                    ->get();
            
            
        }
        else if($tipo != '0' &&$tipoE != '0' && $tipoM == 'Seleccione...'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.Estado_Venta_idEstado_Venta','=', $tipoE)
                    ->where('documento.tipo_documento_idTipo_Documento','=',$tipo)
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
        if( $tipoM != 'Seleccione...' && $tipo == 'Seleccione...' && $tipoE == 'Seleccione...'){
            $documentos = DB::table('documento')
                    ->join('tipo_documento','documento.tipo_documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                    ->join('estado','documento.Estado_Venta_idEstado_Venta','=','idestado')
                    ->join('tipo_movimiento','documento.tipo_movimiento_idTipo_movimiento','=','tipo_movimiento.idTipo_movimiento')
                    ->select('documento.*', 'tipo_documento.Descripcion','tipo_movimiento.DescripcionM','estado.DescripcionE')
                    ->where('documento.Tipo_Movimiento_idTipo_Movimiento','=', $tipoM)
                    ->orderBy('idDocumento')
                    ->get();
            
            
        }
    return view('/dashboards/listaDocumentos', compact('documentos','tipo', 'tipos', 'tiposE', 'tipoE', 'tiposM', 'tipoM'));
    }

    public function exportExcel()
    {
        return Excel::download(new VentasExport , 'documentos.xlsx');
    }

    public function filtroBoton()
    {
        DB::table('documento')
        ->where('documento.Estado_Venta_idEstado_Venta','=', 4)
        ->where('Tipo_Movimiento_idTipo_Movimiento','=',1)
        ->get();
    }
   
}

