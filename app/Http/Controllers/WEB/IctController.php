<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IctController extends Controller
{
    public function Ict()
    {
        $response = Http::get('https://ictjuara.000webhostapp.com/api/wisata')->json();
        // dd($response);
        return view('Ictjuara', compact('response'));
    }
}
