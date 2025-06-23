<x-layout title="Tentang Kami">
    @vite('resources/css/app.css')
    <section class="bg-white px-6 md:px-20 py-12 font-[Montserrat]">
        <div class="max-w-[1300px] w-full mx-auto mb-20 px-4">
            <img src="{{ asset('images/tentangkami_image.png') }}" alt="Adopt Banner" class="w-full h-auto my-10 object-cover rounded-xl shadow-md">
            
            <h1 class="text-2xl font-medium text-[#5E225E] mt-20 mb-6">Apa itu AdoptMe!</h1>
            <p class="text-justify text-xl text-black mb-6">
                AdoptMe! adalah platform adopsi hewan yang bertujuan untuk menghubungkan hewan-hewan terlantar, terluka, atau ditinggalkan dengan orang-orang yang bersedia memberi rumah penuh kasih. Kami bekerja sama dengan berbagai shelter, rumah foster, dan relawan untuk menyediakan data akurat dan terkini tentang hewan-hewan yang siap diadopsi, termasuk informasi kesehatan, karakteristik perilaku, dan kebutuhan khusus mereka.
            </p>
            <p class="text-justify text-xl text-black mb-12">
                Kami juga menyediakan layanan rehome bagi pemilik hewan yang tidak lagi mampu merawat hewan peliharaannya. Dengan sistem rehome yang bertanggung jawab dan proses seleksi calon adopter yang ketat, kami memastikan hewan-hewan tersebut mendapatkan tempat tinggal baru yang layak, aman, dan penuh perhatian. Pemilik lama juga diberikan opsi untuk tetap terlibat dalam proses transisi, jika diinginkan.
            </p>

            <h1 class="text-3xl font-semibold text-[#5E225E] mb-30 text-center">Tim Developer</h1>
            <div class="flex flex-col md:flex-row justify-center gap-20 mb-20">
                <div class="relative bg-white rounded-lg shadow-md pt-36 text-center max-h-[300px] max-w-[400px] h-full w-full">
                    <div class="absolute -top-16 left-1/2 -translate-x-1/2">
                        <img src="{{ asset('images/mirza.png') }}" alt="Mirza Ali Fahlevi"
                        class="w-45 h-45 rounded-full object-cover shadow-md">
                    </div>
                    <h1 class="text-xl font-semibold text-[#5E225E] my-2">Mirza Ali Fahlevi</h1>
                    <p class="text-lg text-gray-600 mb-12">2308561003</p>
                </div>

                <div class="relative bg-white rounded-lg shadow-md pt-36 text-center max-h-[300px] max-w-[400px] h-full w-full">
                    <div class="absolute -top-16 left-1/2 -translate-x-1/2">
                        <img src="{{ asset('images/satria.png') }}" alt="Satria Dharma"
                        class="w-45 h-45 rounded-full object-cover shadow-md">
                    </div>
                    <h1 class="text-xl font-semibold text-[#5E225E] my-2">Satria Dharma</h1>
                    <p class="text-lg text-gray-600 mb-12">2308561045</p>
                </div>

                <div class="relative bg-white rounded-lg shadow-md pt-36 text-center max-h-[300px] max-w-[400px] h-full w-full">
                    <div class="absolute -top-16 left-1/2 -translate-x-1/2">
                        <img src="{{ asset('images/angga.png') }}" alt="Angga Putra Wibawa"
                        class="w-45 h-45 rounded-full object-cover shadow-md">
                    </div>
                    <h1 class="text-xl font-semibold text-[#5E225E] my-2">Angga Putra Wibawa</h1>
                    <p class="text-lg text-gray-600 mb-12">2308561099</p>
                </div>
            </div>

            <div class="border border-gray-300 rounded-2xl px-6 py-4 bg-white text-center">
                <h1 class="text-[#5E225E] text-lg font-medium mb-8">Menciptakan Keluarga Penuh Kasih Bersama AdoptMe!</h1>
                <p class="text-black text-lg">
                    AdoptMe hadir untuk membantu hewan-hewan yang membutuhkan menemukan rumah selamanya dan menyebarkan kasih sayang itu ke sebanyak mungkin keluarga. Kami percaya bahwa setiap hewan pantas mendapatkan kesempatan kedua, dan setiap keluarga berhak merasakan cinta tanpa syarat dari sahabat kita.
                </p>
            </div>
        </div>
    </section>
</x-layout>