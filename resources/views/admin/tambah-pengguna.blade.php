@extends('admin.main-admin')

@section('container')
    <div class="ml-64 p-8 bg-gray-50 min-h-screen ">
        <h2 class="text-2xl font-bold mb-8 text-gray-800">Tambah Pengguna</h2>
        <form action="#" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-8 w-full">
            @csrf
            <div class="mb-5">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" id="name" name="name" required>
            </div>
            <div class="mb-5">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" id="email" name="email" required>
            </div>
            <div class="mb-5">
                <label for="password" class="block text-gray-700 font-medium mb-2">Kata Sandi</label>
                <input type="password" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" id="password" name="password" required>
            </div>
            <div class="mb-5">
                <label for="phone" class="block text-gray-700 font-medium mb-2">Telepon</label>
                <input type="text" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" id="phone" name="phone" required>
            </div>
            <div class="mb-5">
                <label for="address" class="block text-gray-700 font-medium mb-2">Alamat</label>
                <textarea class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" id="address" name="address" rows="2" required></textarea>
            </div>
            <div class="mb-5">
                <label for="picture_profile" class="block text-gray-700 font-medium mb-2">Foto Profil</label>
                <input type="file" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" id="picture_profile" name="picture_profile" accept="image/*">
            </div>
            <div class="mb-8">
                <label for="role_id" class="block text-gray-700 font-medium mb-2">Role</label>
                <select class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" id="role_id" name="role_id" required>
                    <option value="">Pilih Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->permission}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition duration-200">Simpan</button>
        </form>
    </div>
@endsection
