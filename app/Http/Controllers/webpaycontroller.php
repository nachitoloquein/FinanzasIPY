<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus\Transaction;

class webpaycontroller extends Controller
{
    //use Freshwork\Transbank\CertificationBagFactory;  
 
    public function index()
    {
        $transaction = new Transaction();
        $response = $transaction->create(1, 1, 1000, 'http://127.0.0.1:8000/listaDocumentos');
        //print_r(
        //    $response['url']
        //);
        $url = $response->getUrl();
        $token = $response->getToken();
        print_r($token);
        echo "<br>";
        print_r($url);

        

        return view('dashboards.webpay', compact('token', 'url'));
        
    }
}
