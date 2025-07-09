<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function indexDashboard()
    {
        $users = User::count();
        $pets = Pet::count();
        $availablePets = Pet::where('status', 'available')->count();
        $adoptedPets = Pet::where('status', 'adopted')->count();
        $rehomedPets = Pet::where('status', 'rehomed')->count();
        return view('admin.dashboard', compact(
            'users',
            'pets',
            'availablePets',
            'adoptedPets',
            'rehomedPets'
        ));
    }

    public function indexUsers(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->input('search');
            $users = User::where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->paginate(10);
        } else {
            $users = User::paginate(10);
        }
        return view('admin.pengguna', compact('users'));
    }

    public function createUser()
    {
        $roles = Role::all();
        return view('admin.tambah-pengguna', compact('roles'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|string|min:6|confirmed',
            'phone'           => 'nullable|string|max:20',
            'address'         => 'nullable|string|max:255',
            'picture_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id'         => 'required|exists:roles,id',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role_id = $request->role_id;

        if ($request->hasFile('picture_profile')) {
            $file = $request->file('picture_profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('profile_pictures', $filename, 'public');
            $user->picture_profile = $path;
        }

        $user->save();

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.detail-pengguna', compact('user'));
    }

    public function indexeditUser($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.edit-pengguna', compact('user', 'roles'));
    }

    public function updateUser(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'picture_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($request->hasFile('picture_profile')) {
            $file = $request->file('picture_profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('profile_pictures', $filename, 'public');
            $user->picture_profile = $path;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role_id' => $request->role_id,
            'picture_profile' => $user->picture_profile ?? null, // Use existing picture if
        ]);

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil diupdate');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus');
    }

    public function indexPosts(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->input('search');
            $pets = Pet::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $pets = Pet::paginate(10);
        }
        return view('admin.postingan', compact('pets'));
    }

    public function viewdetailPost($id)
    {
        $pet = Pet::findOrFail($id);
        return view('admin.detail-postingan', compact('pet'));
    }

    public function vieweditPost($id)
    {
        $pet = Pet::findOrFail($id);
        return view('admin.edit-postingan', compact('pet'));
    }

    public function updatePost(Request $request, string $id)
    {
        $pet = Pet::findOrFail($id);

        $request->validate([
            'address'            => 'nullable|string|max:255',
            'city'               => 'nullable|string|max:100',
            'post_code'          => 'nullable|string|max:20',
            'rehome_reason'      => 'nullable|string|max:255',
            'name'               => 'required|string|max:255',
            'species'            => 'required|in:cat,dog,other',
            'breed'              => 'nullable|string|max:100',
            'gender'             => 'required|in:male,female',
            'age'                => 'nullable|string|max:50',
            'color'              => 'nullable|string|max:50',
            'description'        => 'nullable|string',
            'behavior'           => 'nullable|string|max:255',
            'vaccination_status' => 'required|in:yes,no',
            'trained_status'     => 'required|in:yes,no',
            'good_with_animals'  => 'required|in:yes,no',
            'good_with_kids'     => 'required|in:yes,no',
            'steril_status'      => 'required|in:yes,no',
            'special_needs'      => 'required|in:yes,no',
            'problematic_status' => 'required|in:yes,no',
            'picture1'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture2'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture3'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture4'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        for ($i = 1; $i <= 4; $i++) {
            $pictureField = 'picture' . $i;
            if ($request->hasFile($pictureField)) {
            $file = $request->file($pictureField);
            $filename = time() . "_$i." . $file->getClientOriginalExtension();
            $path = $file->storeAs('pet_pictures', $filename, 'public');
            $pet->$pictureField = $path;
            }
        }

        $pet->update([
            'address'            => $request->address,
            'city'               => $request->city,
            'post_code'          => $request->post_code,
            'rehome_reason'      => $request->rehome_reason,
            'name'               => $request->name,
            'species'            => $request->species,
            'breed'              => $request->breed,
            'gender'             => $request->gender,
            'age'                => $request->age,
            'color'              => $request->color,
            'description'        => $request->description,
            'behavior'           => $request->behavior,
            'vaccination_status' => $request->vaccination_status,
            'trained_status'     => $request->trained_status,
            'good_with_animals'  => $request->good_with_animals,
            'good_with_kids'     => $request->good_with_kids,
            'steril_status'      => $request->steril_status,
            'special_needs'      => $request->special_needs,
            'problematic_status' => $request->problematic_status,
            'picture1'           => $pet->picture1 ?? null,
            'picture2'           => $pet->picture2 ?? null,
            'picture3'           => $pet->picture3 ?? null,
            'picture4'           => $pet->picture4 ?? null,
        ]);

        return redirect()->route('admin.postingan')->with('success', 'Postingan berhasil diupdate');
    }

    public function deletePost($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return redirect()->route('admin.postingan')->with('success', 'Postingan berhasil dihapus');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
