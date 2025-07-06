<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\SearchHistory;
use App\Models\Pet;
use App\Models\AdoptionHistory;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'profile');

        if (!view()->exists("account.$tab")) {
            abort(404, "Halaman akun '$tab' tidak ditemukan.");
        }

        $viewData = [
            'tab' => $tab,
            'searchHistories' => collect(),
            'pets' => collect(),
            'selectedPet' => null,
            'adoptionRequests' => collect(),
            'adoptionHistories' => collect(),
        ];

        switch ($tab) {
            case 'profile':
                $viewData['searchHistories'] = SearchHistory::where('user_id', auth()->id())
                    ->orderByDesc('created_at')
                    ->get();
                break;

            case 'rehome':
                $viewData['pets'] = Pet::where('user_id', auth()->id())->get();
                break;

            case 'rehome-detail':
                if ($request->has('pet_id')) {
                    $selectedPet = Pet::where('id', $request->query('pet_id'))
                        ->where('user_id', auth()->id())
                        ->first();

                    if ($selectedPet) {
                        $viewData['selectedPet'] = $selectedPet;
                        $viewData['adoptionRequests'] = AdoptionHistory::with('user')
                            ->where('pet_id', $selectedPet->id)
                            ->get();
                    }
                }
                break;

            case 'history':
                $viewData['adoptionHistories'] = AdoptionHistory::with('pet', 'user')
                    ->where('user_id', auth()->id())
                    ->orderByDesc('created_at')
                    ->get();
                break;
        }

        return view('account', $viewData);
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

    public function accept($id)
    {
        $adoption = AdoptionHistory::with('pet')->findOrFail($id);

        if ($adoption->pet->user_id !== Auth::id()) {
            abort(403, 'Anda tidak diizinkan melakukan aksi ini.');
        }

        $adoption->status = 'accepted';
        $adoption->save();

        return back()->with('success', 'Permintaan adopsi telah diterima.');
    }

    public function reject($id)
    {
        $adoption = AdoptionHistory::with('pet')->findOrFail($id);

        if ($adoption->pet->user_id !== Auth::id()) {
            abort(403, 'Anda tidak diizinkan melakukan aksi ini.');
        }

        $adoption->status = 'rejected';
        $adoption->save();

        return back()->with('success', 'Permintaan adopsi telah ditolak.');
    }

    public function review($id)
    {
        $adoption = AdoptionHistory::with(['user', 'pet'])->findOrFail($id);

        if ($adoption->pet->user_id !== auth()->id()) {
            abort(403, 'Anda tidak diizinkan melihat aplikasi ini.');
        }

        return view('account.review-adoption', compact('adoption'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi lama salah.']);
            }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Kata sandi berhasil diperbarui.');
    }
}
