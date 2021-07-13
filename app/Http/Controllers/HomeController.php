<?php

namespace App\Http\Controllers;

use App\Exports\EstadisticaExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\detalle_documento;
use Maatwebsite\Excel\Facades\Excel;



class HomeController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Cantidad = DB::table('detalle_documento')
        ->Select( DB::raw("count(idDetalle_documento) as detalle_documento"))
        ->addSelect(DB::raw("sum(Cantidad) as Stock"))
        ->addSelect(DB::raw("sum(Valor_Total_Bruto) as Ventas"))
        ->get();

        $Proveedor = DB::table('persona')
        ->Select( DB::raw("count(Nombre) as Cantidad_Proveedor"))
        ->get();

        return view ('estadistica',compact('Cantidad','Proveedor'));
        
    }

    public function exportEstadistica(){

        return Excel::download(new EstadisticaExport, 'estadistica.xlsx');
    }


}
