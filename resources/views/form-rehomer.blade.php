<x-layout title="Formulir Adopsi - Adopt Me!">
    <div x-data="{ currentStep: 1 }" class="p-8 font-sans bg-gray-50">

        <div class="flex justify-between items-start w-full max-w-4xl mx-auto mb-12">
            @php
                // Icon data untuk setiap step yang sesuai dengan nama step
                $steps = [
                    ['id' => 1, 'name' => 'Mulai', 'icon' => 'M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3'], // Arrow right (start)
                    [
                        'id' => 2,
                        'name' => 'Pertanyaan',
                        'icon' =>
                            'M9.879 7.519c0-1.105.906-2 2.019-2s2.02.895 2.02 2c0 .967-.656 1.544-1.438 2.171-.859.69-1.581 1.287-1.581 2.809v.5M12 17h.01',
                    ], // Question mark
                    [
                        'id' => 3,
                        'name' => 'Foto',
                        'icon' =>
                            'm2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Z',
                    ], // Camera/Photo icon
                    [
                        'id' => 4,
                        'name' => 'Karakteristik',
                        'icon' =>
                            'M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z',
                    ], // User profile icon
                    [
                        'id' => 5,
                        'name' => 'Fakta Penting',
                        'icon' =>
                            'M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z',
                    ], // Info icon
                    [
                        'id' => 6,
                        'name' => 'Lokasi',
                        'icon' =>
                            'M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z',
                    ], // Location pin icon
                    [
                        'id' => 7,
                        'name' => 'Sejarah',
                        'icon' =>
                            'M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25',
                    ], // Book/Story icon
                    [
                        'id' => 8,
                        'name' => 'Dokumen',
                        'icon' =>
                            'M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z',
                    ], // Document icon
                    [
                        'id' => 9,
                        'name' => 'Konfirmasi',
                        'icon' => 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z',
                    ], // Check circle icon
                ];
            @endphp
            @foreach ($steps as $step)
                <div class="flex flex-col items-center text-center w-20">

                    <div class="w-14 h-14 rounded-full flex items-center justify-center transition-all duration-500"
                        :class="{
                            'bg-purple-600': currentStep === {{ $step['id'] }}, // State: Aktif
                            'bg-purple-800': currentStep > {{ $step['id'] }}, // State: Selesai
                            'bg-gray-200': currentStep < {{ $step['id'] }} // State: Akan Datang
                        }">

                        <svg class="w-7 h-7 transition-all duration-500"
                            :class="currentStep >= {{ $step['id'] }} ? 'text-white' : 'text-gray-400'"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                        </svg>

                    </div>

                    <p class="mt-2 text-sm transition-all duration-500"
                        :class="currentStep >= {{ $step['id'] }} ? 'text-gray-800 font-semibold' : 'text-gray-400'">
                        {{ $step['name'] }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <form method="POST" action="{{ route('rehomer.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <p class="font-bold">Terjadi Kesalahan:</p>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div x-show="currentStep === 1" class="text-center">
                    <img src="{{ Auth::user()->picture_profile ? asset('storage/' . Auth::user()->picture_profile) : asset('images/default_profile.jpg') }}"
                        alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <p class="font-semibold">Email/Username: {{ Auth::user()->email }}</p>
                    <p class="font-semibold">Nama: {{ Auth::user()->name }}</p>
                    <div class="mt-6">
                        <label class="flex items-center justify-center">
                            <input type="checkbox" name="terms" required class="mr-2">
                            <span>Saya telah membaca dan menyetujui Persyaratan dan Kebijakan Privasi</span>
                        </label>
                    </div>
                    <p class="text-sm text-gray-600 mt-4">Untuk melakukan rehome hewan, anda perlu mengisi formulir
                        berikut.
                    </p>
                </div>

                <div x-show="currentStep === 2" class="flex flex-col gap-6">
                    <div>
                        <label for="jenis_hewan" class="block mb-2 font-medium text-gray-700">Hewan apa yang anda rehome?</label>
                        <select id="jenis_hewan" name="jenis_hewan" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Pilih Opsi</option>
                            <option value="cat">Kucing</option>
                            <option value="dog">Anjing</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700">Apakah hewan peliharaan Anda sudah disterilkan?</label>
                        <div class="flex items-center space-x-6">
                            <label class="inline-flex items-center">
                                <input type="radio" name="steril_status" value="yes" required class="form-radio text-purple-600">
                                <span class="ml-2">Iya</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="steril_status" value="no" required class="form-radio text-purple-600">
                                <span class="ml-2">Tidak</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="rehome_reason" class="block mb-2 font-medium text-gray-700">Mengapa Anda perlu me-rehome hewan ini? <span class="text-red-500">*</span></label>
                        <textarea id="rehome_reason" name="rehome_reason" rows="4" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="Contoh: Saya akan pindah dan tidak bisa membawanya..."></textarea>
                    </div>

                    <div>
                        <label for="waiting_time" class="block mb-2 font-medium text-gray-700">
                            Berapa lama Anda mampu menampung hewan ini selagi kami carikan rumah baru? <span class="text-red-500">*</span>
                        </label>
                        <select id="waiting_time" name="waiting_time" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Pilih Opsi</option>
                            <option value="1 Minggu">1 Minggu</option>
                            <option value="2 Minggu">2 Minggu</option>
                            <option value="1 Bulan">1 Bulan</option>
                            <option value="Lebih dari 1 Bulan">Lebih dari 1 Bulan</option>
                        </select>
                    </div>

                    <div>
                        <label for="problematic_status" class="block mb-2 font-medium text-gray-700">
                            Apakah hewan peliharaan Anda memiliki masalah perilaku yang signifikan?
                        </label>
                        <select id="problematic_status" name="problematic_status" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Pilih Opsi</option>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                </div>

                <div x-show="currentStep === 3" class="space-y-6">
                    <p class="text-sm text-gray-600 mb-4">Harap tambahkan 4 foto dari hewan peliharaan anda
                        (Minimal 2 foto diperlukan, tetapi lebih baik jika mengunggah 4 foto!)
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <input type="file" name="home_photo_1" class="border p-2 rounded">
                        <input type="file" name="home_photo_2" class="border p-2 rounded">
                        <input type="file" name="home_photo_3" class="border p-2 rounded">
                        <input type="file" name="home_photo_4" class="border p-2 rounded">
                    </div>
                </div>

                <div x-show="currentStep === 4" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama_hewan" class="block mb-2 font-medium text-gray-700">Nama Hewan <span class="text-red-500">*</span></label>
                        <input type="text" id="nama_hewan" name="nama_hewan" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        <p class="text-xs text-gray-500 mt-1">Jika hewan peliharaan Anda adalah anakan, tambahkan usianya sebagai 0</p>
                    </div>

                    <div>
                        <label for="umur" class="block mb-2 font-medium text-gray-700">Umur (Bulan) <span class="text-red-500">*</span></label>
                        <select id="umur" name="umur" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="unknown">Tidak Diketahui</option>
                            @for ($i = 0; $i <= 36; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label for="ukuran" class="block mb-2 font-medium text-gray-700">Ukuran <span class="text-red-500">*</span></label>
                        <select id="ukuran" name="ukuran" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Pilih Opsi</option>
                            <option value="kecil">Kecil</option>
                            <option value="sedang">Sedang</option>
                            <option value="besar">Besar</option>
                        </select>
                    </div>

                    <div>
                        <label for="gender" class="block mb-2 font-medium text-gray-700">Gender <span class="text-red-500">*</span></label>
                        <select id="gender" name="gender" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Pilih Opsi</option>
                            <option value="jantan">Jantan</option>
                            <option value="betina">Betina</option>
                        </select>
                    </div>

                    <div>
                        <label for="breed" class="block mb-2 font-medium text-gray-700">Breed <span class="text-red-500">*</span></label>
                        <input type="text" id="breed" name="breed" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="Contoh: Persia, Golden Retriever">
                    </div>

                    <div>
                        <label for="warna" class="block mb-2 font-medium text-gray-700">Warna <span class="text-red-500">*</span></label>
                        <input type="text" id="warna" name="warna" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="Contoh: Hitam, Putih, Coklat">
                    </div>
                </div>

                <div x-show="currentStep === 5" class="grid grid-cols-1 gap-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <label class="font-medium text-gray-700">Vaksin Lengkap</label>
                        <div class="flex space-x-8">
                            <label class="inline-flex items-center">
                                <input type="radio" name="vaksin_lengkap" value="iya" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Iya</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="vaksin_lengkap" value="tidak" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="vaksin_lengkap" value="tidak_diketahui" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak Diketahui</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <label class="font-medium text-gray-700">Sudah Dilatih</label>
                        <div class="flex space-x-8">
                            <label class="inline-flex items-center">
                                <input type="radio" name="sudah_dilatih" value="iya" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Iya</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="sudah_dilatih" value="tidak" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="sudah_dilatih" value="tidak_diketahui" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak Diketahui</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <label class="font-medium text-gray-700">Baik dengan Hewan lain</label>
                        <div class="flex space-x-8">
                            <label class="inline-flex items-center">
                                <input type="radio" name="baik_dengan_hewan_lain" value="iya" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Iya</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="baik_dengan_hewan_lain" value="tidak" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="baik_dengan_hewan_lain" value="tidak_diketahui" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak Diketahui</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <label class="font-medium text-gray-700">Baik dengan Anak</label>
                        <div class="flex space-x-8">
                            <label class="inline-flex items-center">
                                <input type="radio" name="baik_dengan_anak" value="iya" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Iya</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="baik_dengan_anak" value="tidak" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="baik_dengan_anak" value="tidak_diketahui" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak Diketahui</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <label class="font-medium text-gray-700">Ras Murni</label>
                        <div class="flex space-x-8">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ras_murni" value="iya" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Iya</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="ras_murni" value="tidak" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="ras_murni" value="tidak_diketahui" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak Diketahui</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <label class="font-medium text-gray-700">Kebutuhan Khusus</label>
                        <div class="flex space-x-8">
                            <label class="inline-flex items-center">
                                <input type="radio" name="kebutuhan_khusus" value="iya" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Iya</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="kebutuhan_khusus" value="tidak" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="kebutuhan_khusus" value="tidak_diketahui" required
                                    class="form-radio text-purple-600">
                                <span class="ml-2">Tidak Diketahui</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div x-show="currentStep === 6" class="space-y-6">
                    <div>
                        <label for="alamat" class="block mb-2 font-medium text-gray-700">Alamat <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="alamat" name="alamat" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label for="kota" class="block mb-2 font-medium text-gray-700">Kota <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="kota" name="kota" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label for="kode_pos" class="block mb-2 font-medium text-gray-700">Kode Pos <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="kode_pos" name="kode_pos" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                </div>

                <div x-show="currentStep === 7" class="space-y-6">
                    <p class="text-gray-700 mb-4">
                        Bagikan apa pun tentang hewan peliharaan Anda di sini. (Profil hewan peliharaan Anda akan
                        terlihat oleh publik. Demi keselamatan Anda, jangan sertakan detail pribadi atau informasi
                        kontak apa pun). Sertakan informasi seperti:
                    </p>
                    <ul class="list-disc list-inside text-left text-gray-600 mb-4 space-y-1">
                        <li>Riwayat hewan peliharaan Anda: sudah berapa lama Anda memeliharanya, dari mana Anda
                            mendapatkannya, dan mengapa Anda perlu memindahkannya ke rumah baru</li>
                        <li>Rincian tentang dengan siapa hewan peliharaan Anda tinggal, misalnya anak-anak dan hewan
                            peliharaan lainnya</li>
                        <li>Aktivitas favorit hewan peliharaan Anda</li>
                        <li>Deskripsi tentang kepribadian, preferensi, dan kebiasaan mereka</li>
                        <li>Apa pun yang mereka takuti seperti kembang api, orang bersegaram, hewan lain</li>
                        <li>Jenis makanan yang mereka makan termasuk merek dan jumlahnya</li>
                        <li>Alergi, kondisi kesehatan, dan obat apa pun yang dikonsumsi hewan peliharaan Anda</li>
                        <li>Jika Anda mencantumkan pasangan yang terikat, pastikan Anda menyertakan detail tentang kedua
                            hewan peliharaan tersebut</li>
                    </ul>
                    <textarea name="sejarah" rows="7" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500"
                        placeholder="Ketik disini..."></textarea>
                </div>

                <div x-show="currentStep === 8">
                    <p class="text-sm text-gray-600 mb-4">Ini tidak akan pernah terlihat oleh publik dan hanya akan dibagikan kepada pengadopsi saat Anda menyelesaikan Proses Rehome. Demi keselamatan Anda, kami sarankan Anda untuk mencoret semua informasi pribadi pada dokumen apa pun.
                    </p>
                    <div>
                        <input type="file" name="dokumen[]" class="border p-2 rounded w-full" multiple
                            accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                        <p class="text-xs text-gray-500 mt-2">Unggah dokumen terkait hewan peliharaan Anda (format:
                            PDF, JPG, PNG, DOC, maksimal 4 file).</p>
                    </div>
                </div>
                <div x-show="currentStep === 9" class="text-center">
                    <h2 class="text-2xl font-bold text-purple-700 mb-4">Terima Kasih!</h2>
                    <p class="text-gray-600">Selamat! Hewan peliharaanmu siap tampil di etalase dan menanti keluarga baru yang penuh kasih. Terima kasih telah mempercayakan proses rehome bersama kami!</p>
                    <img src="{{ asset('images/success_cat.png') }}" alt="Success" class="mx-auto my-6 w-48">
                    <button type="submit"
                        class="w-full bg-purple-600 text-white py-2 px-6 rounded-lg hover:bg-purple-700">Kirim Aplikasi
                        & Kembali ke Profil</button>
                </div>
            </form>

            <div class="mt-8 flex justify-between">
                <button @click="if (currentStep > 1) currentStep--"
                    class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 disabled:opacity-50 font-semibold"
                    :disabled="currentStep === 1 || currentStep === 9">
                    Kembali
                </button>
                <button @click="if (currentStep < 9) currentStep++"
                    class="px-8 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 disabled:opacity-50 font-semibold"
                    :disabled="currentStep === 9">
                    Berikutnya
                </button>
            </div>
        </div>
    </div>
</x-layout>
