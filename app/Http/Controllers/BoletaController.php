<?php

namespace App\Http\Controllers;

use App\Models\detalle_documento;
use App\Models\Documento;
class BoletaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $miArray = array(array('idDocumento'=>'1', 'Valor_Total'=>'5000', 'Precio'=>'2500', 'Cantidad'=>'2'),array('idDocumento'=>'2', 'Valor_Total'=>'2500', 'Precio'=>'2500', 'Cantidad'=>'1'));
        //Se llama al webService
        //$soap_client = new SoapClient('http://44.194.209.248:8000/api/?wsdl');
        #$soap_client = new SoapClient('http://127.0.0.1:5000/api/web-service/?WSDL');
        //Se imprimen las funciones
        //print_r(
        //    $soap_client->__getFunctions()
        //);

        //$respuesta = $soap_client->__soapCall("listaProductos", array());
        //$xml = $respuesta->listaProductosResult;
        #print_r($xml);
        //Se procesa el xml
        #$xml = simplexml_load_string($xml);
        $objJson = json_encode($miArray);
        //print_r($objJson);
        //echo "<br>";
        $output = json_decode($objJson, true);
        #print_r($output['Producto']);
        $elementos = count($miArray);
        print_r($elementos);
        //Se hace un ciclo para insertar los datos a la base de datos
        $count =+1;
        $fechaActual = date('d-m-Y');
        if ($elementos == 2) {
            foreach($output as $row){
                $id = $row['idDocumento'];
                $Numero_Documento = $id;
                $Valor_Total = $row['Valor_Total'];
                $Precio = $row['Precio'];
                $Cantidad = $row['Cantidad'];
                $Producto_idProducto = 1;
                $Tipo_Movimiento_idTipo_Movimiento = 2;
                $Tipo_Documento_idTipo_Documento = 1;
                $Usuario_idUsuario = 1;
                $Estado_Venta_idEstado_Venta = 1;
            $buscar = Documento::find($id);
            $buscar2 = detalle_documento::find($id);
            if ($buscar == null){
            if ($buscar2 == null) {
                $Documento = new Documento();
                $Documento->idDocumento=$id;
                $Documento->Numero_Documento=$Numero_Documento;
                $Documento->Precio=$Precio;
                $Documento->Valor_Total=$Valor_Total;
                $Documento->Fecha_emision=$fechaActual;
                $Documento->Tipo_Movimiento_idTipo_Movimiento=$Tipo_Movimiento_idTipo_Movimiento;
                $Documento->Tipo_Documento_idTipo_Documento=$Tipo_Documento_idTipo_Documento;
                $Documento->Usuario_idUsuario=$Usuario_idUsuario;
                $Documento->Estado_Venta_idEstado_Venta=$Estado_Venta_idEstado_Venta;

                $DeDoc = new detalle_documento();
                $DeDoc ->Documentos_idDocumentos=$id;
                $DeDoc ->Valor_Total_Bruto=$Valor_Total;
                $DeDoc ->Cantidad=$Cantidad;
                $DeDoc ->Producto_idProducto=$Producto_idProducto;
                $DeDoc ->idDetalle_Documento=$id;
                $Documento->save();
                $DeDoc->save();
            }
            }
            else {
                $Documento = Documento::find($id);
                $DeDoc = detalle_documento::find($id);
                $Documento->idDocumento=$id;
                $Documento->Numero_Documento=$Numero_Documento;
                $Documento->Precio=$Precio;
                $Documento->Fecha_emision=$fechaActual;
                $Documento->Tipo_Movimiento_idTipo_Movimiento=$Tipo_Movimiento_idTipo_Movimiento;
                $Documento->Tipo_Documento_idTipo_Documento=$Tipo_Documento_idTipo_Documento;
                $Documento->Usuario_idUsuario=$Usuario_idUsuario;
                $Documento->Estado_Venta_idEstado_Venta=$Estado_Venta_idEstado_Venta;
                $DeDoc ->Documentos_idDocumentos=$id;
                $DeDoc ->Valor_Total_Bruto=$Valor_Total;
                $DeDoc ->Cantidad=$Cantidad;
                $DeDoc ->Producto_idProducto=$Producto_idProducto;
                $DeDoc ->idDetalle_Documento=$id;
                $DeDoc->save();
                $Documento->save();
            }
        }
            return redirect()->route('documentos');
        
    }
        elseif ($elementos > 2) {
            foreach($output as $row){
                $id = $row['idDocumento'];
                $Numero_Documento = $id;
                $Valor_Total = $row['Valor_Total'];
                $Precio = $row['Precio'];
                $Cantidad = $row['Cantidad'];
                $Producto_idProducto = 1;
                $Tipo_Movimiento_idTipo_Movimiento = 2;
                $Tipo_Documento_idTipo_Documento = 1;
                $Usuario_idUsuario = 1;
                $Estado_Venta_idEstado_Venta = 1;
                $Documento = Documento::find($id);
                $DeDoc = detalle_documento::find($id);
            if ($Documento == null){
                $Documento = new Documento();
                $Documento->idDocumento=$id;
                $Documento->Numero_Documento=$Numero_Documento;
                $Documento->Precio=$Precio;
                $Documento->Fecha_emision=$fechaActual;
                $Documento->Tipo_Movimiento_idTipo_Movimiento=$Tipo_Movimiento_idTipo_Movimiento;
                $Documento->Tipo_Documento_idTipo_Documento=$Tipo_Documento_idTipo_Documento;
                $Documento->Usuario_idUsuario=$Usuario_idUsuario;
                $Documento->Estado_Venta_idEstado_Venta=$Estado_Venta_idEstado_Venta;
                $Documento->save();
            }
            else {
                $Documento = Documento::find($id);
                $Documento->idDocumento=$id;
                $Documento->Numero_Documento=$Numero_Documento;
                $Documento->Precio=$Precio;
                $Documento->Fecha_emision=$fechaActual;
                $Documento->Tipo_Movimiento_idTipo_Movimiento=$Tipo_Movimiento_idTipo_Movimiento;
                $Documento->Tipo_Documento_idTipo_Documento=$Tipo_Documento_idTipo_Documento;
                $Documento->Usuario_idUsuario=$Usuario_idUsuario;
                $Documento->Estado_Venta_idEstado_Venta=$Estado_Venta_idEstado_Venta;
                $Documento->save();
            }
            }
            return redirect()->route('documentos');
        }
        elseif ($elementos == 0) {
            return redirect()->route('documentos');
        }
        #phpinfo();
        return view('dashboards.listaDocumentos');
        
    }
}
