<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UsersController extends Controller
{
    public function index()
    {
        $Users = User::all();
        $Role = Role::all();
        $array = [
            'Users' => $Users,
            'Role' => $Role
        ];
        return view('Users.index', $array);
    }
    public function store(Request $request)
    {
        $Users = new User([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->pass,
            'id_role' => $request->IDRole,
        ]);
        $Users->save();
        return redirect()->route('Users');
    }
    public function update(Request $request, $id)
    {
        $data = User::find($id)->update([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->pass,
            'id_role' => $request->IDRole,
        ]);
        return redirect()->route('Users');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('Users');
    }
    public function print()
    {
        $data = User::all();
        $pdf = Pdf::loadView('Users.print', ['data' => $data]);
        return $pdf->download('invoiceUser.pdf');
    }
}
