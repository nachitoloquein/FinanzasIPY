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
        $elementos = count($output, COUNT_RECURSIVE);
        $salida = $output;


        echo '<br/>';

        echo '<br/>';
        print_r($elementos);
        echo '<br/>';
        //Se hace un ciclo para insertar los datos a la base de datos
        $fechaActual = date('d-m-Y');
        $count = 0;
        if ($elementos == 13) {
            foreach ($output as $row) {
                $a = $salida['Boleta'];
                $b = $a['detalle'];
                $c = $b['Detalle'];
                $count = $count + 1;
                $id = $count;
                $Numero_Documento = $id;
                $Valor_Total = $a['total'];
                $Tipo_Movimiento_idTipo_Movimiento = 2;
                $Tipo_Documento_idTipo_Documento = 2;
                $Estado_Venta_idEstado_Venta = $a['estadoPago'];
                $nick1 = $a["nombre_cliente"];
                $nick1 .= '-';
                $nick1 .= $a["apellido_cliente"];
                $idUsuario = $a['id_cliente'];
                $Nusuario = $nick1;

                foreach ($c as $row2) {
                    $count = $count + 1;
                    $Producto_idProducto = $c['id_producto'];
                    $Precio = $c['precio_producto'];
                    $valor_neto = $c['sub_total'];
                    print_r($count);
                    $Cantidad = $c['cantidad_producto'];
                }
                $usuarios = Usuario::find($idUsuario);
                $documentos = Documento::find($id);
                $DeDocs = detalle_documento::find($id);
                if ($usuarios == null) {
                    $usuario = new Usuario();
                    $usuario->idUsuario = $idUsuario;
                    $usuario->Nombre_usuario = $Nusuario;
                    $usuario->save();
                    print_r('cree nuevo usuario');
                    echo '<br/>';
                    if ($documentos == null) {
                        $Documento = new Documento();
                        $Documento->idDocumento = $id;
                        $Documento->Numero_Documento = $Numero_Documento;
                        $Documento->Precio = $Precio;
                        $Documento->Valor_Total = $Valor_Total;
                        $Documento->Fecha_emision = $fechaActual;
                        $Documento->Tipo_Movimiento_idTipo_Movimiento = $Tipo_Movimiento_idTipo_Movimiento;
                        $Documento->Tipo_Documento_idTipo_Documento = $Tipo_Documento_idTipo_Documento;
                        $Documento->Usuario_idUsuario = $idUsuario;
                        $Documento->Estado_Venta_idEstado_Venta = $Estado_Venta_idEstado_Venta;
                        print_r('cree un nuevo documento');
                        echo '<br/>';
                        $Documento->save();
                    }
                    if ($DeDocs == null) {
                        $DeDoc = new detalle_documento();
                        $DeDoc->Documentos_idDocumentos = $id;
                        $DeDoc->Valor_Total_Bruto = $Valor_Total;
                        $DeDoc->Valor_Total_Neto = $valor_neto;
                        $DeDoc->Cantidad = $Cantidad;
                        $DeDoc->Producto_idProducto = $Producto_idProducto;
                        $DeDoc->idDetalle_Documento = $id;
                        print_r('añadí un nuevo detalleDoc');
                        echo '<br/>';
                        $DeDoc->save();
                    }
                } else {
                    $usuario = Usuario::find($idUsuario);
                    $usuario->idUsuario = $idUsuario;
                    $usuario->Nombre_usuario = $Nusuario;
                    $usuario->save();
                    print_r('Acualice usuario:D');
                    echo '<br/>';
                    if ($documentos == null) {
                        $Documento = new Documento();
                        $Documento->idDocumento = $id;
                        $Documento->Numero_Documento = $Numero_Documento;
                        $Documento->Precio = $Precio;
                        $Documento->Valor_Total = $Valor_Total;
                        $Documento->Fecha_emision = $fechaActual;
                        $Documento->Tipo_Movimiento_idTipo_Movimiento = $Tipo_Movimiento_idTipo_Movimiento;
                        $Documento->Tipo_Documento_idTipo_Documento = $Tipo_Documento_idTipo_Documento;
                        $Documento->Usuario_idUsuario = $idUsuario;
                        $Documento->Estado_Venta_idEstado_Venta = $Estado_Venta_idEstado_Venta;
                        print_r('cree un nuevo documento');
                        echo '<br/>';
                        $Documento->save();
                    } else {
                        $Documento = Documento::find($id);
                        $Documento->idDocumento = $id;
                        $Documento->Numero_Documento = $Numero_Documento;
                        $Documento->Precio = $Precio;
                        $Documento->Fecha_emision = $fechaActual;
                        $Documento->Tipo_Movimiento_idTipo_Movimiento = $Tipo_Movimiento_idTipo_Movimiento;
                        $Documento->Tipo_Documento_idTipo_Documento = $Tipo_Documento_idTipo_Documento;
                        $Documento->Usuario_idUsuario = $idUsuario;
                        $Documento->Estado_Venta_idEstado_Venta = $Estado_Venta_idEstado_Venta;
                        print_r('actualice documento');
                        echo '<br/>';
                        $Documento->save();
                    }
                    if ($DeDocs == null) {
                        $DeDoc = new detalle_documento();
                        $DeDoc->Documentos_idDocumentos = $id;
                        $DeDoc->Valor_Total_Bruto = $Valor_Total;
                        $DeDoc->Valor_Total_Neto = $valor_neto;
                        $DeDoc->Cantidad = $Cantidad;
                        $DeDoc->Producto_idProducto = $Producto_idProducto;
                        $DeDoc->idDetalle_Documento = $id;
                        print_r('añadí un nuevo detalleDoc');
                        $DeDoc->save();
                    } else {
                        $DeDoc = detalle_documento::find($id);
                        $DeDoc->Documentos_idDocumentos = $id;
                        $DeDoc->Valor_Total_Bruto = $Valor_Total;
                        $DeDoc->Valor_Total_Neto = $valor_neto;
                        $DeDoc->Cantidad = $Cantidad;
                        $DeDoc->Producto_idProducto = $Producto_idProducto;
                        $DeDoc->idDetalle_Documento = $id;
                        print_r('Actualice un detalleDoc');
                        echo '<br/>';
                        $DeDoc->save();
                    }
                }
            }
        } elseif ($elementos > 13) {
            $a = $salida['Boleta'];
            $b = $a['detalle'];
            $c = $b['Detalle'];
            foreach ($output as $row) {
                print_r($c);
                $count = $count + 1;
                $id = $count;
                $Numero_Documento = $id;
                $Valor_Total = $a['total'];
                $Tipo_Movimiento_idTipo_Movimiento = 2;
                $Tipo_Documento_idTipo_Documento = 2;
                $Estado_Venta_idEstado_Venta = $a['estadoPago'];
                $nick1 = $a["nombre_cliente"];
                $nick1 .= '-';
                $nick1 .= $a["apellido_cliente"];
                $idUsuario = $a['id_cliente'];
                $Nusuario = $nick1;
                foreach ($c as $row2) {
                    $count = $count + 1;
                    $Producto_idProducto = $row2['id_producto'];
                    $Precio = $row2['precio_producto'];
                    $valor_neto = $row2['sub_total'];
                    print_r($row2['sub_total']);
                    $Cantidad = $row2['cantidad_producto'];

                    $usuarios = Usuario::find($idUsuario);
                    $documentos = Documento::find($id);
                    $DeDocs = detalle_documento::find($id);
                    if ($usuarios == null) {
                        $usuario = new Usuario();
                        $usuario->idUsuario = $idUsuario;
                        $usuario->Nombre_usuario = $Nusuario;
                        $usuario->save();
                        print_r('cree nuevo usuario');
                        echo '<br/>';
                        if ($documentos == null) {
                            $Documento = new Documento();
                            $Documento->idDocumento = $id;
                            $Documento->Numero_Documento = $Numero_Documento;
                            $Documento->Precio = $Precio;
                            $Documento->Valor_Total = $Valor_Total;
                            $Documento->Fecha_emision = $fechaActual;
                            $Documento->Tipo_Movimiento_idTipo_Movimiento = $Tipo_Movimiento_idTipo_Movimiento;
                            $Documento->Tipo_Documento_idTipo_Documento = $Tipo_Documento_idTipo_Documento;
                            $Documento->Usuario_idUsuario = $idUsuario;
                            $Documento->Estado_Venta_idEstado_Venta = $Estado_Venta_idEstado_Venta;
                            print_r('cree un nuevo documento');
                            echo '<br/>';
                            $Documento->save();
                        }
                        if ($DeDocs == null) {
                            $DeDoc = new detalle_documento();
                            $DeDoc->Documentos_idDocumentos = $id;
                            $DeDoc->Valor_Total_Bruto = $Valor_Total;
                            $DeDoc->Valor_Total_Neto = $row2['sub_total'];
                            $DeDoc->Cantidad = $Cantidad;
                            $DeDoc->Producto_idProducto = $Producto_idProducto;
                            $DeDoc->idDetalle_Documento = $count;
                            print_r('añadí un nuevo detalleDoc');
                            echo '<br/>';
                            $DeDoc->save();
                        }
                    } else {
                        $usuario = Usuario::find($idUsuario);
                        $usuario->idUsuario = $idUsuario;
                        $usuario->Nombre_usuario = $Nusuario;
                        $usuario->save();
                        print_r('Acualice usuario:D');
                        echo '<br/>';
                        if ($documentos == null) {
                            $Documento = new Documento();
                            $Documento->idDocumento = $id;
                            $Documento->Numero_Documento = $Numero_Documento;
                            $Documento->Precio = $Precio;
                            $Documento->Valor_Total = $Valor_Total;
                            $Documento->Fecha_emision = $fechaActual;
                            $Documento->Tipo_Movimiento_idTipo_Movimiento = $Tipo_Movimiento_idTipo_Movimiento;
                            $Documento->Tipo_Documento_idTipo_Documento = $Tipo_Documento_idTipo_Documento;
                            $Documento->Usuario_idUsuario = $idUsuario;
                            $Documento->Estado_Venta_idEstado_Venta = $Estado_Venta_idEstado_Venta;
                            print_r('cree un nuevo documento');
                            echo '<br/>';
                            $Documento->save();
                        } else {
                            $Documento = Documento::find($id);
                            $Documento->idDocumento = $id;
                            $Documento->Numero_Documento = $Numero_Documento;
                            $Documento->Precio = $Precio;
                            $Documento->Fecha_emision = $fechaActual;
                            $Documento->Tipo_Movimiento_idTipo_Movimiento = $Tipo_Movimiento_idTipo_Movimiento;
                            $Documento->Tipo_Documento_idTipo_Documento = $Tipo_Documento_idTipo_Documento;
                            $Documento->Usuario_idUsuario = $idUsuario;
                            $Documento->Estado_Venta_idEstado_Venta = $Estado_Venta_idEstado_Venta;
                            print_r('actualice documento');
                            echo '<br/>';
                            $Documento->save();
                        }
                        if ($DeDocs == null) {
                            $DeDoc = new detalle_documento();
                            $DeDoc->Documentos_idDocumentos = $id;
                            $DeDoc->Valor_Total_Bruto = $Valor_Total;
                            $DeDoc->Valor_Total_Neto = $valor_neto;
                            $DeDoc->Cantidad = $Cantidad;
                            $DeDoc->Producto_idProducto = $Producto_idProducto;
                            $DeDoc->idDetalle_Documento = $count;
                            if ($DeDoc->num_rows > 0) {
                                print_r('Actualicé detalleDoc');
                                echo '<br/>';
                                $DeDoc->save();
                            } else {
                                echo '<br/>';
                                print_r('añadí un nuevo detalleDoc');
                                $DeDoc->update();
                            }
                        } else {
                            $DeDoc = detalle_documento::find($id);
                            echo '<br/>';
                            print_r($id);
                            echo '<br/>';
                            $DeDoc->Documentos_idDocumentos = $id;
                            $DeDoc->Valor_Total_Bruto = $Valor_Total;
                            $DeDoc->Valor_Total_Neto = $valor_neto;
                            $DeDoc->Cantidad = $Cantidad;
                            $DeDoc->Producto_idProducto = $Producto_idProducto;
                            $DeDoc->idDetalle_Documento = $id;
                            $DeDoc->save();
                            print_r('Actualice un detalleDoc');
                            echo '<br/>';
                        }
                    }
                }
            }
        } elseif ($elementos == 7) {
        }
    }

    public function json()
    {
        $Boletajson = DB::table('documento')
            ->select('idDocumento', 'Nombre_usuario', 'Fecha_emision', 'Nombre_producto','idUsuario', 'Cantidad', 'Valor_Total_Neto', 'Valor_Total', 'DescripcionE')
            ->leftJoin('detalle_documento', 'idDocumento', '=', 'idDetalle_Documento')
            ->rightJoin('usuario', 'idUsuario', '=', 'Usuario_idUsuario')
            ->leftJoin('producto', 'idProducto', '=', 'Producto_idProducto')
            ->Join('estado', 'idEstado', '=', 'Estado_Venta_idEstado_Venta')
            ->get();
        echo json_encode($Boletajson);
    }
}
