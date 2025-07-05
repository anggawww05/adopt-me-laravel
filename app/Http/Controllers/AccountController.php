<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SearchHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'profile');

        if (!view()->exists("account.$tab")) {
            abort(404, "Halaman akun '$tab' tidak ditemukan.");
        }

        $searchHistories = [];
        if ($tab === 'profile') {
            $searchHistories = SearchHistory::where('user_id', auth()->id())
                ->orderByDesc('created_at')
                ->get();
        }

        return view('account', [
            'tab' => $tab,
            'searchHistories' => $searchHistories,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'picture_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('picture_profile')) {
            if ($user->picture_profile && Storage::exists($user->picture_profile)) {
                Storage::delete($user->picture_profile);
            }

            $path = $request->file('picture_profile')->store('profile_photos', 'public');
            $user->picture_profile = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function deleteSearchHistory($id)
    {
        $history = SearchHistory::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $history->delete();

        return back()->with('success', 'Riwayat pencarian berhasil dihapus.');
    }
}
