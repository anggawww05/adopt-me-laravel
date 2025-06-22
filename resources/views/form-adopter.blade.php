<x-layout title="Selamat Datang di Adopt Me!">

    <div x-data="{ currentStep: 1 }" class="p-8 font-sans">

        <div class="flex justify-between items-start w-full max-w-4xl mx-auto">
        
            {{-- Data untuk setiap langkah (bisa dari backend) --}}
            @php
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
                            'bg-teal-500': currentStep === {{ $step['id'] }},       // State: Aktif
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

        <div class="mt-10 flex justify-center space-x-4">
            <button 
                @click="if (currentStep > 1) currentStep--"
                class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 disabled:opacity-50 font-semibold"
                :disabled="currentStep === 1">
                Previous
            </button>
            <button 
                @click="if (currentStep < 7) currentStep++"
                class="px-8 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 disabled:opacity-50 font-semibold"
                :disabled="currentStep === 7">
                Next
            </button>
        </div>
    </div>
    {{-- Bagian Scripts --}}
    {{-- Kita akan menambahkan Alpine.js untuk interaktivitas stepper --}}

    <x-slot name="scripts">
        {{-- Semua script KHUSUS untuk halaman ini ditaruh di sini --}}
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        {{-- Anda juga bisa menambahkan script custom lain jika perlu --}}
        <script>
            console.log('Halaman dengan stepper dan Alpine.js telah dimuat!');
        </script>
    </x-slot>
</x-layout>