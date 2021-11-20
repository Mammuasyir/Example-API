<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Auth2Controller extends Controller
{
    public function login()
    {
        $response['status'] = 1;
        return view('Auth.login', compact('response'));
    }

    public function Datalogin(Request $request)
    {

        $response = Http::post('https://ictjuara.000webhostapp.com/api/login', $request->input())->json();

        if ($response['status'] == 0) {
            return view('Auth.login', compact('response'));
        };

        return view('Auth.datalogin', compact('response'));
    }

    public function Myregister()
    {
        return view('Auth.myregister');
    }

    public function register(Request $request)
    {
        // dd($request);
        $response = Http::post('https://listwisata.herokuapp.com/api/register', $request->input());

        return view('Auth.mydatalogin' , compact('response'));


    }

    public function loginMyApi()
    {
        $response['status'] = 1;
        return view('Auth.mylogin', compact('response'));
    }

    public function DataloginMyApi(Request $request, $user_id)
    {
        $response2 = Http::get('https://listwisata.herokuapp.com/api/user/' . $user_id)->json();

        $response = Http::post('https://listwisata.herokuapp.com/api/login', $request->input())->json();

        if ($response['status'] == 0) {
            return view('Auth.mylogin', compact('response'));
        };

        return view('Auth.mydatalogin', compact('response', 'response2'));
    }

    public function editProfile($user_id)
    {
        $response = Http::get('https://listwisata.herokuapp.com/api/user/' . $user_id)->json();

        return view('Auth.editprofile', compact('response'));
    }

    public function updateProfile(Request $request, $user_id)
    {
        Http::put('https://listwisata.herokuapp.com/api/edit/' .  $user_id, $request->input())->json();
        return redirect()->back();
    }
}
