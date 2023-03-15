<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function qrcode()
    {
        return view('qrcode');
    }

}
