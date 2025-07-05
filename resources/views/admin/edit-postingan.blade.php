@extends('admin.main-admin')

@section('container')
    <div class="ml-64 p-6 bg-gray-50 min-h-screen">
        <div class="mb-4">
            <a href="{{ route('admin.postingan') }}"
                class="inline-flex items-center px-4 py-1 bg-[#D678D6] hover:bg-[#b85bb8] text-white rounded transition">
                &larr; Kembali
            </a>
        </div>
        <div class="flex justify-center">
            <div class="w-screen bg-white border border-gray-300 rounded-2xl shadow p-8 flex">
                <form action="{{route('admin.postingan.view.post', $pet->id)}}" method="POST" enctype="multipart/form-data" class="flex w-full gap-6">
                    @csrf
                    @method('POST')
                    <div class="flex flex-col w-full gap-6">
                        <div class="flex flex-col gap-4 w-full">
                            <div class="w-full flex gap-2 border border-gray-200 rounded-lg p-4 justify-center">
                                @for($i=1; $i<=4; $i++)
                                    <div class="flex flex-col items-center">
                                        <img src="{{ asset('storage/' . $pet->{'picture'.$i}) }}" alt="Picture {{ $i }}" class="w-32 h-32 bg-black rounded-xl object-cover mb-2">
                                        <input type="file" name="picture{{ $i }}" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-[#D678D6] file:text-white hover:file:bg-[#b85bb8]"/>
                                    </div>
                                @endfor
                            </div>
                            <div class="border border-gray-200 rounded-lg p-4 flex flex-col gap-3">
                                <div>
                                    <label class="block text-sm font-medium">Rehomer</label>
                                    <input type="text" name="rehomer" value="{{ $pet->user->name }}" class="border border-gray-200 rounded px-3 py-2 bg-gray-100 w-full" disabled>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Alamat</label>
                                    <input type="text" name="address" value="{{ old('address', $pet->address) }}" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Kota</label>
                                    <input type="text" name="city" value="{{ old('city', $pet->city) }}" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Kode Pos</label>
                                    <input type="text" name="post_code" value="{{ old('post_code', $pet->post_code) }}" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Alasan Rehome</label>
                                    <input type="text" name="rehome_reason" value="{{ old('rehome_reason', $pet->rehome_reason) }}" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                </div>
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="border border-gray-200 rounded-lg w-full p-4 flex flex-col gap-3">
                                <div>
                                    <label class="block text-sm font-medium">Nama Hewan</label>
                                    <input type="text" name="name" value="{{ old('name', $pet->name) }}" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Spesies</label>
                                    <select name="species" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                        <option value="cat" {{ $pet->species == 'cat' ? 'selected' : '' }}>Kucing</option>
                                        <option value="dog" {{ $pet->species == 'dog' ? 'selected' : '' }}>Anjing</option>
                                        <option value="other" {{ $pet->species == 'other' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Ras</label>
                                    <input type="text" name="breed" value="{{ old('breed', $pet->breed) }}" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Jenis Kelamin</label>
                                    <select name="gender" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                        <option value="male" {{ $pet->gender == 'male' ? 'selected' : '' }}>Jantan</option>
                                        <option value="female" {{ $pet->gender == 'female' ? 'selected' : '' }}>Betina</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Umur</label>
                                    <input type="text" name="age" value="{{ old('age', $pet->age) }}" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Warna</label>
                                    <input type="text" name="color" value="{{ old('color', $pet->color) }}" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Deskripsi</label>
                                    <textarea name="description" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">{{ old('description', $pet->description) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Perilaku</label>
                                    <input type="text" name="behavior" value="{{ old('behavior', $pet->behavior) }}" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                </div>
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="border border-gray-200 rounded-lg p-4 flex flex-col gap-3">
                                <div>
                                    <label class="block text-sm font-medium">Vaksinasi</label>
                                    <select name="vaccination_status" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                        <option value="yes" {{ $pet->vaccination_status == 'yes' ? 'selected' : '' }}>Iya</option>
                                        <option value="no" {{ $pet->vaccination_status == 'no' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Terlatih</label>
                                    <select name="trained_status" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                        <option value="yes" {{ $pet->trained_status == 'yes' ? 'selected' : '' }}>Iya</option>
                                        <option value="no" {{ $pet->trained_status == 'no' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Baik dengan Hewan Lain</label>
                                    <select name="good_with_animals" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                        <option value="yes" {{ $pet->good_with_animals == 'yes' ? 'selected' : '' }}>Iya</option>
                                        <option value="no" {{ $pet->good_with_animals == 'no' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Baik dengan Anak-anak</label>
                                    <select name="good_with_kids" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                        <option value="yes" {{ $pet->good_with_kids == 'yes' ? 'selected' : '' }}>Iya</option>
                                        <option value="no" {{ $pet->good_with_kids == 'no' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Steril</label>
                                    <select name="steril_status" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                        <option value="yes" {{ $pet->steril_status == 'yes' ? 'selected' : '' }}>Iya</option>
                                        <option value="no" {{ $pet->steril_status == 'no' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Kebutuhan Khusus</label>
                                    <select name="special_needs" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                        <option value="yes" {{ $pet->special_needs == 'yes' ? 'selected' : '' }}>Iya</option>
                                        <option value="no" {{ $pet->special_needs == 'no' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Status Problematic</label>
                                    <select name="problematic_status" class="border border-gray-200 rounded px-3 py-2 bg-white w-full">
                                        <option value="yes" {{ $pet->problematic_status == 'yes' ? 'selected' : '' }}>Iya</option>
                                        <option value="no" {{ $pet->problematic_status == 'no' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-2 bg-[#D678D6] hover:bg-[#b85bb8] text-white rounded transition">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
