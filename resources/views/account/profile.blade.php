@push('scripts')
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush

<div x-data="{ editing: false }" class="space-y-6">
    {{-- RINGKASAN PROFIL --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <img src="{{ auth()->user()->picture_profile ? asset('storage/' . auth()->user()->picture_profile) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                     alt="Foto Profil" class="w-20 h-20 object-cover rounded-full">

                <div>
                    <h2 class="text-xl font-bold">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-500">@ {{ auth()->user()->address ?? 'Belum diisi' }}</p>
                </div>
            </div>

            <button @click="editing = !editing"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                <span x-show="!editing">Edit Profile</span>
                <span x-show="editing">Tutup</span>
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6 text-gray-700">
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Telepon:</strong> {{ auth()->user()->phone ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ auth()->user()->address ?? '-' }}</p>
        </div>
    </div>

    {{-- FORM EDIT (ditampilkan jika editing=true) --}}
    <div x-show="editing" x-transition class="bg-white rounded-xl shadow p-6 border border-purple-200">
        <h3 class="text-lg font-bold mb-4 text-indigo-700">Form Edit Profil</h3>

        <form action="{{ route('account.updateProfile') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 font-medium">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                           class="w-full p-3 border rounded" required>
                </div>

                <div>
                    <label class="block text-gray-600 font-medium">No. Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                           class="w-full p-3 border rounded">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-gray-600 font-medium">Alamat</label>
                    <textarea name="address" rows="3" class="w-full p-3 border rounded">{{ old('address', auth()->user()->address) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-gray-600 font-medium">Foto Profil</label>
                    <input type="file" name="picture_profile" accept="image/*" class="w-full p-3 border rounded">
                </div>
            </div>

            <div>
                <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- RIWAYAT PENCARIAN --}}
    <div class="mt-8">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Riwayat Pencarian</h3>

        @forelse ($searchHistories as $item)
            <div class="flex items-center justify-between bg-white px-4 py-3 rounded-xl shadow mb-3 hover:bg-gray-100 transition group">
                <div class="flex flex-wrap gap-x-4 text-sm text-gray-700">
                    <span><strong>Jenis:</strong> {{ ucfirst($item->species) }}</span>
                    <span><strong>Ukuran:</strong> {{ ucfirst($item->size ?? '-') }}</span>
                    <span><strong>Umur:</strong> {{ $item->estimated_minimum_age }} - {{ $item->estimated_maximum_age }} th</span>
                    <span><strong>Gender:</strong> {{ ucfirst($item->gender) }}</span>
                    <span><strong>Warna:</strong> {{ $item->color }}</span>
                    <span><strong>Lokasi:</strong> {{ $item->location }}</span>
                    <span><strong>Breed:</strong> {{ $item->breed }}</span>
                </div>

                <form action="{{ route('searchHistory.destroy', $item->id) }}" method="POST" class="ml-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-red-500 hover:text-red-700 transition text-sm font-semibold">
                        ✕
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-600">Belum ada riwayat pencarian.</p>
        @endforelse
    </div>
</div>