<h2 class="text-2xl font-bold text-gray-800 mb-6">Ganti Kata Sandi</h2>

@if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('account.changePassword') }}" class="max-w-md space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Lama</label>
        <input type="password" name="current_password" required
               class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Baru</label>
        <input type="password" name="new_password" required
               class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi Baru</label>
        <input type="password" name="new_password_confirmation" required
               class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
    </div>

    <div>
        <button type="submit"
                class="bg-purple-400 hover:bg-purple-500 text-white px-6 py-2 rounded font-semibold transition">
            Reset Sandi
        </button>
    </div>
</form>