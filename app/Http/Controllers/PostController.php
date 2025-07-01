<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet; // <-- Import the Pet model

class PostController extends Controller
{
    // Updated method to handle searching and filtering
    public function indexAdopt(Request $request)
    {
        // Start a new query on the Pet model
        $query = Pet::query();

        // 1. Filter by main search keyword (from the top search bar)
        if ($request->filled('q')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%')
                  ->orWhere('breed', 'like', '%' . $request->q . '%')
                  ->orWhere('description', 'like', '%' . $request->q . '%');
            });
        }

        // 2. Filter by species (cat/dog)
        if ($request->filled('species')) {
            $query->where('species', $request->species);
        }

        // 3. Filter by city/location
        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }
        
        // 4. Filter by gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // 5. Filter by age
        if ($request->filled('age')) {
            if ($request->age == 'lt1') { // Less than 1 year
                $query->where('age', '<', 12);
            } elseif ($request->age == '1to3') { // 1 to 3 years
                $query->whereBetween('age', [12, 36]);
            } elseif ($request->age == 'gt3') { // Greater than 3 years
                $query->where('age', '>', 36);
            }
        }

        // Get the results, paginate them (9 per page), and keep the query string in the links
        $pets = $query->where('status', 'available')->paginate(9)->withQueryString();

        // Return the view with the pets data
        return view('adoptpost', ['pets' => $pets]);
    }

    // Updated method to show a specific pet's details
    public function indexDetail(Pet $pet) // <-- Use Route Model Binding
    {
        // The $pet is automatically fetched from the database by Laravel
        return view('detailadopt', ['pet' => $pet]);
    }
}