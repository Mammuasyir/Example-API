<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DoaController extends Controller
{
    public function Doa()
    {
        $response = Http::get('https://doa-doa-api-ahmadramadhan.fly.dev/api')->json();
        // dd($response);
        return view('welcome', compact('response'));
    }

    public function Postdata()
    {
        return view('postdata');
    }

    public function Posting(Request $request)
    {
        // dd($request);
        Http::post('https://ictjuara.000webhostapp.com/api/regis', $request->input());
        return redirect()->back();
    }

    public function Postingkate()
    {
        return view('postkategori');
    }

    public function Postingkategory(Request $request)
    {
        Http::post('https://ictjuara.000webhostapp.com/api/add-kategori', $request->input());
        return redirect()->back();
    }
    
}
