@php
    $adoptionHistories = $adoptionHistories ?? collect();
@endphp

<h2 class="text-2xl font-bold text-gray-800 mb-6">Permintaan Adopsi Anda</h2>

@forelse ($adoptionHistories as $history)
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        {{-- Pesan status --}}
        <div class="mb-4">
            @if ($history->status === 'accepted')
                <p class="text-green-700 font-medium">
                    Permintaan anda untuk mengadopsi <strong>"{{ $history->pet->name }}"</strong> telah <strong>diterima</strong>.<br>
                    Kami perlu membuat janji temu untuk mengenal {{ $history->pet->name }} dan pemeriksaan medis.
                </p>
            @elseif ($history->status === 'rejected')
                <p class="text-red-700 font-medium">
                    Maaf, permintaan anda untuk mengadopsi <strong>"{{ $history->pet->name }}"</strong> telah ditolak.
                </p>
            @else
                <p class="text-gray-600">Permintaan adopsi untuk <strong>{{ $history->pet->name }}</strong> masih menunggu konfirmasi dari pemilik.</p>
            @endif
        </div>

        {{-- Info hewan --}}
        <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
            <div class="flex items-center gap-4">
                <img src="{{ asset('storage/' . $history->pet->picture1) }}" alt="{{ $history->pet->name }}"
                     class="w-20 h-20 object-cover rounded-md"
                     onerror="this.onerror=null;this.src='https://placehold.co/100x100?text=No+Image';">
                <div>
                    <p class="text-sm text-gray-700"><strong>Pet ID:</strong> {{ $history->pet->id }}</p>
                    <p class="text-sm text-gray-700"><strong>Breed:</strong> {{ $history->pet->breed }}</p>
                    <p class="text-sm text-gray-700"><strong>Gender:</strong> {{ ucfirst($history->pet->gender) }}</p>
                    <p class="text-sm text-gray-700"><strong>Umur:</strong> {{ $history->pet->age }} Tahun</p>
                </div>
            </div>

            {{-- Janji temu --}}
            @if ($history->status === 'accepted')
                <div class="ml-auto w-full md:w-1/2">
                    @if ($history->appointment_date && $history->appointment_time)
                        {{-- Sudah dijadwalkan --}}
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-700 mb-2">Janji Temu Telah Dijadwalkan</h4>
                            <p class="text-sm text-gray-700">
                                Tanggal: <strong>{{ \Carbon\Carbon::parse($history->appointment_date)->translatedFormat('l, d F Y') }}</strong><br>
                                Waktu: <strong>{{ \Carbon\Carbon::parse($history->appointment_time)->format('H:i') }}</strong>
                            </p>
                        </div>
                    @else
                        {{-- Form janji temu --}}
                        <form method="POST" action="{{ route('account.appointment.store', $history->id) }}" class="bg-gray-50 rounded-lg p-4 border">
                            @csrf
                            <h4 class="font-semibold mb-3">Pilih waktu untuk janji temu</h4>

                            <div class="mb-3">
                                <label class="block text-sm text-gray-700 mb-1">Tanggal</label>
                                <input type="date" name="appointment_date" required
                                       class="w-full border rounded px-3 py-2">
                            </div>
                            <div class="mb-3">
                                <label class="block text-sm text-gray-700 mb-1">Waktu</label>
                                <input type="time" name="appointment_time" required
                                       class="w-full border rounded px-3 py-2">
                            </div>

                            <div class="flex gap-2 justify-end mt-4">
                                <button type="submit"
                                        class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded">
                                    Simpan Janji
                                </button>
                                <button type="reset"
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded">
                                    Batal
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>
@empty
    <p class="text-gray-600">Belum ada permintaan adopsi yang diajukan.</p>
@endforelse