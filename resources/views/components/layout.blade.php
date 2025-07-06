<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Adopt Me!' }}</title>
    <link rel="icon" href="{{ asset('images/logo_no_teks.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.2" defer></script>
</head>

<body class="font-[Montserrat] bg-white text-gray-800">
    <header class="bg-white shadow-sm sticky top-0 z-50 font-primary">
        <nav class="container mx-auto px-20 py-6 flex justify-between items-center">
            <img src="{{ asset('images/adoptme_logo.png') }}" alt="Adopt Me Logo" class="h-12 xs:h-2 md:h-14 lg:h-16">

            <ul class="flex items-center space-x-12 text-black text-md font-medium">
                <li><a href="/" class="hover:text-[#5E225E] hover:underline transition">Home</a></li>
                <li><a href="/adopt/post-adopt" class="hover:text-[#5E225E] hover:underline transition">Adopt</a></li>
                <li><a href="/rehomer/formulir" class="hover:text-[#5E225E] hover:underline transition">Rehome</a></li>
                <li><a href="/tentang-kami" class="hover:text-[#5E225E] hover:underline transition duration-200">Tentang Kami</a></li>
            </ul>

            @guest
                {{-- If the user is a GUEST, show the Login button --}}
                <a href="{{ route('login') }}" class="flex items-center space-x-2 bg-[#D678D6] text-white font-semibold rounded-lg hover:opacity-70 transition duration-200 px-4 py-2 lg:px-6 lg:py-3 text-sm lg:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Login | Sign Up</span>
                </a>
            @endguest

            @auth
                <div>
                    {{-- If the user is LOGGED IN, show their profile picture and a logout link --}}
                    <a href="/account">
                        <div class="flex items-center space-x-4 border border-purple-300 rounded-lg px-4 py-2">
                        <img src="{{ Auth::user()->picture_profile ? asset('storage/' . Auth::user()->picture_profile) : asset('images/default_profile.jpg') }}" alt="Profile Picture" class="h-12 w-12 rounded-full object-cover border-2 border-purple-300">
                        <span class="text-sm font-semibold text-gray-700">{{ Auth::user()->name }}</span>
                    </div>
                    </a>
                    
                </div>

            @endauth
        </nav>
    </header>

    <div class="bg-[#D678D6]">
        <div class="container mx-auto px-6 py-5 ">
            <form action="{{ route('adopt.post') }}" method="GET">
                <div class="relative max-w-2xl mx-auto bg-white rounded-full shadow-lg">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                    <input
                        type="text"
                        name="q"
                        placeholder="Cari nama, ras, atau deskripsi..."
                        class="w-full py-4 pl-12 pr-4 text-gray-700 rounded-full border-none focus:ring-2 focus:ring-purple-300"
                        value="{{ request('q') }}"
                    >
                </div>
            </form>
        </div>
    </div>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-[#F4F4F4] shadow-outer font-[Montserrat]">
        <div class="container mx-auto px-6 py-20">
            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-100">
                    <div>
                        <h1 class="text-base lg:text-lg font-semibold text-gray-800 mb-4">Butuh bantuan?</h1>
                        <ul class="space-y-3">
                            <li><a href="/adopt/post-adopt" class="text-sm lg:text-base text-[#5E225E] hover:text-[#D678D6] hover:underline transition">Adopt a pet</a></li>
                            <li><a href="/rehomer/formulir" class="text-sm lg:text-base text-[#5E225E] hover:text-[#D678D6] hover:underline transition">Rehome a pet</a></li>
                            <li><a href="/faq-adopt" class="text-sm lg:text-base text-[#5E225E] hover:text-[#D678D6] hover:underline transition">Adopt FAQ's</a></li>
                            <li><a href="/faq-rehome" class="text-sm lg:text-base text-[#5E225E] hover:text-[#D678D6] hover:underline transition">Rehome FAQ's</a></li>
                        </ul>
                    </div>

                    <div>
                        <h1 class="text-base lg:text-lg font-semibold text-gray-800 mb-4">Hubungi kami</h1>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 lg:w-6 lg:h-6 text-[#5E225E] mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm lg:text-base text-[#5E225E]">Jl. Unud 1234, Bali, Indonesia</p>
                            </li>

                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 lg:w-6 lg:h-6 text-[#5E225E] mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm lg:text-base text-[#5E225E]">+62 8123-456-789</p>
                            </li>

                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 lg:w-6 lg:h-6 text-[#5E225E] mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm lg:text-base text-[#5E225E]">AdoptMeSupport@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-[#D678D6]">
            <div class="container mx-auto px-8 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center">

                    <p class="text-sm lg:text-base text-white mb-4 md:mb-0">
                        &copy; {{ date('Y') }} AdoptMe.genk.top
                    </p>

                    <div class="flex items-center space-x-4 lg:space-x-6">
                        <a href="#" class="text-white hover:opacity-75 transition" aria-label="Facebook">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="text-white hover:opacity-75 transition" aria-label="Pinterest">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:opacity-75 transition" aria-label="Tiktok">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:opacity-75 transition" aria-label="Instagram">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:opacity-75 transition" aria-label="YouTube">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.78 22 12 22 12s0 3.22-.42 4.814a2.506 2.506 0 0 1-1.768 1.768c-1.594.42-7.812.42-7.812.42s-6.218 0-7.812-.42a2.506 2.506 0 0 1-1.768-1.768C2 15.22 2 12 2 12s0-3.22.42-4.814a2.506 2.506 0 0 1 1.768-1.768C5.782 5 12 5 12 5s6.218 0 7.812.418zM9.5 15.5V8.5l6.5 3.5-6.5 3.5z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <slot name="scripts"></slot>
</body>
</html>
