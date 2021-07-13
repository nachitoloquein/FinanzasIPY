<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\DB;

class JsonProveedoresController extends Controller
{
    public function index()
    {
        //llamada a la tabla
        $jsonProv = DB::table('persona')
                    ->select('idPersona','Nombre','Apellido','Run','Razon_Social','Correo_Electronico')
                    ->orderBy('idPersona')
                    ->where('Tipo_persona_idTipo_persona','=',3)
                    ->get();
        //parseo a json
        echo json_encode($jsonProv);
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
