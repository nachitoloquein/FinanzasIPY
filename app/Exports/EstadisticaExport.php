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

    public function collection()
    {
        $Cantidad = DB::table('detalle_documento') 
        ->Select( DB::raw('count(idDetalle_documento)','sum(Cantidad) as ','sum(detalle_documento)','count(Nombre)'))
        ->join('documento','detalle_documento.Documentos_idDocumentos','=','documento.idDocumento')
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
