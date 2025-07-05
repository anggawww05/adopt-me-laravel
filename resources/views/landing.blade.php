<x-layout title="Selamat Datang di Adopt Me!">
    @vite('resources/css/app.css')
    <div class="relative w-full">

        <img src="{{ asset('images/main_bg.png') }}" alt="Background" class="w-full h-auto" />

        <div class="absolute inset-0 flex items-center justify-start px-20">
            <div class="max-w-xl text-white">
                <h1 class="text-4xl md:text-5xl font-['Montserrat'] leading-tight drop-shadow-lg">
                    Satu pelukan<br><span class="text-white">selamatkan hidup.</span>
                </h1>
                <h1 class="text-4xl md:text-7xl font-['Baloo_Bhai_2'] font-bold my-4 text-[#5E225E] drop-shadow-lg">
                    Adopt <span class="text-[#D678D6]">Me!</span>
                </h1>

                <p class="text-sm md:text-base text-white font-['Montserrat'] font-light drop-shadow-md">
                    Adopt Me! adalah platform adopsi hewan yang
                    <br>menghubungkan hewan-hewan terlantar dengan
                    <br>calon pemilik penuh kasih. Melalui website ini,
                    <br>kamu bisa melihat profil hewan, membaca kisah 
                    <br>mereka, dan memberikan mereka rumah baru 
                    <br>yang hangat dan aman.
                </p>

                <div class="mt-6 flex gap-4">
                    <a href="/adopt/post-adopt">
                        <button class="bg-[#D678D6] text-white font-['Montserrat'] px-12 py-4 rounded-lg hover:bg-[#5E225E] transition">
                            Adopt Sekarang
                        </button>
                    </a>
                    <a href="/rehomer/formulir">
                        <button class="border border-[#D678D6] text-[#D678D6] font-['Montserrat'] px-12 py-4 rounded-md hover:bg-purple-100 transition">
                            Rehome Sekarang
                        </button>
                    </a>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <section class="py-8 px-20 bg-white">
        <h1 class="text-center text-2xl md:text-3xl font-semibold mt-4 mb-10">Lihatlah Beberapa Hewan Peliharaan Kami</h1>

        <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($pets as $pet)
            <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col transform hover:-translate-y-1 transition-transform duration-300">
                <img src="{{ asset('storage/' . $pet->picture1) }}" alt="{{ $pet->name }}" class="h-40 w-full object-cover" onerror="this.onerror=null;this.src='https://placehold.co/400x300/E2E8F0/94A3B8?text=Gambar+Tidak+Tersedia';">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg mb-1">{{ $pet->name }}</div>
                    <div class="text-xs text-gray-500 mb-2">{{ $pet->city }}</div>
                    <div class="mb-2">
                        <span class="font-semibold text-xs">Gender:</span>
                        <span class="inline-block bg-[#FDC8FD] text-[#5E225E] rounded px-2 py-0.5 text-xs ml-1">{{ $pet->gender }}</span>
                        <span class="font-semibold text-xs ml-2">Breed:</span>
                        <span class="inline-block bg-[#FDC8FD] text-[#5E225E] rounded px-2 py-0.5 text-xs ml-1">{{ $pet->breed }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-semibold text-xs">Umur:</span>
                        <span class="inline-block bg-[#FDC8FD] text-[#5E225E] rounded px-2 py-0.5 text-xs ml-1">{{ $pet->age }} Tahun</span>
                        <span class="font-semibold text-xs ml-2">Ukuran:</span>
                        <span class="inline-block bg-[#FDC8FD] text-[#5E225E] rounded px-2 py-0.5 text-xs ml-1">{{ $pet->size }}</span>
                    </div>
                    <div class="text-xs text-gray-600 mb-4 flex-1">
                        {{ Str::limit($pet->description, 100) }}
                    </div>
                    <a href="{{ route('adopt.detail', $pet) }}" class="block text-center border border-[#D678D6] text-[#D678D6] rounded-lg py-2 text-sm font-semibold hover:bg-purple-50 transition">More Info...</a>
                </div>
            </div>
            @endforeach
        </div>
        <a href="/adopt/post-adopt">
            <div class="mt-15 text-center">
            <button class="border border-[#D678D6] text-[#D678D6] px-28 py-4 rounded-md hover:bg-purple-50 transition">
                See More...
            </button>
        </div>
        </a>
        
    </section>

    <section class="py-16 px-6 bg-white">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-10">

            <div class="flex-1 text-center lg:text-left">
                <h1 class="text-3xl font-bold leading-snug">
                    Keharmonisan antara<br>
                    <span class="text-[#D678D6]">Manusia & Hewan</span>
                </h1>
                <img src="{{ asset('images/keharmonisan.png') }}" alt="Manusia dan Hewan"
                    class="mx-auto lg:mx-0 mt-8 max-w-sm">
            </div>

            <div class="flex-1 space-y-6">
                <div class="p-5 border border-gray-200 rounded-xl shadow-sm bg-white flex items-start gap-4">
                    <div class="text-pink-400 text-2xl">🐾</div>
                    <div>
                        <h1 class="font-semibold text-lg text-gray-800">Saling Memberi dan Menerima Kasih Sayang</h1>
                        <p class="text-gray-600 text-sm mt-1">
                            Hewan peliharaan memberikan cinta tanpa syarat, sementara manusia memberi perawatan, dan
                            rasa aman, dan perhatian.
                        </p>
                    </div>
                </div>

                <div class="p-5 border border-gray-200 rounded-xl shadow-sm bg-white flex items-start gap-4">
                    <div class="text-purple-400 text-2xl">🐾</div>
                    <div>
                        <h1 class="font-semibold text-lg text-gray-800">Kerja Sama dalam Kehidupan Sehari-hari</h1>
                        <p class="text-gray-600 text-sm mt-1">
                            Manusia menyediakan kebutuhan dasar hewan, sedangkan hewan bisa menjadi teman, penjaga, atau
                            bahkan penyembuh stres secara alami.
                        </p>
                    </div>
                </div>

                <div class="p-5 border border-gray-200 rounded-xl shadow-sm bg-white flex items-start gap-4">
                    <div class="text-blue-400 text-2xl">🌲</div>
                    <div>
                        <h1 class="font-semibold text-lg text-gray-800">Keharmonisan Kehidupan dan Alam</h1>
                        <p class="text-gray-600 text-sm mt-1">
                            Keharmonisan muncul saat manusia menyadari bahwa hewan juga makhluk hidup yang layak
                            dihargai, dan dilindungi.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 px-6 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-900">
                Adopt atau Rehome hewan peliharaan dengan
            </h2>
            <p class="text-green-600 mt-2 font-medium text-lg">3 Langkah Mudah</p>

            <!-- Langkah-langkah -->
            <div class="mt-12 flex flex-col md:flex-row justify-between items-center gap-8 relative">

                <!-- Garis putus-putus -->
                <div
                    class="hidden md:block absolute top-1/2 left-0 right-0 border-t-2 border-dashed border-[#FDC8FD] z-0">
                </div>

                <!-- Step 1 -->
                <div class="relative z-10 bg-white rounded-xl p-6 border text-center w-full md:w-1/3">
                    <div
                        class="w-10 h-10 mx-auto mb-4 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-bold">
                        1</div>
                    <div class="text-purple-700 text-4xl mb-3">👤➕</div>
                    <p class="text-gray-700 font-medium">Atur profil anda (termasuk foto) dalam hitungan menit</p>
                </div>

                <!-- Step 2 -->
                <div class="relative z-10 bg-white rounded-xl p-6 border text-center w-full md:w-1/3">
                    <div
                        class="w-10 h-10 mx-auto mb-4 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-bold">
                        2</div>
                    <div class="text-purple-700 text-4xl mb-3">🏠</div>
                    <p class="text-gray-700 font-medium">Deskripsikan rumah dan rutinitas anda, agar rehomers dapat
                        melihat kesesuaiannya.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative z-10 bg-white rounded-xl p-6 border text-center w-full md:w-1/3">
                    <div
                        class="w-10 h-10 mx-auto mb-4 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-bold">
                        3</div>
                    <div class="text-purple-700 text-4xl mb-3">🔍📋</div>
                    <p class="text-gray-700 font-medium">Mulai pencarian anda!</p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 px-6 bg-white">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 mb-10">
                Frequently Asked Questions
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- FAQ Adopters -->
                <a href="/faq-adopt" class="p-8 border rounded-xl text-center shadow-sm hover:shadow-md transition">
                    <div class="text-purple-700 text-5xl mb-4">💬</div>
                    <h3 class="text-purple-800 font-semibold text-lg mb-2">
                        FAQ's untuk Adopters
                    </h3>
                    <p class="text-gray-600">
                        Apabila anda ingin mengadopsi hewan peliharaan, pasti ada banyak hal yang perlu dipastikan.
                        Klik bagian ini untuk melihat pertanyaan-pertanyaan yang sering ditanyakan.
                    </p>
                </a>

                <!-- FAQ Rehomers -->
                <a href="/faq-rehome" class="p-8 border rounded-xl text-center shadow-sm hover:shadow-md transition">
                    <div class="text-purple-700 text-5xl mb-4">💬</div>
                    <h3 class="text-purple-800 font-semibold text-lg mb-2">
                        FAQ's untuk Rehomers
                    </h3>
                    <p class="text-gray-600">
                        Menemukan rumah baru untuk seekor hewan peliharaan tidak perlu menjadi tugas yang menakutkan.
                    </p>
                </a>

            </div>
        </div>
    </section>
</x-layout>