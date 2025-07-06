@php
    $adoptionHistories = $adoptionHistories ?? collect();
@endphp

<h2 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Adopsi Anda</h2>

<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="min-w-full text-left text-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3">Nama Hewan</th>
                <th class="px-4 py-3">Pet ID</th>
                <th class="px-4 py-3">Tanggal Permintaan</th>
                <th class="px-4 py-3">Review</th>
                <th class="px-4 py-3">Status</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($adoptionHistories as $history)
                <tr class="border-t">
                    <td class="px-4 py-3 flex items-center gap-2">
                        <img src="{{ asset('storage/' . ($history->pet->picture1 ?? 'default.jpg')) }}"
                             alt="{{ $history->pet->name }}"
                             class="w-8 h-8 object-cover rounded-full"
                             onerror="this.onerror=null;this.src='https://placehold.co/40x40?text=🐾';">
                        {{ $history->pet->name }}
                    </td>
                    <td class="px-4 py-3">{{ $history->pet->id }}</td>
                    <td class="px-4 py-3">{{ $history->created_at->format('M d') }}</td>
                    <td class="px-4 py-3">
                        <button
                            @click="selectedAdoption = @json($history); openModal = true"
                            class="text-blue-600 hover:underline text-sm">
                            Review
                        </button>
                    </td>
                    <td class="px-4 py-3">
                        @if ($history->status === 'pending')
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 text-xs rounded">Menunggu</span>
                        @elseif ($history->status === 'accepted')
                            <span class="bg-green-100 text-green-700 px-3 py-1 text-xs rounded">Diterima</span>
                        @elseif ($history->status === 'rejected')
                            <span class="bg-red-100 text-red-700 px-3 py-1 text-xs rounded">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">Belum ada riwayat adopsi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>