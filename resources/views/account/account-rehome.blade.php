@push('scripts')
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush

@php
    $pets = $pets ?? collect();
@endphp

@if (!request()->has('pet_id'))
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Hewan yang Anda Rehome</h1>
        <a href="{{ route('rehomer.form') }}"
           class="border border-[#5E225E] bg-[#5E225E] text-white hover:bg-white hover:text-[#5E225E] px-4 py-2 rounded shadow text-sm">
            + Tambah Hewan
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($pets as $pet)
            <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col transform hover:-translate-y-1 transition-transform duration-300">
                <img src="{{ asset('storage/' . $pet->picture1) }}" alt="{{ $pet->name }}"
                     class="h-40 w-full object-cover"
                     onerror="this.onerror=null;this.src='https://placehold.co/400x300/E2E8F0/94A3B8?text=Gambar+Tidak+Tersedia';">

                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg mb-1">{{ $pet->name }}</div>
                    <div class="text-xs text-gray-500 mb-2">{{ $pet->city }}</div>

                    <div class="mb-2">
                        <span class="font-semibold text-xs">Gender:</span>
                        <span class="inline-block bg-[#FDC8FD] text-[#5E225E] rounded px-2 py-0.5 text-xs ml-1">
                            {{ ucfirst($pet->gender) }}
                        </span>
                        <span class="font-semibold text-xs ml-2">Breed:</span>
                        <span class="inline-block bg-[#FDC8FD] text-[#5E225E] rounded px-2 py-0.5 text-xs ml-1">
                            {{ $pet->breed }}
                        </span>
                    </div>

                    <div class="mb-2">
                        <span class="font-semibold text-xs">Umur:</span>
                        <span class="inline-block bg-[#FDC8FD] text-[#5E225E] rounded px-2 py-0.5 text-xs ml-1">
                            {{ $pet->age }} Tahun
                        </span>
                        <span class="font-semibold text-xs ml-2">Ukuran:</span>
                        <span class="inline-block bg-[#FDC8FD] text-[#5E225E] rounded px-2 py-0.5 text-xs ml-1">
                            {{ ucfirst($pet->size) }}
                        </span>
                    </div>

                    <div class="text-xs text-gray-600 mb-4 flex-1">
                        {{ Str::limit($pet->description, 100) }}
                    </div>

                    <a href="{{ route('account', ['tab' => 'rehome-detail', 'pet_id' => $pet->id]) }}"
                       class="block text-center border border-[#D678D6] text-[#D678D6] rounded-lg py-2 text-sm font-semibold hover:bg-purple-50 transition">
                        More Info...
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada hewan yang Anda daftarkan untuk rehome.</p>
        @endforelse
    </div>
@else
    @includeIf('account.rehome-detail', [
        'selectedPet' => $selectedPet,
        'adoptionRequests' => $adoptionRequests,
    ])
@endif
