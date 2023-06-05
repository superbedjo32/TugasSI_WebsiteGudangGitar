<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Outlet;
use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index()
    {
        $Rute = Rute::all();
        $Gudang = Gudang::all();
        $Outlet = Outlet::all();
        $array = [
            'Rute' => $Rute,
            'Gudang' => $Gudang,
            'Outlet' => $Outlet
        ];
        return view('Rute.index', $array);
    }
    public function store(Request $request)
    {
        $Rute = new Rute([
            'id_Gudang' => $request->gudang,
            'id_Outlet' => $request->outlet,
        ]);
        $Rute->save();
        return redirect()->route('Rute');
    }
    public function update(Request $request, $id)
    {
        $data = Rute::find($id)->update([
            'id_Gudang' => $request->gudang,
            'id_Outlet' => $request->outlet,
        ]);
        return redirect()->route('Rute');
    }
    public function delete($id)
    {
        Rute::find($id)->delete();
        return redirect()->route('Rute');
    }
}
