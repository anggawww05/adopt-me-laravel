<x-layout title="Akun Saya">
    <div class="flex flex-col lg:flex-row gap-6 p-6">
        {{-- Sidebar --}}
        @include('components.sidebar-account', ['active' => $tab])

        {{-- Konten dinamis --}}
        <div class="flex-1 bg-white rounded-xl shadow p-6">
            @includeIf('account.' . $tab, ['tab' => $tab])
        </div>
    </div>
</x-layout>