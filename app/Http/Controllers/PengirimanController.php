<?php

namespace App\Http\Controllers;

use App\Models\Gitar;
use App\Models\Outlet;
use App\Models\Pengiriman;
use App\Models\Rute;
use App\Models\Supir;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PengirimanController extends Controller
{
    public function index()
    {
        $Pengiriman = Pengiriman::all();
        $User = User::all();
        $Gitar = Gitar::all();
        $Supir = Supir::all();
        $Rute = Rute::all();
        $array = [
            'Pengiriman' => $Pengiriman,
            'User' => $User,
            'Gitar' => $Gitar,
            'Supir' => $Supir,
            'Rute' => $Rute
        ];
        return view('Pengiriman.index', $array);
    }
    public function store(Request $request)
    {
        $Pengiriman = new Pengiriman([
            'id_users' => $request->user,
            'id_Gitar' => $request->gitar,
            'Jumlah' => $request->jumlah,
            'Waktu_Pengiriman' => $request->waktu,
            'id_Supir' => $request->supir,
            'id_Rute' => $request->Rute
        ]);
        $Pengiriman->save();
        return redirect()->route('Pengiriman');
    }
    public function update(Request $request, $id)
    {
        $data = Pengiriman::find($id)->update([
            'id_users' => $request->user,
            'id_Gitar' => $request->gitar,
            'Jumlah' => $request->jumlah,
            'Waktu_Pengiriman' => $request->waktu,
            'id_Supir' => $request->supir,
            'id_Rute' => $request->Rute
        ]);
        return redirect()->route('Pengiriman');
    }
    public function delete($id)
    {
        Pengiriman::find($id)->delete();
        return redirect()->route('Pengiriman');
    }
    public function print()
    {
        $data = Pengiriman::all();
        $pdf = Pdf::loadView('Pengiriman.print', ['data' => $data]);
        return $pdf->download('invoicePengiriman.pdf');
    }
}
