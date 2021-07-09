<?php

namespace App\Exports;


use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EstadisticaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    ##public function collection1(){
##
    ##    $Proveedor = DB::table('persona')
    ##    ->Select( DB::raw("count(Nombre) as Cantidad_Proveedor"))
    ##    ->get();
##
    ##    return $Proveedor;
    ##}
##
    public function collection()
    {
        $Cantidad = DB::table('detalle_documento') 
        ->Select( DB::raw('count(idDetalle_documento)'))
        ->addSelect( DB::raw('sum(Cantidad)'))
        ->addSelect( DB::raw('sum(detalle_documento.Valor_Total_Bruto)'))
        ->addSelect( DB::raw('count(Nombre)'))

        ->join('documento','detalle_documento.Documento_idDocumento','=','documento.idDocumento')
        ->join('usuario','documento.Usuario_idUsuario','=','usuario.idUsuario')
        ->join('persona','usuario.Persona_idPersona','=','persona.idPersona')     
        ->get();

        return $Cantidad;

    }
    public function headings(): array
    {
        return [
            'Total Ventas',
            'Stock',
            'Total Ingresos',
            'Proveedores',
        ];
    }
}
