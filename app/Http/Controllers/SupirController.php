<?php

namespace App\Http\Controllers;

use App\Models\Supir;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SupirController extends Controller
{
    public function index()
    {
        $Supir = Supir::all();
        $array = [
            'Supir' => $Supir
        ];
        return view('Supir.index', $array);
    }
    public function store(Request $request)
    {
        $Supir = new Supir([
            'Nama_Supir' => $request->Nama,
            'Alamat_Supir' => $request->Alamat,
            'Telp_Supir' => $request->Notelp,
        ]);
        $Supir->save();
        return redirect()->route('Supir');
    }
    public function update(Request $request, $id)
    {
        $data = Supir::find($id)->update([
            'Nama_Supir' => $request->Nama,
            'Alamat_Supir' => $request->Alamat,
            'Telp_Supir' => $request->Notelp,
        ]);
        return redirect()->route('Supir');
    }
    public function delete($id)
    {
        Supir::find($id)->delete();
        return redirect()->route('Supir');
    }
    public function print()
    {
        $data = Supir::all();
        $pdf = Pdf::loadView('Supir.print', ['data' => $data]);
        return $pdf->download('invoiceSupir.pdf');
    }
}
