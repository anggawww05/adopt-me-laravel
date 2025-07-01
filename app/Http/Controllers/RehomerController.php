<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;


class RehomerController extends Controller
{
    public function create(Pet $pet): View
    {
        return view('form-rehomer', ['pet' => $pet]);
    }

    public function store(Request $request, Pet $pet)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'species' => 'required|in:cat,dog,other',
            'steril_status' => 'required|in:yes,no',
            'problematic_status' => 'required|in:yes,no',
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
            'breed' => 'required|string|max:255',
            'size' => 'required|in:small,medium,large',
            'gender' => 'required|in:male,female',
            'color' => 'required|in:black,white,brown,gray,yellow,other',
            'complete_vaksinated' => 'required|in:yes,no,unknown',
            'trained_status' => 'required|in:yes,no,unknown',
            'good_with_animals' => 'required|in:yes,no',
            'good_with_kids' => 'required|in:yes,no,unknown',
            'pure_breed' => 'required|in:yes,no,unknown',
            'special_needs' => 'required|in:yes,no,unknown',
            'address' => 'required|string',
            'city' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'picture1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document1' => 'nullable|file|mimes:pdf,jpeg,png,jpg,doc,docx|max:2048',
            'document2' => 'nullable|file|mimes:pdf,jpeg,png,jpg,doc,docx|max:2048',
            'document3' => 'nullable|file|mimes:pdf,jpeg,png,jpg,doc,docx|max:2048',
            'document4' => 'nullable|file|mimes:pdf,jpeg,png,jpg,doc,docx|max:2048',
        ]);

        // Handle file uploads
        $fileFields = ['picture1', 'picture2', 'picture3', 'picture4', 'document1', 'document2', 'document3', 'document4'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $validatedData[$field] = $request->file($field)->store('pet_files', 'public');
            }
        }

        // Tambahkan user_id dari user yang sedang login
        $validatedData['user_id'] = Auth::id();

        // Simpan data ke database
        $pet = Pet::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('landing')->with('success', 'Data hewan berhasil disubmit!');
    }
}
