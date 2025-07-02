<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;


class RehomerController extends Controller
{
    public function create(): View
    {
        return view('form-rehomer');
    }

    // app/Http/Controllers/RehomerController.php

    public function store(Request $request)
    {
        // This validation block correctly checks for rehome_reason and waiting_time
        $validatedData = $request->validate([
            'jenis_hewan' => 'required|in:cat,dog,other',
            'steril_status' => 'required|in:yes,no',
            'rehome_reason' => 'required|string|max:255',
            'waiting_time' => 'required|string|max:255',
            'problematic_status' => 'required|in:yes,no',
            'nama_hewan' => 'required|string|max:255',
            'umur' => 'required|integer|min:0',
            'ukuran' => 'required|in:kecil,sedang,besar',
            'gender' => 'required|in:jantan,betina',
            'breed' => 'required|string|max:255',
            'warna' => 'required|string',
            'vaksin_lengkap' => 'required|in:iya,tidak,tidak_diketahui',
            'sudah_dilatih' => 'required|in:iya,tidak,tidak_diketahui',
            'baik_dengan_hewan_lain' => 'required|in:iya,tidak,tidak_diketahui',
            'baik_dengan_anak' => 'required|in:iya,tidak,tidak_diketahui',
            'ras_murni' => 'required|in:iya,tidak,tidak_diketahui',
            'kebutuhan_khusus' => 'required|in:iya,tidak,tidak_diketahui',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:20',
            'sejarah' => 'required|string',
            'home_photo_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'home_photo_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'home_photo_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'home_photo_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dokumen.*' => 'nullable|file|mimes:pdf,jpeg,png,jpg,doc,docx|max:2048',
        ]);

        // Handle Picture Uploads
        $picturePaths = [];
        for ($i = 1; $i <= 4; $i++) {
            $field = 'home_photo_' . $i;
            if ($request->hasFile($field)) {
                $picturePaths[$i] = $request->file($field)->store('pet_pictures', 'public');
            } else {
                $picturePaths[$i] = null;
            }
        }

        // Handle Document Uploads
        $documentPaths = [];
        if ($request->hasFile('dokumen')) {
            foreach ($request->file('dokumen') as $key => $file) {
                if ($key < 4) {
                    $documentPaths[$key + 1] = $file->store('pet_documents', 'public');
                }
            }
        }

        // This create() call correctly includes rehome_reason and all other fields
        Pet::create([
            'species' => $validatedData['jenis_hewan'],
            'name' => $validatedData['nama_hewan'],
            'age' => $validatedData['umur'],
            'gender' => $validatedData['gender'] == 'jantan' ? 'male' : 'female',
            'breed' => $validatedData['breed'],
            'color' => $validatedData['warna'],
            'address' => $validatedData['alamat'],
            'city' => $validatedData['kota'],
            'post_code' => $validatedData['kode_pos'],
            'description' => $validatedData['sejarah'],
            'steril_status' => $validatedData['steril_status'],
            'problematic_status' => $validatedData['problematic_status'],
            'vaccination_status' => $validatedData['vaksin_lengkap'] == 'iya' ? 'yes' : 'no',
            'trained_status' => $validatedData['sudah_dilatih'] == 'iya' ? 'yes' : 'no',
            'good_with_animals' => $validatedData['baik_dengan_hewan_lain'] == 'iya' ? 'yes' : 'no',
            'good_with_kids' => $validatedData['baik_dengan_anak'] == 'iya' ? 'yes' : 'no',
            'special_needs' => $validatedData['kebutuhan_khusus'] == 'iya' ? 'yes' : 'no',
            'picture1' => $picturePaths[1] ?? null,
            'picture2' => $picturePaths[2] ?? null,
            'picture3' => $picturePaths[3] ?? null,
            'picture4' => $picturePaths[4] ?? null,
            'document1' => $documentPaths[1] ?? null,
            'document2' => $documentPaths[2] ?? null,
            'document3' => $documentPaths[3] ?? null,
            'document4' => $documentPaths[4] ?? null,
            'user_id' => Auth::id(),
            'rehome_reason' => $validatedData['rehome_reason'],
            'waiting_time' => $validatedData['waiting_time'],
            'behavior' => 'calm',
        ]);

        return redirect()->route('landing')->with('success', 'Data hewan berhasil disubmit!');
    }
}
