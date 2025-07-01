@props(['active' => 'profile'])

@php
    $menus = [
        'profile' => 'Profile',
        'account-adopt' => 'Adopt',
        'account-rehome' => 'Rehome',
        'history' => 'Riwayat',
        'help' => 'Bantuan',
        'change-password' => 'Reset Sandi',
    ];
@endphp

<aside class="w-full lg:w-64 bg-white rounded-xl shadow p-4">
    <ul class="space-y-2">
        @foreach($menus as $key => $label)
            <li>
                <a 
                    href="{{ route('account', ['tab' => $key]) }}"
                    class="flex items-center gap-2 px-4 py-2 rounded-lg 
                        {{ $active === $key ? 'bg-purple-200 text-purple-800 font-semibold' : 'hover:bg-purple-50 text-gray-700' }}"
                >
                    <span class="capitalize">{{ $label }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</aside>