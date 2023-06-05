<?php

namespace App\Http\Controllers;

use App\Models\Supir;
use App\Models\Truk;
use Illuminate\Http\Request;

class TrukController extends Controller
{
    public function index()
    {
        $Truk = Truk::all();
        $supir = Supir::all();
        $array = [
            'Truk' => $Truk,
            'Supir' => $supir,
        ];
        return view('Truk.index', $array);
    }
    public function store(Request $request)
    {
        $Truk = new Truk([
            'Nopol_Truk' => $request->nopol,
            'id_Supir' => $request->IDSupir,
        ]);
        $Truk->save();
        return redirect()->route('Truk');
    }
    public function update(Request $request, $id)
    {
        $data = Truk::find($id)->update([
            'Nopol_Truk' => $request->nopol,
            'id_Supir' => $request->IDSupir,
        ]);
        return redirect()->route('Truk');
    }
    public function delete($id)
    {
        Truk::find($id)->delete();
        return redirect()->route('Truk');
    }
}
