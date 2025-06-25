<x-layout title="Detail Adopsi Kucing - Adopt Me!">
    <div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">
        <div class="bg-white shadow-lg w-[1300px] h-full rounded-2xl p-8">
            <h1 class="text-2xl font-bold text-gray-800">Halo Majikan!</h1>
            <div class="flex gap-2 mt-4">
                <div>
                    <img src="{{ asset('images/main_bg.png') }}" alt="" class="w-10 h-10 rounded-full shadow-md">
                </div>
                <div>
                    <p class="text-gray-500 text-[12px]">Penyihir Oren</p>
                    <p class="font-semibold text-[12px]">Pet id 08292829</p>
                </div>
            </div>
            <div class="mt-2">
                <p class="text-gray-500 text-[12px]">Jawa Barat</p>
                <p class="text-gray-500 text-[12px]">Jalan tung tung sahur no x</p>
            </div>
            <div class="flex gap-4 mt-4">
                <div>
                    <div>
                        <img src="{{ asset('images/main_bg.png') }}" alt=""
                            class="w-[800px] h-[400px] rounded-lg shadow-md">
                    </div>
                    <div class="flex gap-3 mt-4">
                        <img src="{{ asset('images/main_bg.png') }}" alt=""
                            class="w-[190px] h-[120px] rounded-lg shadow-md">
                        <img src="{{ asset('images/main_bg.png') }}" alt=""
                            class="w-[190px] h-[120px] rounded-lg shadow-md">
                        <img src="{{ asset('images/main_bg.png') }}" alt=""
                            class="w-[190px] h-[120px] rounded-lg shadow-md">
                        <img src="{{ asset('images/main_bg.png') }}" alt=""
                            class="w-[190px] h-[120px] rounded-lg shadow-md">
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="bg-[#F6F6F6] border border-gray-200 shadow-md rounded-lg p-4 w-[380px]">
                        <h1 class="mt-4">Deskripsi</h1>
                        <p class="text-justify my-4">Halo, namaku Penyihir Oren. Aku lahir di gang kecil yang sempit dan
                            dingin, tapi nasib baik membawaku ke tangan manusia baik yang menyelamatkanku saat aku masih
                            kecil dan lemah. Mereka merawatku, memberiku....</p>
                    </div>
                    <div class="ml-4 flex flex-col gap-2">
                        <h1 class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                                    fill="#A7F3D0" />
                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M9 12l2 2 4-4" />
                            </svg>
                            Bisa tinggal dengan anak
                        </h1>
                        <h1 class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                                    fill="#A7F3D0" />
                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M9 12l2 2 4-4" />
                            </svg>
                            Divaksin
                        </h1>
                        <h1 class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                                    fill="#A7F3D0" />
                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M9 12l2 2 4-4" />
                            </svg>
                            Terlatih
                        </h1>
                        <h1 class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                                    fill="#A7F3D0" />
                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M9 12l2 2 4-4" />
                            </svg>
                            Steril
                        </h1>
                        <h1 class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                                    fill="#A7F3D0" />
                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M9 12l2 2 4-4" />
                            </svg>
                            Foto terbaru
                        </h1>

                    </div>
                </div>
            </div>
            <div class="mt-4 flex">
                <div class="flex gap-4 bg-white">
                    <!-- Item -->
                    <div class="flex flex-col items-center w-24 p-3 bg-gray-50 rounded-xl shadow-sm">
                        <div class="text-pink-400 text-2xl mb-1">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="text-xs text-gray-500">Gender</div>
                        <div class="text-sm font-semibold text-pink-500">Jantan</div>
                    </div>

                    <div class="flex flex-col items-center w-24 p-3 bg-gray-50 rounded-xl shadow-sm">
                        <div class="text-pink-400 text-2xl mb-1">
                            <i class="fas fa-paw"></i>
                        </div>
                        <div class="text-xs text-gray-500">Breed</div>
                        <div class="text-sm font-semibold text-pink-500">Calico</div>
                    </div>

                    <div class="flex flex-col items-center w-24 p-3 bg-gray-50 rounded-xl shadow-sm">
                        <div class="text-pink-400 text-2xl mb-1">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="text-xs text-gray-500">Umur</div>
                        <div class="text-sm font-semibold text-pink-500">1 Tahun</div>
                    </div>

                    <div class="flex flex-col items-center w-24 p-3 bg-gray-50 rounded-xl shadow-sm">
                        <div class="text-pink-400 text-2xl mb-1">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="text-xs text-gray-500">Warna</div>
                        <div class="text-sm font-semibold text-pink-500">Oranye</div>
                    </div>

                    <div class="flex flex-col items-center w-24 p-3 bg-gray-50 rounded-xl shadow-sm">
                        <div class="text-pink-400 text-2xl mb-1">
                            <i class="fas fa-weight"></i>
                        </div>
                        <div class="text-xs text-gray-500">Berat</div>
                        <div class="text-sm font-semibold text-pink-500">3 kg</div>
                    </div>

                    <div class="flex flex-col items-center w-24 p-3 bg-gray-50 rounded-xl shadow-sm">
                        <div class="text-pink-400 text-2xl mb-1">
                            <i class="fas fa-ruler-vertical"></i>
                        </div>
                        <div class="text-xs text-gray-500">Tinggi</div>
                        <div class="text-sm font-semibold text-pink-500">45 cm</div>
                    </div>
                </div>
                <div class="flex-1 flex justify-end">
                    <div class="border-1 border-indigo-300 rounded-xl p-2 bg-white shadow-md flex flex-col items-center justify-center w-[400px]">
                        <p class="text-gray-700 mb-4 text-center">Apakah anda tertarik untuk adopsi?</p>
                        <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
                            Adopsi Sekarang!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
