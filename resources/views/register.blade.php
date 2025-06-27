<x-layout title="Register">
    <div class="h-screen flex items-center justify-center" style="background-image: url('{{ asset('images/bg_auth.png') }}');">
        <div class="flex bg-white rounded-xl shadow-lg overflow-hidden w-[700px]">
            <!-- Left Side: Logo & Image -->
            <div class="flex flex-col items-center justify-center w-1/2 bg-gradient-to-b from-purple-100 to-white p-8">
                <div class="mb-4">
                    <img src="{{ asset('images/adoptme_logo.png') }}" alt="Adopt Me Logo" class=" w-28 mx-auto">
                </div>
                <img src="{{ asset('images/DogPic.png') }}" alt="Dog Sign Up" class="object-contain my-4">
            </div>
            <!-- Right Side: Register Form -->
            <div class="w-1/2 p-8">
                <h1 class="text-lg font-bold mb-4 text-center">Buat akun anda!</h1>
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama Lengkap" class="w-full border px-3 py-2 rounded text-sm">
                    </div>
                    <div class="mb-3">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="E-mail" class="w-full border px-3 py-2 rounded text-sm">
                    </div>
                    <div class="mb-3 relative">
                        <input type="password" id="password" name="password" required placeholder="Password" class="w-full border px-3 py-2 rounded text-sm pr-10">
                        <span class="absolute right-3 top-3 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mb-3">
                        <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Konfirmasi Password" class="w-full border px-3 py-2 rounded text-sm">
                    </div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" id="terms" required class="mr-2">
                        <label for="terms" class="text-xs text-gray-600">Saya menyetujui <a href="#" class="text-blue-500 underline">Terms & Conditions</a></label>
                    </div>
                    <button type="submit" class="w-full bg-purple-700 text-white py-2 rounded hover:bg-purple-800 mb-3">Buat Akun</button>
                </form>
                <div class="text-center text-xs text-gray-500">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 underline">Login</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
