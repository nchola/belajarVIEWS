<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function index()
    {
        if (Auth::user()->role == "Admin") {
            $users = User::all();
        } else {
            $users = User::where(['role' => 'Divisi Marketing'])->get();
        }
        return view('users.index', compact('users'));
    }

    function create()
    {
        return view('users.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password;
        if (request()->user()->role == 'Admin') {
            $user->role = $request->role;
        } else {
            $user->role = "Divisi Marketing";
        }

        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();

        Session::flash('message', "User berhasil disimpan!");
        return redirect()->route('users.index');
    }

    function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validation_rules = [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ];
        if ($user->username != $request->username) {
            $validation_rules['username'] = 'required|unique:users,username';
        }
        $request->validate($validation_rules);

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password;

        if (request()->user()->role == 'Admin') {
            $user->role = $request->role;
        } else {
            $user->role = "Divisi Marketing";
        }

        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();

        Session::flash('message', "User berhasil diubah!");
        return redirect()->route('users.index');
    }

    function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('message', "User berhasil dihapus!");
        return redirect()->route('users.index');
    }
}
