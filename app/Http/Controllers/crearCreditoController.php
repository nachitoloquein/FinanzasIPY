<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class crearCreditoController extends Controller
{
    public function __invoke(){
        return view('dashboards.crearCredito');
    }

    
}
