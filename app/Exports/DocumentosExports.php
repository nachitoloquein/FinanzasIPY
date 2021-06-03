<?php

namespace App\Exports;

use App\Models\documento;
use Maatwebsite\Excel\Concerns\FromCollection;

class DocumentosExports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return documento::all();
    }
}
