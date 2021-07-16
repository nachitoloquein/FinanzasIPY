<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus\Transaction;
use App\Models\Documento;
use Illuminate\Support\Facades\DB;

class webpaycontroller extends Controller
{
    //use Freshwork\Transbank\CertificationBagFactory;  
 
    public function index(Request $request,$id)
    {
        $transaction = new Transaction();;
        //$doc = $request->doc;
        //$valor = $request->valor;
        //print_r($id);
        $documentos = Documento::find($id);
        $doc = $documentos->Numero_Documento;
        $valor = $documentos->Valor_Total;
        $response = $transaction->create($id,$doc, $valor, 'http://ec2-44-194-142-188.compute-1.amazonaws.com/confirmacion');
        
        $url = $response->getUrl();
        $token = $response->getToken();
        return view('dashboards.webpay', compact('token', 'url'));

        
        
    }

    public function confirmar_t(Request $request)
    {
        $token = $_GET['token_ws'] ?? $_POST['token_ws'] ?? null;
        if (!$token) {
            // Revisa más detalles en Revisar más detalles más arriba en los distintos flujos y ejemplos de código de esto en https://github.com/TransbankDevelopers/transbank-sdk-php/examples/webpay-plus/index.php
            die ('No es un flujo de pago normal.');
        }

        $response = (new Transaction)->commit($token); // ó cualquiera de los métodos detallados en el ejemplo anterior del método create.
        if ($response->isApproved()) {
        // Transacción Aprobada
            
            $id = $response->getBuyOrder();
            $documentos = Documento::find($id);
            $documentos->Estado_Venta_idEstado_Venta = 1;
            $documentos->save();
        } else {
        // Transacción rechazada
        }
        //return view('/dashboards/listaDocumentos');
        return redirect(route('documentos'));
    }
}
