@push('scripts')
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush

@php
    $selectedPet = $selectedPet ?? null;
    $adoptionRequests = $adoptionRequests ?? collect();
@endphp

@if ($selectedPet)
<div x-data="{ openModal: false, selectedAdoption: {} }">
    {{-- Header Detail Pet --}}
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <h2 class="text-xl font-bold mb-4">Kepada {{ auth()->user()->name }}</h2>
        <p class="text-gray-700 mb-2">
            Anda menerima beberapa permintaan adopsi untuk mengadopsi <strong>{{ $selectedPet->name }}</strong>.
        </p>

        <div class="flex items-center gap-4 p-4 border rounded bg-purple-50">
            <img src="{{ asset('storage/' . $selectedPet->picture1) }}"
                 alt="{{ $selectedPet->name }}"
                 class="w-20 h-20 object-cover rounded-md"
                 onerror="this.onerror=null;this.src='https://placehold.co/100x100?text=No+Image';">
            <div>
                <p><strong>Pet ID:</strong> {{ $selectedPet->id }}</p>
                <p><strong>Breed:</strong> {{ $selectedPet->breed }}</p>
                <p><strong>Gender:</strong> {{ ucfirst($selectedPet->gender) }}</p>
                <p><strong>Umur:</strong> {{ $selectedPet->age }} Tahun</p>
            </div>
        </div>
    </div>

    {{-- Tabel Permintaan Adopsi --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-bold mb-4">Permintaan Adopsi untuk {{ $selectedPet->name }}</h3>

        <table class="w-full text-left table-auto">
            <thead>
                <tr class="bg-gray-100 text-sm text-gray-700">
                    <th class="p-3">Nama Adopter</th>
                    <th class="p-3">Lokasi</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Review</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($adoptionRequests as $request)
                    <tr class="border-t">
                        <td class="p-3 flex items-center gap-2">
                            <img src="{{ asset('storage/' . ($request->user->picture_profile ?? 'default.jpg')) }}"
                                 class="w-8 h-8 rounded-full object-cover"
                                 onerror="this.onerror=null;this.src='https://placehold.co/32x32?text=U';">
                            {{ $request->user->name }}
                        </td>
                        <td class="p-3">{{ $request->city ?? '-' }}</td>
                        <td class="p-3">{{ $request->created_at->format('d M Y') }}</td>
                        <td class="p-3">
                            <button
                                @click='selectedAdoption = @json($request); openModal = true'
                                class="text-blue-600 hover:underline text-sm">
                                    Lihat
                            </button>
                        </td>
                        <td class="p-3">
                            @if ($request->status === 'pending')
                                <div class="flex gap-2">
                                    <form method="POST" action="{{ route('adoption.accept', $request->id) }}">
                                        @csrf @method('PUT')
                                        <button type="submit"
                                            class="bg-purple-100 text-purple-700 px-3 py-1 text-xs rounded hover:bg-purple-200">
                                            Terima
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('adoption.reject', $request->id) }}">
                                        @csrf @method('PUT')
                                        <button type="submit"
                                            class="bg-gray-100 text-gray-700 px-3 py-1 text-xs rounded hover:bg-gray-200">
                                            Tolak
                                        </button>
                                    </form>
                                </div>
                            @elseif ($request->status === 'accepted')
                                <span class="bg-green-100 text-green-700 px-3 py-1 text-xs rounded">Diterima</span>
                            @elseif ($request->status === 'rejected')
                                <span class="bg-red-100 text-red-700 px-3 py-1 text-xs rounded">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 p-4">Belum ada permintaan adopsi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <div
        x-show="openModal"
        x-transition
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-xl w-full max-w-3xl shadow-lg relative max-h-[85vh] overflow-y-auto">
            <button @click="openModal = false" class="absolute top-2 right-3 text-gray-500 text-xl">&times;</button>

            <h2 class="text-2xl font-bold mb-4 text-purple-700">Formulir Permintaan Adopsi</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-800">
                <div>
                    <label class="font-semibold text-gray-600">Nama</label>
                    <p x-text="selectedAdoption.name ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Email</label>
                    <p x-text="selectedAdoption.user.email ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Kota</label>
                    <p x-text="selectedAdoption.city ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Kode Pos</label>
                    <p x-text="selectedAdoption.post_code ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">No. HP</label>
                    <p x-text="selectedAdoption.phone ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Telepon Rumah</label>
                    <p x-text="selectedAdoption.home_phone ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Punya Halaman?</label>
                    <p x-text="selectedAdoption.have_yard ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Situasi Lingkungan</label>
                    <p x-text="selectedAdoption.environment_situation ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Tipe Rumah</label>
                    <p x-text="selectedAdoption.house_type ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Aktivitas Rumah</label>
                    <p x-text="selectedAdoption.home_activity ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Alergi terhadap Hewan?</label>
                    <p x-text="selectedAdoption.have_alergy ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Jumlah Anggota Keluarga</label>
                    <p x-text="selectedAdoption.family_members ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Usia Termuda</label>
                    <p x-text="selectedAdoption.youngest_age ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Pernah Dikunjungi Anak?</label>
                    <p x-text="selectedAdoption.kids_visited ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Usia Anak yang Berkunjung</label>
                    <p x-text="selectedAdoption.visited_age ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Punya Teman Sekamar?</label>
                    <p x-text="selectedAdoption.have_roommate ?? '-'"></p>
                </div>
                <div>
                    <label class="font-semibold text-gray-600">Punya Hewan Lain?</label>
                    <p x-text="selectedAdoption.have_other_pets ?? '-'"></p>
                </div>
                <div class="md:col-span-2">
                    <label class="font-semibold text-gray-600">Deskripsi Hewan Lain</label>
                    <p x-text="selectedAdoption.describe_other_pets ?? '-'"></p>
                </div>
                <div class="md:col-span-2">
                    <label class="font-semibold text-gray-600">Pengalaman Memelihara Hewan</label>
                    <p x-text="selectedAdoption.experience ?? '-'"></p>
                </div>
                <div class="md:col-span-2">
                    <label class="font-semibold text-gray-600">Foto Rumah</label>
                    <div class="flex flex-wrap gap-2 mt-1">
                        <template x-for="i in [1, 2, 3, 4]">
                            <img :src="selectedAdoption[`home_photo_${i}`] ? '/storage/' + selectedAdoption[`home_photo_${i}`] : 'https://placehold.co/100x100?text=No+Image'"
                                class="w-24 h-24 object-cover rounded border"
                                alt="Foto Rumah">
                        </template>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-right">
                <button @click="openModal = false"
                    class="bg-gray-200 hover:bg-gray-300 text-sm px-4 py-2 rounded">
                    Tutup
                </button>
            </div>
        </div>
    </div>

@else
    <p class="text-gray-600">Hewan tidak ditemukan atau bukan milik Anda.</p>
@endif