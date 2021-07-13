<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Response;

class jsonController extends Controller
{
    public function index()
    {
        //llamada  a los productos
        $productos = DB::table('producto')
                    ->select('idProducto','Nombre_producto','Precio')
                    ->orderBy('idProducto')
                    ->where('Precio','>','0')
                    ->get();
        //Parseo a json
        echo json_encode($productos);
            
    }

    public function create()
    {
        //
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
