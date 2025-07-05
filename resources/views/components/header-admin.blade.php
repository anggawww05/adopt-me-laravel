<header class="bg-white  border border-y-gray-300">
    <div class="container mx-auto flex items-center justify-between py-4 px-6 sb">
        @if (Route::is('admin.dashboard'))
            <h1 class="ml-64 text-20px font-semibold">Dashboard</h1>
        @elseif(Route::is('admin.pengguna'))
            <h1 class="ml-64 text-20px font-semibold">Kelola Pengguna</h1>
        @elseif(Route::is('admin.pengguna.view'))
            <h1 class="ml-64 text-20px font-semibold">Kelola Pengguna/Detail Pengguna</h1>
        @elseif(Route::is('admin.pengguna.edit'))
            <h1 class="ml-64 text-20px font-semibold">Kelola Pengguna/Edit Pengguna</h1>
        @elseif(Route::is('admin.postingan'))
            <h1 class="ml-64 text-20px font-semibold">Kelola Postingan</h1>
        @elseif(Route::is('admin.postingan.view'))
            <h1 class="ml-64 text-20px font-semibold">Kelola Postingan/Detail Postingan</h1>
        @elseif(Route::is('admin.postingan.view.edit'))
            <h1 class="ml-64 text-20px font-semibold">Kelola Postingan/Edit Postingan</h1>
        @endif
        <a href="#" class="text-[14px]">
            Admin Dashboard
        </a>
    </div>
</header>
