<?php

namespace App\Http\Controllers;


use App\Models\Documento;
use App\Models\tipo_movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request) {
            $mov = tipo_movimiento::all();
            $datas = trim($request->get('buscar'));
            $movimiento = DB::table('documento')
            ->join('tipo_movimiento', 'documento.Tipo_Movimiento_idTipo_Movimiento', '=', 'tipo_movimiento.idTipo_Movimiento')
            ->select('idDocumento','Numero_Documento','Valor_Total','Precio','Fecha_emision','DescripcionM','Tipo_Documento_idTipo_Documento')
            ->where('idTipo_Movimiento','LIKE','%' . $datas . '%')->get();
            return view('historial.vista',compact('datas','movimiento','mov'));
        }
    }

    public function store(Request $request)
    {
        //
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
