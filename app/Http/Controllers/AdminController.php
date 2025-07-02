<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //index dashboard
    public function indexDashboard()
    {
        return view('admin.dashboard');
    }

    //index tabel pengguna
    public function indexUsers()
    {
        return view('admin.pengguna');
    }

    // Tampilkan form tambah pengguna
    public function createUser()
    {
        return view('admin.tambah_pengguna');
    }

    // Simpan pengguna baru
    public function storeUser(Request $request)
    {
        // Validasi dan simpan data pengguna
        // Contoh sederhana:
        // User::create($request->all());
        return redirect()->route('admin.users')->with('success', 'Pengguna berhasil ditambahkan');
    }

    // Tampilkan detail pengguna
    public function showUser($id)
    {
        // $user = User::findOrFail($id);
        return view('admin.detail_pengguna'/*, compact('user')*/);
    }

    // Tampilkan form edit pengguna
    public function editUser($id)
    {
        // $user = User::findOrFail($id);
        return view('admin.edit_pengguna'/*, compact('user')*/);
    }

    // Update data pengguna
    public function updateUser(Request $request, $id)
    {
        // $user = User::findOrFail($id);
        // $user->update($request->all());
        return redirect()->route('admin.users')->with('success', 'Pengguna berhasil diupdate');
    }

    // Hapus pengguna
    public function deleteUser($id)
    {
        // $user = User::findOrFail($id);
        // $user->delete();
        return redirect()->route('admin.users')->with('success', 'Pengguna berhasil dihapus');
    }
}
