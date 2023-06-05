<?php

namespace App\Http\Controllers;

use App\Models\Gitar;
use App\Models\Jenis_Gitar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GitarController extends Controller
{
    public function index(){
        $gitar = Gitar::all();
        $JenisGitar = Jenis_Gitar::all();
        //mengambil data dari model
        $array = [
            'gitar' => $gitar,
            'JenisGitar'=>$JenisGitar,
        ];
        return view('DataGitar.index',$array);
    }
    public function store(Request $request){
        $gitar = new Gitar([
            'Nama_Gitar'=>$request->nama,
            'Stok'=>$request->stok,
            'id_Jenis'=>$request->jenis,
        ]);
        $gitar->save();
        return redirect()->route('DataGitar');
    }
    public function update(Request $request, $id)
    {
        $data = Gitar::find($id)->update([
            'Nama_Gitar' => $request->nama,
            'Stok' => $request->stok,
            'id_Jenis' => $request->jenis,
        ]);
        return redirect()->route('DataGitar');
    }
    public function delete($id)
    {
        Gitar::find($id)->delete();
        return redirect()->route('DataGitar');
    }
    public function print()
    {
        $data = Gitar::all();
        $pdf = Pdf::loadView('DataGitar.print', ['data' => $data]);
        return $pdf->download('invoice.pdf');
    }
}
