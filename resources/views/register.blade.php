<x-layout title="Register">
    <div class="h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg_auth.png') }}');">
        <div class="flex bg-white rounded-xl shadow-lg overflow-hidden w-[700px]">

            <div class="flex flex-col items-center justify-center w-1/2 bg-gradient-to-b from-purple-100 to-white p-8">
                <div class="mb-4">
                    <img src="{{ asset('images/adoptme_logo.png') }}" alt="Adopt Me Logo" class=" w-28 mx-auto">
                </div>
                <img src="{{ asset('images/DogPic.png') }}" alt="Dog Sign Up" class="object-contain my-4">
            </div>

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
                    </div>

                    <div class="mb-3">
                        <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Konfirmasi Password" class="w-full border px-3 py-2 rounded text-sm">
                    </div>
                    <button type="submit" class="w-full bg-purple-400 text-white py-2 rounded hover:bg-purple-800 mb-3">Buat Akun</button>
                </form>
                <div class="text-center text-xs text-gray-500">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 underline">Login</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
