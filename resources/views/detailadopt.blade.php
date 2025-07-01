<x-layout :title="'Detail Adopsi: ' . $pet->name">
    <div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">
        <div class="bg-white shadow-lg w-full max-w-6xl rounded-2xl p-8">
            
            <h1 class="text-2xl font-bold text-gray-800">Halo Majikan!</h1>
            <div class="flex gap-4 mt-4">
                <div>
                    {{-- This now correctly shows the pet's picture --}}
                    <img src="{{ asset($pet->piture) }}" alt="{{ $pet->name }}" class="w-12 h-12 rounded-full shadow-md object-cover" onerror="this.onerror=null;this.src='{{ asset('images/default_profile.png') }}';">
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-semibold">{{ $pet->name }}</p>
                    <p class="font-medium text-sm text-gray-500">Pet ID {{ $pet->id }}</p>
                </div>
            </div>
            <div class="mt-2">
                <p class="text-gray-500 text-sm">{{ $pet->city }}</p>
                <p class="text-gray-500 text-sm">{{ $pet->address }}</p>
            </div>

            <div class="flex flex-col md:flex-row gap-8 mt-6">
                <div class="w-full md:w-2/3">
                    <div>
                        {{-- Main Image --}}
                        <img src="{{ asset($pet->piture) }}" alt="{{ $pet->name }}" class="w-full h-96 rounded-lg shadow-md object-cover" onerror="this.onerror=null;this.src='https://placehold.co/800x600/E2E8F0/94A3B8?text=Gambar+Tidak+Tersedia';">
                    </div>
                    {{-- Thumbnails --}}
                    <div class="flex gap-3 mt-4">
                        {{-- NOTE: These all use the same image because the database only has one picture field. --}}
                        <img src="{{ asset($pet->piture) }}" alt="Thumbnail 1" class="w-1/4 h-32 rounded-lg shadow-md object-cover">
                        <img src="{{ asset($pet->piture) }}" alt="Thumbnail 2" class="w-1/4 h-32 rounded-lg shadow-md object-cover">
                        <img src="{{ asset($pet->piture) }}" alt="Thumbnail 3" class="w-1/4 h-32 rounded-lg shadow-md object-cover">
                        <img src="{{ asset($pet->piture) }}" alt="Thumbnail 4" class="w-1/4 h-32 rounded-lg shadow-md object-cover">
                    </div>
                </div>

                <div class="w-full md:w-1/3 flex flex-col gap-6">
                    <div class="bg-gray-50 border border-gray-200 shadow-sm rounded-lg p-4">
                        <h2 class="text-lg font-semibold border-b pb-2">Deskripsi</h2>
                        <p class="text-justify my-4 text-gray-700">{{ $pet->description }}</p>
                    </div>
                    <div class="flex flex-col gap-2 pl-4">
                        @if($pet->good_with_kids == 'yes')
                        <p class="flex items-center gap-2 font-medium text-gray-700"><svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Bisa tinggal dengan anak</p>
                        @endif
                        @if($pet->vaccination_status == 'yes')
                        <p class="flex items-center gap-2 font-medium text-gray-700"><svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Divaksin</p>
                        @endif
                        @if($pet->trained_status == 'yes')
                        <p class="flex items-center gap-2 font-medium text-gray-700"><svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Terlatih</p>
                        @endif
                        @if($pet->steril_status == 'yes')
                        <p class="flex items-center gap-2 font-medium text-gray-700"><svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Steril</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-col md:flex-row gap-8 items-center">
                <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
                    <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl shadow-sm w-28"><div class="text-xs text-gray-500">Gender</div><div class="text-sm font-semibold text-purple-600">{{ ucfirst($pet->gender) }}</div></div>
                    <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl shadow-sm w-28"><div class="text-xs text-gray-500">Breed</div><div class="text-sm font-semibold text-purple-600">{{ $pet->breed }}</div></div>
                    <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl shadow-sm w-28"><div class="text-xs text-gray-500">Umur</div><div class="text-sm font-semibold text-purple-600">{{ $pet->age }} bulan</div></div>
                    <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl shadow-sm w-28"><div class="text-xs text-gray-500">Warna</div><div class="text-sm font-semibold text-purple-600">{{ $pet->color }}</div></div>
                    {{-- Note: Weight and Height are not in the database, using placeholders. --}}
                    <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl shadow-sm w-28"><div class="text-xs text-gray-500">Berat</div><div class="text-sm font-semibold text-purple-600">-</div></div>
                    <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl shadow-sm w-28"><div class="text-xs text-gray-500">Tinggi</div><div class="text-sm font-semibold text-purple-600">-</div></div>
                </div>
                <div class="flex-1 flex justify-end">
                    <div class="border rounded-xl p-6 bg-white shadow-md flex flex-col items-center justify-center w-full md:w-96">
                        <p class="text-gray-700 mb-4 text-center">Apakah anda tertarik untuk adopsi?</p>
                        <a href="{{ route('adoption.form', $pet) }}" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-8 rounded-lg shadow transition duration-200">
                            Adopsi Sekarang!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>