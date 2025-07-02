<x-layout title="Adopsi Hewan - Adopt Me!">
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-4">
            
            <!-- Filter Sidebar -->
            <div class="md:col-span-1 bg-white rounded-xl shadow-sm p-6 h-fit">
                <h2 class="text-lg text-purple-600 font-semibold mb-4">Filter Adopsi</h2>
                
                <form action="{{ route('adopt.post') }}" method="GET">
                    <!-- Filter by Species -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis</label>
                        <select name="species" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">
                            <option value="">Semua Jenis</option>
                            <option value="dog" {{ request('species') == 'dog' ? 'selected' : '' }}>Anjing</option>
                            <option value="cat" {{ request('species') == 'cat' ? 'selected' : '' }}>Kucing</option>
                        </select>
                    </div>

                    <!-- Filter by Location -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                        <input type="text" name="city" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500" placeholder="Contoh: Denpasar" value="{{ request('city') }}">
                    </div>

                    <!-- Filter by Gender -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select name="gender" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">
                            <option value="">Semua Gender</option>
                            <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Jantan</option>
                            <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Betina</option>
                        </select>
                    </div>

                    <!-- Filter by Age -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Umur</label>
                        <select name="age" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">
                            <option value="">Semua Umur</option>
                            <option value="lt1" {{ request('age') == 'lt1' ? 'selected' : '' }}>< 1 Tahun</option>
                            <option value="1to3" {{ request('age') == '1to3' ? 'selected' : '' }}>1-3 Tahun</option>
                            <option value="gt3" {{ request('age') == 'gt3' ? 'selected' : '' }}>> 3 Tahun</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-purple-600 text-white font-semibold py-2 rounded-lg mt-2 hover:bg-purple-700 transition">Terapkan Filter</button>
                    <a href="{{ route('adopt.post') }}" class="w-full block text-center text-gray-600 mt-2 text-sm hover:underline">Hapus Filter</a>
                </form>
            </div>

            <!-- Pet Cards -->
            <div class="md:col-span-3">
                @if($pets->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($pets as $pet)
                        <div class="group bg-white rounded-xl shadow-md overflow-hidden flex flex-col relative transform hover:-translate-y-1 transition-transform duration-300">
                            
                            <img src="{{ asset('storage/' . $pet->picture1) }}" alt="{{ $pet->name }}" class="h-48 w-full object-cover" onerror="this.onerror=null;this.src='https://placehold.co/400x300/E2E8F0/94A3B8?text=Gambar+Tidak+Tersedia';">
                            
                            <div class="p-4 flex-1 flex flex-col">
                                <h3 class="font-bold text-lg mb-1 text-gray-800">{{ $pet->name }}</h3>
                                <div class="text-xs text-gray-500 mb-2">{{ $pet->city }}</div>
                                <div class="mb-3">
                                    <span class="inline-block bg-purple-100 text-purple-600 rounded-full px-3 py-1 text-xs font-semibold mr-2">{{ ucfirst($pet->gender) }}</span>
                                    <span class="inline-block bg-purple-100 text-purple-600 rounded-full px-3 py-1 text-xs font-semibold">{{ $pet->breed }}</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-4 flex-1">
                                    {{ Str::limit($pet->description, 100) }}
                                </p>

                                <a href="{{ route('adopt.detail', $pet) }}" class="text-center font-semibold text-purple-600 group-hover:text-purple-800 transition mt-auto border border-purple-600 hover:bg-purple-600 hover:text-white rounded-2xl px-3 py-3 relative inline-block">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    More Info...
                                </a>
                            </div>

                        </div>
                    @endforeach
                    </div>
                    <!-- Pagination Links -->
                    <div class="mt-8">
                        {{ $pets->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-xl shadow-md p-8 text-center">
                        <h3 class="text-xl font-semibold text-gray-700">Tidak Ada Hasil</h3>
                        <p class="text-gray-500 mt-2">Maaf, tidak ada hewan peliharaan yang cocok dengan kriteria pencarian Anda.</p>
                        <a href="{{ route('adopt.post') }}" class="inline-block mt-4 bg-purple-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-purple-700 transition">Lihat Semua Hewan</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>