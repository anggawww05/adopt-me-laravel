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
                <div class="flex w-full gap-6">
                    <div class="flex flex-col w-full gap-6">
                        <div class="flex flex-col gap-4 w-full">
                            <div class="w-full flex gap-2 border border-gray-200 rounded-lg p-4 justify-center">
                                <img src="{{ asset('storage/' . $pet->picture1) }}" alt="Picture 1" class="w-50 h-50 bg-black rounded-xl object-cover">
                                <img src="{{ asset('storage/' . $pet->picture2) }}" alt="Picture 2" class="w-50 h-50 bg-black rounded-xl object-cover">
                                <img src="{{ asset('storage/' . $pet->picture3) }}" alt="Picture 3" class="w-50 h-50 bg-black rounded-xl object-cover">
                                <img src="{{ asset('storage/' . $pet->picture4) }}" alt="Picture 4" class="w-50 h-50 bg-black rounded-xl object-cover">
                            </div>
                            <div class="border border-gray-200 rounded-lg p-4 flex flex-col gap-3">
                                <div>
                                    <label class="block text-sm font-medium">Rehomer</label>
                                    <div class="border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->user->name}}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Alamat</label>
                                    <div class="border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->address}}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Kota</label>
                                    <div class="h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->city}}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Kode Pos</label>
                                    <div class="h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->post_code}}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Alasan Rehome</label>
                                    <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->rehome_reason}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="border border-gray-200 rounded-lg w-full p-4 flex flex-col gap-3">
                                <div>
                                    <label class="block text-sm font-medium">Nama Hewan</label>
                                    <div class=" h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->name}}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Spesies</label>
                                    <div class=" h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $pet->species === 'cat' ? 'Kucing' : ($pet->species=== 'dog' ? 'Anjing' : $pet->species) }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Ras</label>
                                    <div class=" h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->breed}}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Jenis Kelamin</label>
                                    <div class=" h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $pet->gender === 'male' ? 'Jantan' : ($pet->gender=== 'female' ? 'Betina' : $pet->gender) }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Umur</label>
                                    <div class=" h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->age}}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Warna</label>
                                    <div class=" h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->color}}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Deskripsi</label>
                                    <div class=" border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->description}}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Perilaku</label>
                                    <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{$pet->behavior}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="border border-gray-200 rounded-lg p-4 flex flex-col gap-3">
                                <div>
                                    <label class="block text-sm font-medium">Vaksinasi</label>
                                    <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">
                                        {{ $pet->vaccination_status === 'yes' ? 'Iya' : ($pet->vaccination_status === 'no' ? 'Tidak' : $pet->vaccination_status) }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Terlatih</label>
                                    <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $pet->trained_status === 'yes' ? 'Iya' : ($pet->trained_status === 'no' ? 'Tidak' : $pet->trained_status) }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Baik dengan Hewan Lain</label>
                                    <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $pet->good_with_animals === 'yes' ? 'Iya' : ($pet->good_with_animals=== 'no' ? 'Tidak' : $pet->good_with_animals) }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Baik dengan Anak-anak</label>
                                    <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $pet->good_with_kids === 'yes' ? 'Iya' : ($pet->good_with_kids=== 'no' ? 'Tidak' : $pet->good_with_kids) }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Steril</label>
                                    <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $pet->steril_status === 'yes' ? 'Iya' : ($pet->steril_status=== 'no' ? 'Tidak' : $pet->steril_status) }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Kebutuhan Khusus</label>
                                    <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $pet->special_needs === 'yes' ? 'Iya' : ($pet->special_needs=== 'no' ? 'Tidak' : $pet->special_needs) }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Status Problematic</label>
                                    <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $pet->problematic_status === 'yes' ? 'Iya' : ($pet->problematic_status=== 'no' ? 'Tidak' : $pet->problematic_status) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
