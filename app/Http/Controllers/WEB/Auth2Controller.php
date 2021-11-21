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
        $response['status'] = 1;
        return view('Auth.myregister', compact('response'));
    }

    public function register(Request $request)
    {
        // dd($request);
        $response = Http::post('https://listwisata.herokuapp.com/api/register', $request->input())->json();


        if ($response['status'] == 0) {
            return view('Auth.myregister', compact('response'));
        };

        return view('Auth.mylogin', compact('response'));
    }

    public function loginMyApi()
    {
        $response['status'] = 1;
        return view('Auth.mylogin', compact('response'));
    }

    public function DataloginMyApi(Request $request)
    {
        $response2 = Http::get('https://listwisata.herokuapp.com/api/alluser')->json();

        $response = Http::post('https://listwisata.herokuapp.com/api/login', $request->input())->json();

        if ($response['status'] == 0) {
            return view('Auth.mylogin', compact('response', 'response2'));
        };

        return view('Auth.mydatalogin', compact('response', 'response2'));
    }

    public function editProfile($user_id)
    {
        // return dd($user_id);
        $response = Http::get('https://listwisata.herokuapp.com/api/user/' . $user_id)->json();

        return view('Auth.editprofile', compact('response'));
    }

    public function updateProfile(Request $request, $user_id)
    {
        $response = Http::put('https://listwisata.herokuapp.com/api/edit/' .  $user_id, $request->input())->json();

        if ($response['status'] == 1) {
            return redirect()->back()->with('success','Data Berhasil Diubah.');
        }
    }
}
