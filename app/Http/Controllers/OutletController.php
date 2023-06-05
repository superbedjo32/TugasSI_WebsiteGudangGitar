<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $Outlet = Outlet::all();
        $Users = User::all();
        $array = [
            'Outlet' => $Outlet,
            'Users' => $Users
        ];
        return view('Outlet.index', $array);
    }
    public function store(Request $request)
    {
        $Outlet = new Outlet([
            'Nama_Outlet' => $request->NamaO,
            'Alamat_Outlet' => $request->Almt,
            'Telp_Outlet' => $request->telp,
            'id_users' => $request->id,
        ]);
        $Outlet->save();
        return redirect()->route('Outlet');
    }
    public function update(Request $request, $id)
    {
        $data = Outlet::find($id)->update([
            'Nama_Outlet' => $request->NamaO,
            'Alamat_Outlet' => $request->Almt,
            'Telp_Outlet' => $request->telp,
            'id_users' => $request->id,
        ]);
        return redirect()->route('Outlet');
    }
    public function delete($id)
    {
        Outlet::find($id)->delete();
        return redirect()->route('Outlet');
    }
}
