@extends('admin.main-admin')

@section('container')
    <div class="ml-64 p-6 bg-gray-50 min-h-screen">
        <div class="mb-4">
            <a href="{{ route('admin.pengguna') }}" class="inline-flex items-center px-4 py-1 bg-[#D678D6] hover:bg-[#b85bb8] text-white rounded transition">
                &larr; Kembali
            </a>
        </div>
        <div class="flex justify-center">
            <div class="w-screen bg-white border border-gray-300 rounded-2xl shadow p-8 flex">
                <div class="w-80 h-80 flex items-center justify-center bg-gray-300 mr-10">
                    <img src="{{ asset('storage/' . $user->picture_profile) }}" alt="Profile Picture"
                        class="w-80 h-80  rounded-xl object-cover">
                </div>
                <div class="flex-1 space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Nama</label>
                        <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $user->name }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Email</label>
                        <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $user->email }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Alamat</label>
                        <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $user->address ?? 'belum ditambahkan' }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Nomor Telepon</label>
                        <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">{{ $user->phone ?? 'belum ditambahkan' }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Role</label>
                        <div class="w-full h-10 border border-gray-200 rounded px-3 py-2 bg-gray-100">
                            {{ $user->role->permission }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
