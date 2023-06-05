<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $Role = Role::all();
        $array = [
            'Role' => $Role
        ];
        return view('Role.index', $array);
    }
    public function store(Request $request)
    {
        $Role = new Role([
            'Role' => $request->role
        ]);
        $Role->save();
        return redirect()->route('Role');
    }
    public function update(Request $request, $id)
    {
        $data = Role::find($id)->update([
            'Role' => $request->role
        ]);
        return redirect()->route('Role');
    }
    public function delete($id)
    {
        Role::find($id)->delete();
        return redirect()->route('Role');
    }
}
