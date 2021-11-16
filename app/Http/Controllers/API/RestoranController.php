<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Restoran;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class RestoranController extends Controller
{
    public function createRestoMenu(Request $request)
    {
        $resto      = new Restoran();

        $pesan = [
            'Nama_resto.required'       => ['Nama Resto Wajib'],
            'Alamat.required'           => ['Alamat Wajib'],
            'Telp.required'             => ['Telp Wajib'],
            'Jam_buka.required'         => ['Jambu Wajib'],
        ];

        $request->validate([
            'Nama_resto'        => ['required'],
            'Alamat'            => ['required'],
            'Telp'              => ['required'],
            'Jam_buka'          => ['required'],
        ],$pesan);

        $resto->Nama_resto      = $request->Nama_resto;
        $resto->Alamat          = $request->Alamat;
        $resto->Telp            = $request->Telp;
        $resto->Jam_buka        = $request->Jam_buka;
        $resto->Rating          = $request->Rating;
        $resto->save();


        foreach($request->list_menu as $value)
        {
            $menu = array(
                'resto_id'      => $resto->id,
                'Nama_menu'     => $value['Nama_menu'],
                'Harga'         => $value['Harga'],
                'Kategori'      => $value['Kategori'],
            );

            Menu::create($menu);
        }

        $data = Menu::where('resto_id', $resto->id)->get();
        
        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil !",
            'resto'    => $resto,
            'result'    => $data
        ], HttpFoundationResponse::HTTP_OK);


    }

    public function getRestoMenu($id)
    {

        $resto = Restoran::where('id', $id)->get();

        $data = Menu::where('resto_id', $id)->get();

        
        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil !",
            'resto'    => $resto,
            'menunya'    => $data
        ], HttpFoundationResponse::HTTP_OK);

        
    }
}
