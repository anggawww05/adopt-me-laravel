@extends('admin.main-admin')

@section('container')
    <div class="ml-64 p-6 bg-gray-50 min-h-screen">
        <!-- Header Section -->
        <div class="mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Selamat datang, Admin!</h1>
                <p class="text-gray-600 mt-1">Berikut beberapa informasi pada dashboard</p>
            </div>
            <div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                        <span class="text-2xl font-bold text-blue-600">{{ $users }}</span>
                        <span class="text-gray-700 mt-2">Total Users</span>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                        <span class="text-2xl font-bold text-green-600">{{ $pets }}</span>
                        <span class="text-gray-700 mt-2">Total Pets</span>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                        <span class="text-2xl font-bold text-yellow-600">{{ $availablePets }}</span>
                        <span class="text-gray-700 mt-2">Available Pets</span>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                        <span class="text-2xl font-bold text-purple-600">{{ $adoptedPets }}</span>
                        <span class="text-gray-700 mt-2">Adopted Pets</span>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                        <span class="text-2xl font-bold text-pink-600">{{ $rehomedPets }}</span>
                        <span class="text-gray-700 mt-2">Rehomed Pets</span>
                    </div>
                </div>
            </div>
        </div>



    <!-- Alpine.js untuk dropdown -->
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
@endsection
