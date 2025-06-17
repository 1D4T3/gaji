<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // memvalidasi inputan
    $this->validate($request, [
        'name'      => 'required',
        'email'     => 'required|email',
        'password'  => 'required',
        'level'     => 'required'
    ]);

    // insert data ke database
    User::create([
        'name'      => $request->name,
        'email'     => $request->email,
        'password'  => Hash::make($request->password),
        'level'     => $request->level,
    ]);

    Alert::success('Sukses', 'Berhasil Menambahkan User Baru');
    return redirect()->route('pengguna.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User  $pengguna)
    {
        return view('users.edit', compact ('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $pengguna)
    {

    // mengambil data pengguna dari database
    //$pengguna = User::findOrFail($id);

    // update data ke database
    $this->validate($request, [
        'name'      => 'required',
        'email'     => 'required|email',
        'password'  => 'nullable',
        'level'     => 'required',
    ]);

    // update data ke database
    $pengguna->update([
        'name'      => $request->name,
        'email'     => $request->email,
        'password'  => is_null($request->password) ? $pengguna->password : Hash::make($request->password),
        'level'     => $request->level,
    ]);

    Alert::success('Sukses', 'Berhasil Mengupdate Pengguna');
    return redirect()->route('pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $pengguna)
    {
        // mengambil data pengguna dari database
        //$pengguna = User::findOrFail($id);

        // menghapus data pengguna
        //$pengguna->delete();

        $pengguna->destroy($pengguna->id);
        Alert::success('Sukses', 'Berhasil Menghapus Pengguna');
        return redirect()->route('pengguna.index');
    }
}
