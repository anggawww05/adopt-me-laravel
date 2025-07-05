@extends('admin.main-admin')

@section('container')
    <div class="ml-64 p-6 bg-gray-50 min-h-screen">
        <div class="mb-4">
            <a href="{{ route('admin.pengguna') }}"
                class="inline-flex items-center px-4 py-1 bg-[#D678D6] hover:bg-[#b85bb8] text-white rounded transition">
                &larr; Kembali
            </a>
        </div>
        <div class="flex justify-center">
            <div class="w-screen bg-white border border-gray-300 rounded-2xl shadow p-8 flex">
                <!-- Profile Picture -->
                <div class="w-80 h-80 flex items-center justify-center bg-gray-300 mr-10">
                    <img src="{{ asset('storage/' . $user->picture_profile) }}" alt="Profile Picture"
                        class="w-80 h-80  rounded-xl object-cover">
                </div>
                <!-- User Info Form -->
                <form action="{{ route('admin.pengguna.edit.post', $user->id) }}" method="POST"
                    enctype="multipart/form-data" class="flex-1 space-y-4">
                    @csrf
                    @method('POST')
                    <div>
                        <label class="block text-sm font-medium">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100 focus:bg-white focus:border-[#D678D6] focus:outline-none"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100 focus:bg-white focus:border-[#D678D6] focus:outline-none"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Alamat</label>
                        <input type="text" name="address" value="{{ old('address', $user->address) }}"
                            class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100 focus:bg-white focus:border-[#D678D6] focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Nomor Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100 focus:bg-white focus:border-[#D678D6] focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Role</label>
                        <select name="role_id"
                            class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100 focus:bg-white focus:border-[#D678D6] focus:outline-none"
                            required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->permission }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Foto Profil</label>
                        <input type="file" name="picture_profile"
                            class="w-full border border-gray-200 rounded px-3 py-2 bg-gray-100 focus:bg-white focus:border-[#D678D6] focus:outline-none">
                        @if ($user->picture_profile)
                            <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto.</p>
                        @endif
                    </div>
                    <div>
                        <button type="submit"
                            class="px-6 py-2 bg-[#D678D6] hover:bg-[#b85bb8] text-white rounded transition">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
