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
        ->Select( DB::raw('count(idDetalle_Documento)'),DB::raw('sum(Cantidad)'),DB::raw('sum((Valor_Total_Bruto)*(Cantidad))'),DB::raw('count((Tipo_persona_idTipo_persona) = 3) '))
        ->Join('documento','detalle_documento.Documentos_idDocumentos','=','documento.idDocumento')
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