<?php

namespace App\Exports;

use App\Models\documento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VentasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('documento')
                ->select('idDocumento','Numero_Documento','Valor_Total','Fecha_emision','Fecha_vencimiento','iva','giro','DescripcionM','Descripcion','DescripcionE')
                ->join('tipo_movimiento','documento.Tipo_Movimiento_idTipo_Movimiento','=','tipo_movimiento.idTipo_Movimiento')
                ->join('tipo_documento','documento.Tipo_Documento_idTipo_Documento','=','tipo_documento.idTipo_Documento')
                ->join('estado','documento.Estado_Venta_idEstado_Venta','=','estado.idEstado')
                ->get();

        return $data;
    }

    public function headings(): array
    {
        return [
            'Numero Documento',
            'Fecha Emision',
            'Valor Total',
            'Detalle',
            'Tipo Documento',
            'Tipo Movimiento',
            'Estado Documento',
        ];
    }
}
