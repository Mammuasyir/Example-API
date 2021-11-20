<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Restoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function updateRestoandMenu(Request $request, $resto_id)
    {
        $resto = Restoran::find($resto_id);

        if (!$resto ) {
            return $this->responError(0, "Data Resto Tidak Ada !");
        }

        $validasi = Validator::make($request->all(), [
            'Nama_resto'        => ['required'],
            'Alamat'            => ['required'],
            'Telp'              => ['required'],
            'Jam_buka'          => ['required'],
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $resto->update([
            'Nama_resto'           => $request->Nama_resto,
            'Alamat'               => $request->Alamat,
            'Telp'                 => $request->Telp,
            'Jam_buka'             => $request->Jam_buka,
        ]);

        Menu::where('resto_id', $resto->id)->delete();

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
            'pesan'    => "Berhasil update Resto dan Menu baru !",
            'resto'    => $resto,
            'menu baru'    => $data
        ], HttpFoundationResponse::HTTP_OK);
    }

    public function createMenu(Request $request, $resto_id)
    {
        $resto = Restoran::find($resto_id);

        if (!$resto ) {
            return $this->responError(0, "Data Resto Tidak Ada !");
        }

        $request->validate([
            'Nama_menu'        => ['required'],
            'Harga'            => ['required'],
            'Kategori'         => ['required']
        ]);

        $menu = Menu::create([
                'resto_id'      => $resto->id,
                'Nama_menu'     => $request->Nama_menu,
                'Harga'         => $request->Harga,
                'Kategori'      => $request->Kategori
        ]);

        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil Membuat menu $request->Nama_menu !",
            'resto'    => $resto,
            'result'    => $menu
        ], HttpFoundationResponse::HTTP_OK);
    }

    public function getRestoMenu($id)
    {

        $resto = Restoran::where('id', $id)->first();

        if (!$resto ) {
            return $this->responError(0, "Data Menu Tidak Ada !");
        }

        $data = Menu::where('resto_id', $resto->id)->get();
        
        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil !",
            'resto'    => $resto,
            'menunya'    => $data
        ], HttpFoundationResponse::HTTP_OK);

    }

    public function updateMenu(Request $request, $resto_id, $menu_id)
    {
        $resto = Restoran::find($resto_id);

        if(!$resto ) {
            return $this->responError(0,"Data Resto Tidak Ada !");
        }

        $menu = Menu::find($menu_id);

        if (!$menu ) {
            return $this->responError(0, "Data Menu Tidak Ada !");
        }

        $validasi = Validator::make($request->all(), [
            'Nama_menu'        => ['required'],
            'Harga'            => ['required'],
            'Kategori'         => ['required'],
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $menu->update([
            'Nama_menu'           => $request->Nama_menu,
            'Harga'               => $request->Harga,
            'Kategori'            => $request->Kategori,
        ]);

        return response()->json([
            'status'        => 1,
            'message'       => "Data Menu $request->Nama_menu berhasil di update di resto $resto->Nama_resto ! ",
            'result'        => $menu
        ], 200);
    }

    public function getAllMenu()
    {
        $menu = Menu::all();

        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil mendapatkan semua menu !",
            'result'    => $menu
        ], HttpFoundationResponse::HTTP_OK);
    }

    public function getAllResto()
    {
        $resto = Restoran::all();

        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil menampilkan semua restoran !",
            'result'    => $resto
        ], HttpFoundationResponse::HTTP_OK);
    }

    public function editResto(Request $request, $id)
    {
        $resto = Restoran::where('id', $id)->first();

        if (!$resto ) {
            return $this->responError(0, "Data Menu Tidak Ada !");
        }

        $validasi = Validator::make($request->all(), [
            'Nama_resto'        => ['required'],
            'Alamat'            => ['required'],
            'Telp'              => ['required'],
            'Jam_buka'          => ['required'],
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $resto->update([
            'Nama_resto'           => $request->Nama_resto,
            'Alamat'               => $request->Alamat,
            'Telp'                 => $request->Telp,
            'Jam_buka'             => $request->Jam_buka,
        ]);

        return response()->json([
            'status'        => 1,
            'message'       => "Data Restoran berhasil di update ! ",
            'result'        => $resto
        ], 200);
    }

    public function searchMenu(Request $request)
    {
        $keyword = $request->search;

        $menu = Menu::where('Nama_menu', 'like', "%" . $keyword . "%")
        ->orWhere('Kategori', 'like', "%" . $keyword . "%")
        ->orWhere('Harga', 'like', "%" . $keyword . "%")->first();

        if(!$menu ) {
            return $this->responError(0,"$keyword, Data Menu Tidak Ada !");
        }

        $menu = Menu::where('Nama_menu', 'like', "%" . $keyword . "%")
        ->orWhere('Kategori', 'like', "%" . $keyword . "%")
        ->orWhere('Harga', 'like', "%" . $keyword . "%")->get();

        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil !",
            'menunya'    => $menu
        ], HttpFoundationResponse::HTTP_OK);
    }

    public function deleteMenu($resto_id, $menu_id)
    {
        $resto = Restoran::find($resto_id);

        if(!$resto ) {
            return $this->responError(0,"Data Resto Tidak Ada !");
        }

        $menu = Menu::find($menu_id);

        if(!$menu ) {
            return $this->responError(0,"Data menu pada Resto Tidak Ada !");
        }

        $menu->delete();

        return response()->json([
            'status'    => 1,
            'pesan'    => "$menu->Nama_menu, Berhasil dihapus!",
        ], HttpFoundationResponse::HTTP_OK);
    }

    public function responError($sts, $msg)
    {
        return response()->json([
            'status'    => $sts,
            'pesan'     => $msg
        ], HttpFoundationResponse::HTTP_NOT_FOUND);
    }
}
