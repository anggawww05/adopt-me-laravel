<x-layout title="Formulir Adopsi - Adopt Me!">
    <div x-data="{ currentStep: 1 }" class="p-8 font-sans bg-gray-50">

        <div class="flex justify-between items-start w-full max-w-4xl mx-auto mb-12">
            @php
                // Re-adding the 'icon' data for each step
                $steps = [
                    ['id' => 1, 'name' => 'Mulai', 'icon' => 'M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3'],
                    ['id' => 2, 'name' => 'Alamat', 'icon' => 'M15 10.5a3 3 0 11-6 0 3 3 0 016 0z M21 10.5c0-4.97-4.03-9-9-9s-9 4.03-9 9c0 2.494.99 4.743 2.615 6.401l6.385 6.385a.75.75 0 001.06 0l6.385-6.385A8.958 8.958 0 0021 10.5z'],
                    ['id' => 3, 'name' => 'Rumah', 'icon' => 'M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h7.5'],
                    ['id' => 4, 'name' => 'Foto Rumah', 'icon' => 'M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25z'],
                    ['id' => 5, 'name' => 'Teman Sekamar', 'icon' => 'M18 18.72a8.906 8.906 0 00-4.32-1.226 2.5 2.5 0 00-2.36 0a8.906 8.906 0 00-4.32 1.226M12 14.25a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5zM12 18.75a9 9 0 100-18 9 9 0 000 18z'],
                    ['id' => 6, 'name' => 'Hewan Lain', 'icon' => 'M10.5 8.25a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['id' => 7, 'name' => 'Konfirmasi', 'icon' => 'M4.5 12.75l6 6 9-13.5'],
                ];
            @endphp
            @foreach ($steps as $step)
                <div class="flex flex-col items-center text-center w-20">
                    
                    <div class="w-14 h-14 rounded-full flex items-center justify-center transition-all duration-500"
                        :class="{
                            'bg-purple-600': currentStep === {{ $step['id'] }},       // State: Aktif
                            'bg-purple-800': currentStep > {{ $step['id'] }},      // State: Selesai
                            'bg-gray-200': currentStep < {{ $step['id'] }}        // State: Akan Datang
                        }">

                        <svg class="w-7 h-7 transition-all duration-500" 
                            :class="currentStep >= {{ $step['id'] }} ? 'text-white' : 'text-gray-400'" 
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
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
            <form method="POST" action="{{ route('adoption.store', $pet) }}" enctype="multipart/form-data">
                @csrf

                <div x-show="currentStep === 1" class="text-center">
                    <img src="{{ Auth::user()->picture_profile ? asset('storage/' . Auth::user()->picture_profile) : asset('images/default_profile.jpg') }}" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <p class="font-semibold">Email/Username: {{ Auth::user()->email }}</p>
                    <p class="font-semibold">Nama: {{ Auth::user()->name }}</p>
                    <div class="mt-6">
                        <label class="flex items-center justify-center">
                            <input type="checkbox" name="terms" required class="mr-2">
                            <span>Saya telah membaca dan menyetujui Persyaratan dan Kebijakan Privasi</span>
                        </label>
                    </div>
                    <p class="text-sm text-gray-600 mt-4">Untuk mengadopsi hewan, anda perlu mengisi formulir berikut.</p>
                </div>

                <div x-show="currentStep === 2" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Alamat <span class="text-red-500">*</span></label>
                        <input type="text" name="address" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Kota <span class="text-red-500">*</span></label>
                        <input type="text" name="city" id="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <label for="post_code" class="block text-sm font-medium text-gray-700">Kode Pos <span class="text-red-500">*</span></label>
                        <input type="text" name="post_code" id="post_code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" required>
                    </div>
                    <div></div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="tel" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label for="home_phone" class="block text-sm font-medium text-gray-700">Telepon Rumah</label>
                        <input type="tel" name="home_phone" id="home_phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                </div>

                <div x-show="currentStep === 3" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apakah kamu memiliki halaman? <span class="text-red-500">*</span></label>
                        <div class="mt-2 flex gap-4">
                            <label><input type="radio" name="have_yard" value="yes" class="mr-1">Iya</label>
                            <label><input type="radio" name="have_yard" value="no" class="mr-1">Tidak</label>
                        </div>
                    </div>
                    <div>
                        <label for="environment_situation" class="block text-sm font-medium text-gray-700">Deskripsikan situasi lingkungan anda <span class="text-red-500">*</span></label>
                        <select name="environment_situation" id="environment_situation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="urban">Perkotaan (Urban)</option>
                            <option value="fringe">Pinggiran Kota (Fringe)</option>
                            <option value="rural">Pedesaan (Rural)</option>
                        </select>
                    </div>
                    <div>
                        <label for="house_type" class="block text-sm font-medium text-gray-700">Deskripsikan lingkungan rumah tangga anda <span class="text-red-500">*</span></label>
                         <select name="house_type" id="house_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="apartment">Apartemen</option>
                            <option value="house">Rumah</option>
                        </select>
                    </div>
                    <div>
                        <label for="home_activity" class="block text-sm font-medium text-gray-700">Deskripsikan tingkat aktivitas rumah tangga pada umumnya <span class="text-red-500">*</span></label>
                         <select name="home_activity" id="home_activity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="active">Aktif</option>
                             <option value="middle">Sedang</option>
                            <option value="calm">Tenang</option>
                        </select>
                    </div>
                </div>

                <div x-show="currentStep === 4" class="text-center">
                    <p class="text-sm text-gray-600 mb-4">Harap tambahkan 4 foto rumah Anda dan area luar rumah karena ini akan membantu pemilik hewan peliharaan saat ini untuk membuat keputusan. (Minimal 2 foto diperlukan, tetapi lebih baik jika mengunggah 4 foto)</p>
                    <div class="grid grid-cols-2 gap-4">
                        <input type="file" name="home_photo_1" class="border p-2 rounded">
                        <input type="file" name="home_photo_2" class="border p-2 rounded">
                        <input type="file" name="home_photo_3" class="border p-2 rounded">
                        <input type="file" name="home_photo_4" class="border p-2 rounded">
                    </div>
                </div>

                <div x-show="currentStep === 5" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                     <div>
                        <label for="family_members" class="block text-sm font-medium text-gray-700">Jumlah orang dewasa <span class="text-red-500">*</span></label>
                        <input type="number" name="family_members" id="family_members" value="1" min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                     <div>
                        <label for="youngest_age" class="block text-sm font-medium text-gray-700">Jumlah anak-anak</label>
                        <input type="number" name="youngest_age" id="youngest_age" value="0" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ada anak yang berkunjung?</label>
                        <div class="mt-2 flex gap-4">
                            <label><input type="radio" name="kids_visited" value="yes" class="mr-1">Iya</label>
                            <label><input type="radio" name="kids_visited" value="no" class="mr-1">Tidak</label>
                        </div>
                    </div>
                     <div>
                        <label for="visited_age" class="block text-sm font-medium text-gray-700">Usia anak-anak yang berkunjung</label>
                        <input type="number" name="visited_age" id="visited_age" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apakah Anda punya teman serumah?</label>
                         <div class="mt-2 flex gap-4">
                            <label><input type="radio" name="have_roommate" value="yes" class="mr-1">Iya</label>
                            <label><input type="radio" name="have_roommate" value="no" class="mr-1">Tidak</label>
                        </div>
                    </div>
                </div>
                
                <div x-show="currentStep === 6" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apakah ada anggota keluarga Anda yang alergi terhadap hewan peliharaan? <span class="text-red-500">*</span></label>
                        <div class="mt-2 flex gap-4">
                            <label><input type="radio" name="have_alergy" value="yes" class="mr-1" required> Iya</label>
                            <label><input type="radio" name="have_alergy" value="no" class="mr-1"> Tidak</label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apakah ada hewan lain di rumahmu?</label>
                        <div class="mt-2 flex gap-4">
                            <label><input type="radio" name="have_other_pets" value="yes" class="mr-1">Iya</label>
                            <label><input type="radio" name="have_other_pets" value="no" class="mr-1">Tidak</label>
                        </div>
                    </div>
                     <div>
                        <label for="describe_other_pets" class="block text-sm font-medium text-gray-700">Jika iya, mohon sebutkan spesies, usia dan jenis kelaminnya</label>
                        <textarea name="describe_other_pets" id="describe_other_pets" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>
                    <div>
                        <label for="experience" class="block text-sm font-medium text-gray-700">Tolong jelaskan pengalaman Anda tentang kepemilikan hewan peliharaan sebelumnya dan beri tahu kami tentang rumah serta rutinitas anda.</label>
                        <textarea name="experience" id="experience" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>
                </div>
                
                <div x-show="currentStep === 7" class="text-center">
                    <h2 class="text-2xl font-bold text-purple-700 mb-4">Terima Kasih!</h2>
                    <p class="text-gray-600">Pemilik hewan peliharaan saat ini akan dikirimi tautan ke profil Anda saat aplikasi Anda disetujui oleh AdoptMe.</p>
                    <img src="{{ asset('images/success_cat.png') }}" alt="Success" class="mx-auto my-6 w-48">
                    <button type="submit" class="w-full bg-purple-600 text-white py-2 px-6 rounded-lg hover:bg-purple-700">Kirim Aplikasi & Kembali ke Profil</button>
                </div>
            </form>

            <div class="mt-8 flex justify-between">
                <button 
                    @click="if (currentStep > 1) currentStep--"
                    class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 disabled:opacity-50 font-semibold"
                    :disabled="currentStep === 1 || currentStep === 7">
                    Kembali
                </button>
                <button 
                    @click="if (currentStep < 7) currentStep++"
                    class="px-8 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 disabled:opacity-50 font-semibold"
                    :disabled="currentStep === 7">
                    Berikutnya
                </button>
            </div>
        </div>
    </div>
</x-layout>