<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-[#D678D6]">
        <img src="{{ asset('storage/assets/logo-admin.png') }}" class="w-[600px] h-auto mx-auto mb-1" alt="logo admin">
        <ul class="space-y-2 font-medium mt-5">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 rounded-lg transition-colors
                        {{ Route::is('admin.dashboard') ? 'bg-white text-black' : 'text-white hover:text-black hover:bg-white group' }}
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2"
                        class="size-6 transition-colors
                            {{ Route::is('admin.dashboard') ? 'text-black' : 'text-white group-hover:text-black' }}">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengguna') }}"
                    class="flex items-center p-2 rounded-lg transition-colors
                        {{ Route::is('admin.pengguna') || Route::is('admin.pengguna.create') || Route::is('admin.pengguna.view') || Route::is('admin.pengguna.edit') ? 'bg-white text-black' : 'text-white hover:text-black hover:bg-white group' }}
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        class="size-6 transition-colors
                            {{ Route::is('admin.pengguna') || Route::is('admin.pengguna.create') || Route::is('admin.pengguna.view') || Route::is('admin.pengguna.edit') ? 'text-black' : 'text-white group-hover:text-black' }}"
                        viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M4 20c0-4 8-4 8-4s8 0 8 4" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Pengguna</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.postingan') }}"
                    class="flex items-center p-2 rounded-lg transition-colors
                        {{ Route::is('admin.postingan') || Route::is('admin.postingan.view') || Route::is('admin.postingan.view.edit') ? 'bg-white text-black' : 'text-white hover:text-black hover:bg-white group' }}
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        class="size-6 transition-colors
                            {{ Route::is('admin.postingan') || Route::is('admin.postingan.view') || Route::is('admin.postingan.view.edit') ? 'text-black' : 'text-white group-hover:text-black' }}"
                        viewBox="0 0 24 24">
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <path d="M3 7h18M7 3v4M17 3v4" />
                        <line x1="8" y1="13" x2="16" y2="13" />
                        <line x1="8" y1="17" x2="14" y2="17" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Postingan</span>
                </a>
            </li>
        </ul>
        <div class="mt-[420px]">
            <form action="{{route('admin.logout')}}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center text-white hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" class="size-6 mr-2" viewBox="0 0 24 24">
                        <path d="M16 17l5-5-5-5" />
                        <path d="M21 12H9" />
                        <path d="M12 19v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5a2 2 0 0 1 2 2v2" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>

</aside>
