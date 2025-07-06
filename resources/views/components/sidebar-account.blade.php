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
            'tabs' => ['account-rehome', 'rehome-detail'],
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
    <ul class="space-y-4">
        @foreach ($menus as $key => $menu)
            @php
                $isActive = in_array($active, $menu['tabs']);
                $iconFile = $key . ($isActive ? '-active' : '') . '.png';
            @endphp

            <li>
                <a 
                    href="{{ route('account', ['tab' => $menu['tabs'][0]]) }}"
                    class="flex justify-between items-center px-4 py-3 rounded-r-full transition 
                        {{ $isActive ? 'bg-[#D678D6] text-white font-bold' : 'hover:bg-purple-50 text-purple-900' }}">

                    <!-- Label -->
                    <span class="capitalize">{{ $menu['label'] }}</span>

                    <!-- Icon -->
                    <span class="w-10 h-10 flex items-center justify-center rounded-full border-4 
                        {{ $isActive ? 'border-white bg-[#5A2B74]' : 'border-purple-200' }}">
                        
                        <img 
                            src="{{ asset('images/' . $iconFile) }}" 
                            alt="{{ $menu['label'] }} icon" 
                            class="w-5 h-5 object-contain"
                        />
                    </span>

                </a>
            </li>
        @endforeach
    </ul>
</aside>