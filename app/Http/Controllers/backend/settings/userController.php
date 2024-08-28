<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class userController extends Controller
{
    public function index(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));
        return view('template.admin.settings.users.index', [
            'pageTitle' => $pageTitle,
            'dataUsers' => User::latest()->get(),
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));
        return view('template.admin.settings.users.create', [
            'pageTitle' => $pageTitle,
            'roles' => Role::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->assignRole($request->role);
        $user->password = bcrypt($request->password);
        $user->is_active = true;

        return redirect()->route('users.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $segments = $request->segments();
        $pageTitle = ucfirst(str_replace('-', ' ', end($segments)));
        return view('template.admin.settings.users.edit', [
            'pageTitle' => $pageTitle,
            'user' => User::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        
        
        if ($request->password) {
            $request->validate([
                'password' => 'required',
            ]);
            $password = bcrypt($request->password);
        } else {
            $password = User::findOrFail($id)->password;
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->syncRoles($request->role);
        $user->password = $password;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');
    }
}
