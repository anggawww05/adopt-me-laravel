<x-layout title="Selamat Datang di Adopt Me!">
    <div class="h-screen bg-gray-200 flex items-center justify-center">
        <div class="relative w-full h-screen bg-cover bg-center">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-opacity-50"
                style="background-image: url('{{ asset('images/main_bg.png') }}');"></div>

            <!-- Content -->
            <div class="absolute inset-0 flex items-center justify-center px-6">
                <div class="max-w-xl text-white z-10">
                    <h1 class="text-4xl md:text-5xl font-semibold leading-tight">
                        Satu pelukan<br><span class="text-white">selamatkan hidup.</span>
                    </h1>
                    <h2 class="text-4xl md:text-5xl font-bold mt-3 text-purple-600">Adopt <span
                            class="text-pink-400">Me!</span></h2>

                    <p class="mt-5 text-sm md:text-base text-gray-200">
                        Adopt Me! adalah platform adopsi hewan yang menghubungkan hewan-hewan terlantar dengan calon
                        pemilik penuh kasih.
                        Melalui website ini, kamu bisa melihat profil hewan, membaca kisah mereka, dan memberikan mereka
                        rumah baru yang hangat dan aman.
                    </p>

                    <!-- Buttons -->
                    <div class="mt-6 flex gap-4">
                        <button
                            class="bg-purple-400 text-white px-5 py-2 rounded-md hover:bg-purple-500 transition">Adopt
                            Sekarang</button>
                        <button
                            class="border border-purple-400 text-purple-400 px-5 py-2 rounded-md hover:bg-purple-100 transition">Rehome
                            Sekarang</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <section class="py-12 px-4 bg-white">
        <h2 class="text-center text-2xl md:text-3xl font-semibold mb-10">
            Lihatlah Beberapa Hewan Peliharaan Kami
        </h2>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4 max-w-7xl mx-auto">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl shadow-md border p-4 flex flex-col">
                <img src="{{ asset('images/main_bg.png') }}" alt="Tukang Gigit Sendal"
                    class="rounded-md mb-3 h-48 w-full object-cover">
                <h3 class="text-lg font-semibold">Tukang Gigit Sendal</h3>
                <p class="text-sm text-gray-500">📍 Bali, Tabanan</p>

                <div class="mt-3 text-sm space-y-1">
                    <p><strong>Gender:</strong> <span class="text-purple-600">Jantan</span> &nbsp;
                        <strong>Breed:</strong> <span class="text-purple-600">Gakko</span>
                    </p>
                    <p><strong>Umur:</strong> 7 bulan &nbsp;
                        <strong>Ukuran:</strong> Kecil
                    </p>
                </div>

                <p class="text-sm mt-3 text-gray-600 flex-grow">
                    Tukang Gigit Sendal aktif dan penasaran, cocok untuk rumah yang siap bersenang-senang!
                </p>

                <button class="mt-4 border border-pink-400 text-pink-500 rounded-md py-1 hover:bg-pink-50 transition">
                    More Info...
                </button>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-xl shadow-md border p-4 flex flex-col">
                <img src="{{ asset('images/main_bg.png') }}" alt="Browny"
                    class="rounded-md mb-3 h-48 w-full object-cover">
                <h3 class="text-lg font-semibold">Browny</h3>
                <p class="text-sm text-gray-500">📍 Bali, Denpasar</p>

                <div class="mt-3 text-sm space-y-1">
                    <p><strong>Gender:</strong> <span class="text-purple-600">Betina</span> &nbsp;
                        <strong>Breed:</strong> <span class="text-purple-600">Shippet</span>
                    </p>
                    <p><strong>Umur:</strong> 13 bulan &nbsp;
                        <strong>Ukuran:</strong> Sedang
                    </p>
                </div>

                <p class="text-sm mt-3 text-gray-600 flex-grow">
                    Browny ramah dengan anak-anak dan suka bermain. Cocok sebagai sahabat setia keluarga.
                </p>

                <button class="mt-4 border border-pink-400 text-pink-500 rounded-md py-1 hover:bg-pink-50 transition">
                    More Info...
                </button>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-xl shadow-md border p-4 flex flex-col">
                <img src="{{ asset('images/main_bg.png') }}" alt="Penyihir Oren"
                    class="rounded-md mb-3 h-48 w-full object-cover">
                <h3 class="text-lg font-semibold">Penyihir Oren</h3>
                <p class="text-sm text-gray-500">📍 Bali, Tabanan</p>

                <div class="mt-3 text-sm space-y-1">
                    <p><strong>Gender:</strong> <span class="text-purple-600">Jantan</span> &nbsp;
                        <strong>Breed:</strong> <span class="text-purple-600">Gakko</span>
                    </p>
                    <p><strong>Umur:</strong> 11 bulan &nbsp;
                        <strong>Ukuran:</strong> Kecil
                    </p>
                </div>

                <p class="text-sm mt-3 text-gray-600 flex-grow">
                    Kucing oren yang cerdas, penyihir kecil yang suka tidur di pangkuan.
                </p>

                <button class="mt-4 border border-pink-400 text-pink-500 rounded-md py-1 hover:bg-pink-50 transition">
                    More Info...
                </button>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-xl shadow-md border p-4 flex flex-col">
                <img src="{{ asset('images/main_bg.png') }}" alt="JackJack"
                    class="rounded-md mb-3 h-48 w-full object-cover">
                <h3 class="text-lg font-semibold">JackJack</h3>
                <p class="text-sm text-gray-500">📍 Bali, Tabanan</p>

                <div class="mt-3 text-sm space-y-1">
                    <p><strong>Gender:</strong> <span class="text-purple-600">Jantan</span> &nbsp;
                        <strong>Breed:</strong> <span class="text-purple-600">Kampung</span>
                    </p>
                    <p><strong>Umur:</strong> 5 bulan &nbsp;
                        <strong>Ukuran:</strong> Kecil
                    </p>
                </div>

                <p class="text-sm mt-3 text-gray-600 flex-grow">
                    JackJack aktif dan penyayang. Sangat cocok sebagai sahabat anak-anak.
                </p>

                <button class="mt-4 border border-pink-400 text-pink-500 rounded-md py-1 hover:bg-pink-50 transition">
                    More Info...
                </button>
            </div>
        </div>

        <!-- See More Button -->
        <div class="mt-10 text-center">
            <button class="border border-pink-300 text-pink-400 px-6 py-2 rounded-md hover:bg-pink-50 transition">
                See More...
            </button>
        </div>
    </section>

    <section class="py-16 px-6 bg-white">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-10">

            <!-- Left: Gambar dan Judul -->
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-3xl font-bold leading-snug">
                    Keharmonisan antara <br>
                    <span class="text-pink-500">Manusia & Hewan</span>
                </h2>
                <img src="{{ asset('images/keharmonisan.png') }}" alt="Manusia dan Hewan"
                    class="mx-auto lg:mx-0 mt-8 max-w-sm">
            </div>

            <!-- Right: Box Info -->
            <div class="flex-1 space-y-6">

                <!-- Card 1 -->
                <div class="p-5 border rounded-xl shadow-sm bg-white flex items-start gap-4">
                    <div class="text-pink-400 text-2xl">🐾</div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800">Saling Memberi dan Menerima Kasih Sayang</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Hewan peliharaan memberikan cinta tanpa syarat, sementara manusia memberi perawatan, dan
                            rasa aman, dan perhatian.
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="p-5 border rounded-xl shadow-sm bg-white flex items-start gap-4">
                    <div class="text-purple-400 text-2xl">🐾</div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800">Kerja Sama dalam Kehidupan Sehari-hari</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Manusia menyediakan kebutuhan dasar hewan, sedangkan hewan bisa menjadi teman, penjaga, atau
                            bahkan penyembuh stres secara alami.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="p-5 border rounded-xl shadow-sm bg-white flex items-start gap-4">
                    <div class="text-blue-400 text-2xl">🌲</div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800">Keharmonisan Kehidupan dan Alam</h3>
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
                    class="hidden md:block absolute top-1/2 left-0 right-0 border-t-2 border-dashed border-purple-300 z-0">
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
                <div class="p-8 border rounded-xl text-center shadow-sm hover:shadow-md transition">
                    <div class="text-purple-700 text-5xl mb-4">💬</div>
                    <h3 class="text-purple-800 font-semibold text-lg mb-2">
                        FAQ's untuk Adopters
                    </h3>
                    <p class="text-gray-600">
                        Apabila anda ingin mengadopsi hewan peliharaan, pasti ada banyak hal yang perlu dipastikan.
                        Klik bagian ini untuk melihat pertanyaan-pertanyaan yang sering ditanyakan.
                    </p>
                </div>

                <!-- FAQ Rehomers -->
                <div class="p-8 border rounded-xl text-center shadow-sm hover:shadow-md transition">
                    <div class="text-purple-700 text-5xl mb-4">💬</div>
                    <h3 class="text-purple-800 font-semibold text-lg mb-2">
                        FAQ's untuk Rehomers
                    </h3>
                    <p class="text-gray-600">
                        Menemukan rumah baru untuk seekor hewan peliharaan tidak perlu menjadi tugas yang menakutkan.
                    </p>
                </div>

            </div>
        </div>
    </section>

</x-layout>
