<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Gitar;
use Illuminate\Http\Request;

class JenisGitarController extends Controller
{
    public function index()
    {
        $JenisGitar = Jenis_Gitar::all();
        $array = [
            'jenisgitar' => $JenisGitar
        ];
        return view('JenisGitar.index', $array);
    }

    public function store(Request $request)
    {
        $JenisGitar = new Jenis_Gitar();
        $request->validate([
            'JenisGitar' => 'required',
        ]);
        $JenisGitar = Jenis_Gitar::create([
            'nama_jenis' => $request->JenisGitar,
        ]);
        $JenisGitar->save();
        return redirect()->route('JenisGitar');
    }
    public function update(Request $request, $id)
    {
        $data = Jenis_Gitar::find($id)->update([
            'nama_jenis' => $request->JenisGitar,
        ]);
        return redirect()->route('JenisGitar');
    }
    public function delete($id)
    {
        Jenis_Gitar::find($id)->delete();
        return redirect()->route('JenisGitar');
    }
}
