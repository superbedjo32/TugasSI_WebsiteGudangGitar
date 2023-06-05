<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
//menampilkan semua data dari tabel
class GudangController extends Controller
{
    public function index(){
        $gudang = Gudang::all();
        $array = [
            'gudang' => $gudang
        ];
        return view('Gudang.index',$array);
    }
    public function store(Request $request){
        $gudang = new Gudang([
            'Nama_Gudang' => $request->NamaG,
            'Alamat_Gudang' => $request->Almt,
        ]);
        $gudang->save();
        return redirect()->route('Gudang');
    }
    public function update(Request $request, $id)
    {
        $data = Gudang::find($id)->update([
            'Nama_Gudang' => $request->NamaG,
            'Alamat_Gudang' => $request->Almt,
        ]);
        return redirect()->route('Gudang');
    }
    public function delete($id)
    {
        Gudang::find($id)->delete();
        return redirect()->route('Gudang');
    }
    public function print(){
        $data=Gudang::all();
        $pdf = Pdf::loadView('Gudang.print', ['data'=> $data]);
        return $pdf->download('invoice.pdf');
    }
}
