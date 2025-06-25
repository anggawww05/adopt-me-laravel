<x-layout title="Detail Adopsi Kucing - Adopt Me!">
    <div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">
        <div class="mx-9 w-screen flex grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Filter Sidebar -->
            <div class="bg-white rounded-xl p-8">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-[16px] text-purple-500 font-semibold cursor-pointer">Filter Adopsi</h1>
                </div>
                <div class="mb-3">
                    <select class="w-full border rounded-lg px-3 py-2 text-sm">
                        <option>Jenis</option>
                        <option>Kucing</option>
                        <option>Anjing</option>
                    </select>
                </div>
                <div class="mb-3">
                    {{-- <label class="block text-xs font-semibold mb-1">Lokasi</label> --}}
                    <input type="text" class="w-full border rounded-lg px-3 py-2 text-sm" placeholder="Cty/Zip">
                    <input type="text" class="w-full border rounded-lg px-3 py-2 text-sm mt-2" placeholder="Jl. Bombardir/Crocodile No.1">
                </div>
                <div class="mb-3">
                    <select class="w-full border rounded-lg px-3 py-2 text-sm">
                        <option>Ukuran</option>
                        <option>Kecil</option>
                        <option>Sedang</option>
                        <option>Besar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="w-full border rounded-lg px-3 py-2 text-sm">
                        <option>Gender</option>
                        <option>Jantan</option>
                        <option>Betina</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="w-full border rounded-lg px-3 py-2 text-sm">
                        <option>Umur</option>
                        <option>&lt; 1 Tahun</option>
                        <option>1-3 Tahun</option>
                        <option>&gt; 3 Tahun</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="w-full border rounded-lg px-3 py-2 text-sm">
                        <option>Keturunan</option>
                        <option>Persia</option>
                        <option>Anggora</option>
                        <option>Kampung</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="w-full border rounded-lg px-3 py-2 text-sm">
                        <option>Warna</option>
                        <option>Oren</option>
                        <option>Hitam</option>
                        <option>Putih</option>
                    </select>
                </div>
                <button class="w-full bg-purple-100 text-purple-500 font-semibold py-2 rounded-lg mt-2 hover:bg-purple-200 transition">Terapkan Filter</button>
            </div>
            <!-- Pet Cards -->
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://images.unsplash.com/photo-1518717758536-85ae29035b6d?auto=format&fit=crop&w=400&q=80" alt="Cat" class="h-40 w-full object-cover">
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="font-bold text-lg mb-1">Tukang Gigit Sendal</div>
                        <div class="text-xs text-gray-500 mb-2">Bali, Tuban</div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Gender:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Jantan</span>
                            <span class="font-semibold text-xs ml-2">Breed:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Kalko</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Umur:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">2 Tahun</span>
                            <span class="font-semibold text-xs ml-2">Ukuran:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Kecil</span>
                        </div>
                        <div class="text-xs text-gray-600 mb-4 flex-1">
                            Tukang Gigit Sendal aktif dan penasaran, cocok dengan keluarga yang suka bermain dan penuh kasih sayang.
                        </div>
                        <a href="#" class="block text-center border border-purple-300 text-purple-500 rounded-lg py-2 text-sm font-semibold hover:bg-purple-50 transition">More Info...</a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://images.unsplash.com/photo-1558788353-f76d92427f16?auto=format&fit=crop&w=400&q=80" alt="Dog" class="h-40 w-full object-cover">
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="font-bold text-lg mb-1">Browny</div>
                        <div class="text-xs text-gray-500 mb-2">Bali, Denpasar</div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Gender:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Betina</span>
                            <span class="font-semibold text-xs ml-2">Breed:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Sheped</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Umur:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">3 Tahun</span>
                            <span class="font-semibold text-xs ml-2">Ukuran:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Besar</span>
                        </div>
                        <div class="text-xs text-gray-600 mb-4 flex-1">
                            Browny ramah dengan anak-anak dan suka bermain di luar ruangan, sangat cocok jadi teman bermain yang setia.
                        </div>
                        <a href="#" class="block text-center border border-purple-300 text-purple-500 rounded-lg py-2 text-sm font-semibold hover:bg-purple-50 transition">More Info...</a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://images.unsplash.com/photo-1518715308788-3005759c61d3?auto=format&fit=crop&w=400&q=80" alt="Cat" class="h-40 w-full object-cover">
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="font-bold text-lg mb-1">Penyihir Oren</div>
                        <div class="text-xs text-gray-500 mb-2">Bali, Tuban</div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Gender:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Jantan</span>
                            <span class="font-semibold text-xs ml-2">Breed:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Kalko</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Umur:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">1 Tahun</span>
                            <span class="font-semibold text-xs ml-2">Ukuran:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Kecil</span>
                        </div>
                        <div class="text-xs text-gray-600 mb-4 flex-1">
                            Penyihir Oren suka tidur di sofa dan menghibur keluarga dengan tingkah lucu menggemaskan.
                        </div>
                        <a href="#" class="block text-center border border-purple-300 text-purple-500 rounded-lg py-2 text-sm font-semibold hover:bg-purple-50 transition">More Info...</a>
                    </div>
                </div>
                <!-- Card 4 (repeat for demo) -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://images.unsplash.com/photo-1518717758536-85ae29035b6d?auto=format&fit=crop&w=400&q=80" alt="Cat" class="h-40 w-full object-cover">
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="font-bold text-lg mb-1">Tukang Gigit Sendal</div>
                        <div class="text-xs text-gray-500 mb-2">Bali, Tuban</div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Gender:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Jantan</span>
                            <span class="font-semibold text-xs ml-2">Breed:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Kalko</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Umur:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">2 Tahun</span>
                            <span class="font-semibold text-xs ml-2">Ukuran:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Kecil</span>
                        </div>
                        <div class="text-xs text-gray-600 mb-4 flex-1">
                            Tukang Gigit Sendal aktif dan penasaran, cocok dengan keluarga yang suka bermain dan penuh kasih sayang.
                        </div>
                        <a href="#" class="block text-center border border-purple-300 text-purple-500 rounded-lg py-2 text-sm font-semibold hover:bg-purple-50 transition">More Info...</a>
                    </div>
                </div>
                <!-- Card 5 (repeat for demo) -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://images.unsplash.com/photo-1558788353-f76d92427f16?auto=format&fit=crop&w=400&q=80" alt="Dog" class="h-40 w-full object-cover">
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="font-bold text-lg mb-1">Browny</div>
                        <div class="text-xs text-gray-500 mb-2">Bali, Denpasar</div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Gender:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Betina</span>
                            <span class="font-semibold text-xs ml-2">Breed:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Sheped</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Umur:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">3 Tahun</span>
                            <span class="font-semibold text-xs ml-2">Ukuran:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Besar</span>
                        </div>
                        <div class="text-xs text-gray-600 mb-4 flex-1">
                            Browny ramah dengan anak-anak dan suka bermain di luar ruangan, sangat cocok jadi teman bermain yang setia.
                        </div>
                        <a href="#" class="block text-center border border-purple-300 text-purple-500 rounded-lg py-2 text-sm font-semibold hover:bg-purple-50 transition">More Info...</a>
                    </div>
                </div>
                <!-- Card 6 (repeat for demo) -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://images.unsplash.com/photo-1518715308788-3005759c61d3?auto=format&fit=crop&w=400&q=80" alt="Cat" class="h-40 w-full object-cover">
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="font-bold text-lg mb-1">Penyihir Oren</div>
                        <div class="text-xs text-gray-500 mb-2">Bali, Tuban</div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Gender:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Jantan</span>
                            <span class="font-semibold text-xs ml-2">Breed:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Kalko</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold text-xs">Umur:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">1 Tahun</span>
                            <span class="font-semibold text-xs ml-2">Ukuran:</span>
                            <span class="inline-block bg-purple-100 text-purple-500 rounded px-2 py-0.5 text-xs ml-1">Kecil</span>
                        </div>
                        <div class="text-xs text-gray-600 mb-4 flex-1">
                            Penyihir Oren suka tidur di sofa dan menghibur keluarga dengan tingkah lucu menggemaskan.
                        </div>
                        <a href="#" class="block text-center border border-purple-300 text-purple-500 rounded-lg py-2 text-sm font-semibold hover:bg-purple-50 transition">More Info...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
