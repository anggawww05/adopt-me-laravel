<x-layout title="Login">
    <div class="h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg_auth.png') }}');">
        <div class="flex bg-white rounded-xl shadow-lg overflow-hidden w-[700px]">
            <!-- Left Side: Logo & Image -->
            <!-- Right Side: Register Form -->
            <div class="w-1/2 p-8">
                <h1 class="text-lg font-bold mb-4 text-center">Masuk akun anda!</h1>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 p-3 rounded-lg">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login.authenticate') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail" class="w-full border px-3 py-2 rounded text-sm">
                    </div>
                    <div class="mb-3 relative">
                        <input type="password" id="password" name="password" required placeholder="Password" class="w-full border px-3 py-2 rounded text-sm pr-10">
                        
                    </div>
                    {{-- <div class="flex items-center mb-4">
                        <input type="checkbox" id="terms" required class="mr-2">
                        <label for="terms" class="text-xs text-gray-600">Saya menyetujui <a href="#" class="text-blue-500 underline">Terms & Conditions</a></label>
                    </div> --}}
                    <button type="submit" class="w-full bg-purple-400 text-white py-2 rounded hover:bg-purple-800 mb-3">Login</button>
                    
                </form>
                <div class="my-4 text-center">
                        <a href="{{ route('google.redirect') }}" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            Sign in with Google
                        </a>
                    </div>
                <div class="text-center text-xs text-gray-500">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 underline">Register</a>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center w-1/2 bg-gradient-to-b from-purple-100 to-white p-8">
                <div class="mb-4">
                    <img src="{{ asset('images/adoptme_logo.png') }}" alt="Adopt Me Logo" class=" w-28 mx-auto">
                </div>
                <img src="{{ asset('images/DogPic.png') }}" alt="Dog Sign Up" class="object-contain my-4">
            </div>
        </div>
    </div>
</x-layout>
