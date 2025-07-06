<x-layout title="Akun Saya">

    <div class="flex flex-col lg:flex-row gap-6 p-6">
        {{-- Sidebar --}}
        @include('components.sidebar-account', ['active' => $tab])

        {{-- Konten dinamis berdasarkan tab --}}
        <div class="flex-1 bg-white p-6">
            @includeIf('account.' . $tab, [
                'tab' => $tab,
                'searchHistories' => $searchHistories ?? [],
                'pets' => $pets ?? collect(),
                'selectedPet' => $selectedPet ?? null,
                'adoptionRequests' => $adoptionRequests ?? collect(),
                'adoptionHistories' => $adoptionHistories ?? collect(),
            ])
        </div>
    </div>
</x-layout>