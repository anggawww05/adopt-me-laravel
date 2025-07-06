@props(['active' => 'profile'])

@php
    $menus = [
        'profile' => [
            'label' => 'Profile',
            'tabs' => ['profile'],
        ],
        'account-adopt' => [
            'label' => 'Adopt',
            'tabs' => ['account-adopt'],
        ],
        'account-rehome' => [
            'label' => 'Rehome',
            'tabs' => ['account-rehome', 'rehome', 'rehome-detail'],
        ],
        'history' => [
            'label' => 'Riwayat',
            'tabs' => ['history'],
        ],
        'help' => [
            'label' => 'Bantuan',
            'tabs' => ['help'],
        ],
        'change-password' => [
            'label' => 'Ganti Sandi',
            'tabs' => ['change-password'],
        ],
    ];
@endphp

<aside class="w-full lg:w-64 bg-white rounded-xl shadow p-4">
    <ul class="space-y-2">
        @foreach($menus as $key => $menu)
            <li>
                <a 
                    href="{{ route('account', ['tab' => $menu['tabs'][0]]) }}"
                    class="flex items-center gap-2 px-4 py-2 rounded-lg 
                        {{ in_array($active, $menu['tabs']) ? 'bg-purple-200 text-purple-800 font-semibold' : 'hover:bg-purple-50 text-gray-700' }}"
                >
                    <span class="capitalize">{{ $menu['label'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</aside>