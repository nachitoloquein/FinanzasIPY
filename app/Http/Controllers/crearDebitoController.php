<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class crearDebitoController extends Controller
{
    public function __invoke(){
        return view('dashboards.crearDebito');
    }
}
