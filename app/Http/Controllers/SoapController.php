<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use App\Models\Producto;


class SoapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se llama al webService
        $soap_client = new SoapClient('http://44.194.209.248:8000/api/?wsdl');
        #$soap_client = new SoapClient('http://127.0.0.1:5000/api/web-service/?WSDL');
        //Se imprimen las funciones
        print_r(
            $soap_client->__getFunctions()
        );

        $respuesta = $soap_client->__soapCall("listaProductos", array());
        $xml = $respuesta->listaProductosResult;
        #print_r($xml);
        //Se procesa el xml
        #$xml = simplexml_load_string($xml);
        $objJson = json_encode($xml);
        print_r($objJson);
        echo "<br>";
        $output = json_decode($objJson, true);
        #print_r($output['Producto']);
        $elementos = count($output, COUNT_RECURSIVE);
        print_r($elementos);
        //Se hace un ciclo para insertar los datos a la base de datos
        if ($elementos == 3) {
            foreach($output as $row){
                $id = $row['id_producto'];
                $nombre = $row['nombre'];
                $tipo = 1;
            
            $buscar = Producto::find($id);
            if ($buscar == null){
    
            $producto = new Producto();
            $producto->idProducto=$id;
            $producto->Nombre_producto=$nombre;
            $producto->Tipo_Producto_idTipo_Producto=$tipo;
            $producto->save();
            }
            else {
                $producto = Producto::find($id);
                $producto->Nombre_producto=$nombre;
                $producto->Tipo_Producto_idTipo_Producto=1;
                $producto->save();
            }
        }
            return redirect()->route('listaP');
        
    }
        elseif ($elementos > 3) {
            foreach($output['Producto'] as $row){
                $id = $row['id_producto'];
                $nombre = $row['nombre'];
                $tipo = 1;

            $buscar = Producto::find($id);
            if ($buscar == null){
        
            $producto = new Producto();
            $producto->idProducto=$id;
            $producto->Nombre_producto=$nombre;
            $producto->Tipo_Producto_idTipo_Producto=$tipo;
            $producto->save();
            }
            else {
                $producto = Producto::find($id);
                $producto->Nombre_producto=$nombre;
                $producto->Tipo_Producto_idTipo_Producto=1;
                $producto->save();
            }
            }
            return redirect()->route('listaP');
        }
        elseif ($elementos == 0) {
            return redirect()->route('listaP');
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
    /*$data = json_decode($respuesta, true);
        foreach($data as $row){
            $id = $row['id'];
            $nombre = $row['nombre'];
            $tipo = 1;
<
           $sql = "INSERT INTO producto ('idProducto','Nombre_producto','Tipo_Producto_idTipo_Producto') VALUES ('$id','$nombre',''$tipo);";

           $mysql_query($sql);
        }*/

}
