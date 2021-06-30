<?php

namespace App\Exports;

use App\Models\documento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class VentasExport implements FromCollection
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
}
