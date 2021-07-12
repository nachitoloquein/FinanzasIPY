<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function index()
    {
        return view('dashboards.webpay');
    }
}
