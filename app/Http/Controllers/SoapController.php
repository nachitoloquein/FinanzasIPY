<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;


class SoapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soap_client = new SoapClient('http://localhost:5000/api/web-service/?WSDL');
        print_r(
            $soap_client->__getFunctions()
        );
        $respuesta = $soap_client->__soapCall("saludar", array());
        $json = file_get_contents($respuesta);
        $data = json_decode($json, true);
        foreach($data as $row){
            $id = $row['id'];
            $nombre = $row['nombre'];
            $tipo = 1;

           $sql = "INSERT INTO producto ('idProducto','Nombre_producto','Tipo_Producto_idTipo_Producto') VALUES ('$id','$nombre',''$tipo);";

           $mysql_query($sql);
        }
        #phpinfo();
        return view('dashboards.soap');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
