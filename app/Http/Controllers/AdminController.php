<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

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
        $users = User::all();
        return view('admin.pengguna', compact('users'));
    }

    // Tampilkan form tambah pengguna
    public function createUser()
    {
        $roles = Role::all();
        return view('admin.tambah-pengguna', compact('roles'));
    }

    // Simpan pengguna baru
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|string|min:6|confirmed',
            'phone'           => 'nullable|string|max:20',
            'address'         => 'nullable|string|max:255',
            'picture_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id'         => 'required|exists:roles,id',
        ]);

        if ($request->hasFile('picture_profile')) {
            $file = $request->file('picture_profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('profile_pictures', $filename, 'public');
            $validated['picture_profile'] = $path;
        }

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

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
