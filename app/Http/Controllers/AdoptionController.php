<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\AdoptionHistory;
use App\Models\Pet; // <-- Import Pet model
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    // The create method now receives the Pet object
    public function create(Pet $pet): View
    {
        // Pass the pet to the view
        return view('form-adopter', ['pet' => $pet]);
    }

    // The store method also receives the Pet object
    public function store(Request $request, Pet $pet)
    {
        // 1. Validate all form data, including the photos
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'post_code' => 'required|string|max:10',
            'phone' => 'nullable|string|max:20',
            'home_phone' => 'nullable|string|max:20',
            'have_yard' => 'required|in:yes,no',
            'environment_situation' => 'required|string',
            'house_type' => 'required|string',
            'home_activity' => 'required|string',
            'family_members' => 'required|integer|min:1',
            'youngest_age' => 'required|integer|min:0',
            'kids_visited' => 'required|in:yes,no',
            'visited_age' => 'nullable|integer|min:0',
            'have_roommate' => 'required|in:yes,no',
            'have_alergy' => 'required|in:yes,no',
            'have_other_pets' => 'required|in:yes,no',
            'describe_other_pets' => 'nullable|string',
            'experience' => 'nullable|string',
            'home_photo_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Photo validation
            'home_photo_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'home_photo_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'home_photo_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Handle file uploads
        for ($i = 1; $i <= 4; $i++) {
            $photoField = 'home_photo_' . $i;
            if ($request->hasFile($photoField)) {
                // Store the file in 'storage/app/public/adopter_homes' and get the path
                $path = $request->file($photoField)->store('adopter_homes', 'public');
                $validatedData[$photoField] = $path;
            }
        }

        // 3. Add user_id and pet_id to the data
        $validatedData['user_id'] = Auth::id();
        $validatedData['name'] = Auth::user()->name;
        $validatedData['pet_id'] = $pet->id;

        // 4. Create the record in the database
        AdoptionHistory::create($validatedData);

        // 5. Redirect with a success message
        return redirect()->route('landing')->with('success', 'Formulir adopsi Anda telah berhasil dikirim!');
    }
}