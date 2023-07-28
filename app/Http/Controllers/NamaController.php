<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NamaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validasi form dan simpan data ke database
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Perbarui data di database
        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        return redirect('/users')->with('success', 'Pengguna berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        return redirect('/users')->with('success', 'Pengguna berhasil dihapus.');
    }
}
