<?php

namespace App\Http\Controllers;

use App\Models\detalle_documento;
use App\Models\Documento;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;
use SoapClient;

class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$miArray = array(array('idDocumento'=>'1', 'Valor_Total'=>'5000', 'Precio'=>'2500', 'Cantidad'=>'2'),array('idDocumento'=>'2', 'Valor_Total'=>'2500', 'Precio'=>'2500', 'Cantidad'=>'1'));
        //Se llama al webService
        $soap_client = new SoapClient('http://44.194.209.248:8000/api/?wsdl');
        #$soap_client = new SoapClient('http://127.0.0.1:5000/api/web-service/?WSDL');
        $soap_client->__getLastRequest();
        //Se imprimen las funciones
        $respuesta = $soap_client->__soapCall("GenerarBoleta", array());
        $xml = $respuesta->GenerarBoletaResult;
        //Se procesa el xml
        //$xml = simplexml_load_string($xml);
        $objJson = json_encode($xml);
        //print_r($objJson);
        //echo "<br>";
        $output = json_decode($objJson, true);
        #print_r($output['Producto']);
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        //Se hace un ciclo para insertar los datos a la base de datos
        $fechaActual = date('d-m-Y');
        foreach ($output as $ass) {
            $Total = $ass['total'];
            $E_Pago = $ass['estadoPago'];
            $idUsuario = $ass['id_cliente'];
            $N_doc = $ass['numero'];
            $nick1 = $ass["nombre_cliente"];
            $nick1 .= '-';
            $nick1 .= $ass["apellido_cliente"];
            $Nusuario = $nick1;
            $usuarios = Usuario::find($idUsuario);
            $documentos = Documento::all();
            if ($usuarios == null) {
                $usuario = new Usuario();
                $usuario->idUsuario = $idUsuario;
                $usuario->Nombre_usuario = $Nusuario;
                $usuario->save();
                $documentos = new Documento();
                $documentos->Valor_Total = $Total;
                $documentos->Numero_Documento = $N_doc;
                $documentos->Fecha_emision = $fechaActual;
                $documentos->Tipo_Movimiento_idTipo_Movimiento = 2;
                $documentos->Tipo_Documento_idTipo_Documento = 2;
                $documentos->Usuario_idUsuario = $idUsuario;
                $documentos->Estado_Venta_idEstado_Venta = $E_Pago;
                $documentos->save();
            } else {
                $usuario = Usuario::find($idUsuario);
                $usuario->idUsuario = $idUsuario;
                $usuario->Nombre_usuario = $Nusuario;
                $usuario->save();
                $documentos = new Documento();
                $documentos->Numero_Documento = $N_doc;
                $documentos->Valor_Total = $Total;
                $documentos->Fecha_emision = $fechaActual;
                $documentos->Tipo_Movimiento_idTipo_Movimiento = 2;
                $documentos->Tipo_Documento_idTipo_Documento = 2;
                $documentos->Usuario_idUsuario = $idUsuario;
                $documentos->Estado_Venta_idEstado_Venta = $E_Pago;
                $documentos->save();
            }
        }
    }

    public function json()
    {
        $Boletajson = DB::table('documento')
            ->select('Numero_Documento', 'Nombre_usuario', 'Fecha_emision', 'Nombre_producto', 'Cantidad', 'Valor_Total_Neto', 'Valor_Total', 'DescripcionE', 'idUsuario')
            ->leftJoin('detalle_documento', 'idDocumento', '=', 'idDetalle_Documento')
            ->rightJoin('usuario', 'idUsuario', '=', 'Usuario_idUsuario')
            ->leftJoin('producto', 'idProducto', '=', 'Producto_idProducto')
            ->Join('estado', 'idEstado', '=', 'Estado_Venta_idEstado_Venta')
            ->where('Tipo_Documento_idTipo_Documento', '=', '2')
            ->get();
        echo json_encode($Boletajson);
    }
    
}
