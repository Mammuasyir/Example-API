<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function registrasi(Request $request)
    {
        $psn = [
            'name.required'     => "Nama Jangan Kosong",
            'email.required'    => "Email Jangan Kosong",
            'email.unique'      => "Email Telah Terdaftar",
            'email.email'       => "Email Tidak Valid",
            'password.required' => "Password Jangan Kosong",
            'password.min'      => "Password minimal 4",
            'password.confirmed' => "Password tidak cocok",

        ];

        $validasi = Validator::make($request->all(), [
            'name'      => "required",
            'email'     => "required|unique:users|email",
            'password'  => "required|min:4|confirmed",
        ], $psn);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }


        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)

        ]);
        return response()->json([
            'status'    => 1,
            'pesan'     => $request->name, 'Registrasi Berhasil !',
            'data'      => $user

        ], Response::HTTP_OK);
    }

    public function daftar(Request $request)
    {
        $pesan = [
            'name.required'         => "Nama Wajib Diisi",
            'password.required'     => "Password Wajib diisi",
            'password.confirmed'    => "Password confirmasi tidak sesuai",
            'password.min'          => "Password minimal 4 karakter",

            'email.required'        => "Email Jangan Kosong",
            'email.unique'          => "Email Telah Terdaftar",
            'email.email'           => "Email Tidak Valid",


        ];

        $request->validate([
            'name'      => "required",
            'email'     => "required|email",
            'password'  => "required"
        ], $pesan);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        return response()->json([
            'status'    => 1,
            'pesan'     => $request->name, 'Registrasi Berhasil !',
            'data'      => $user
        ], Response::HTTP_OK);
    }

    public function login(Request $request)
    {
        $pesan = [

            'password.required' => "Password Wajib diisi",
            'email.required'    => "Email Jangan Kosong",
        ];

        $validasi = Validator::make($request->all(), [
            'email'     => "required",
            'password'  => "required",
        ], $pesan);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->responError(0, "Login Gagal !");
        }

        return response()->json([
            'status'    => 1,
            'pesan'     => $user->name, 'Login Kamuh Berhasil !',
            'data'      => $user
        ], Response::HTTP_OK);
    }

    public function editProfile(Request $request, $user_id)
    {
        $user = User::where('id',$user_id)->first();

        if (!$user ) {
            return $this->responError(0, "Akun Tidak terdaftar !");
        }

        $validasi = Validator::make($request->all(), [
            'name'        => 'required',
            'email'       => 'required',
            'alamat'      => 'required',
            'telp'        => 'required',
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        // return dd($request);

        $user->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'alamat'        => $request->alamat,
            'telp'          => $request->telp,
            'photo'         => $request->photo,
        ]);

        return response()->json([
            'status'        => 1,
            'message'       => "Profile berhasil diupdate ! ",
            'result'        => $user
        ], 200);
    }

    public function changePassword(Request $request, $user_id)
    {
        $user = User::where('id',$user_id)->first();

        if (!$user ) {
            return $this->responError(0, "Akun Tidak terdaftar !");
        }

        if (!(Hash::check($request->password, $user->password))) {
            return $this->responError(0, "Password salah !");
        }
        
        if(strcmp($request->get('password'),$request->get('new_password')) == 0) {
            return response()->json([
                'status'        => 0,
                'message'       => "Password tidak boleh sama dengan password lama !",
            ], 400);
        }

        $validasi = Validator::make($request->all(), [
            'password'          => 'required',
            'new_password'      => 'required|confirmed'
        ]);
            
        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }
        
        $user->password = Hash::make($request->new_password);
            $user->save();

        return response()->json([
            'status'        => 1,
            'message'       => "Password Berhasil Diubah !",
            'result'        => $user
        ], 200);

    }

    public function getUser($user_id)
    {
        $user = User::where('id', $user_id)->first();

        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil mendapatkan user !",
            'result'    => $user
        ], Response::HTTP_OK);
    }

    public function getAllUser()
    {
        $user = User::all();

        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil mendapatkan semua user !",
            'result'    => $user
        ], Response::HTTP_OK);
    }

    public function responError($sts, $pesan)
    {
        return response()->json([
            'status'    => $sts,
            'message'   => $pesan,
        ], Response::HTTP_OK);
    }
}
