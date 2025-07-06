<x-layout title="Verify Your Email">
    <div class="container mx-auto py-16 px-4 text-center max-w-2xl">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-xl font-bold mb-4">Verify Your Email Address</h1>

            @if (session('message'))
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 p-3 rounded-lg">
                    A fresh verification link has been sent to your email address.
                </div>
            @endif

            <p class="text-gray-600 mb-4">
                Before proceeding, please check your email for a verification link.
            </p>
            <p class="text-gray-600">
                If you did not receive the email, you can request another.
            </p>

            <form class="inline-block mt-4" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full bg-purple-600 text-white py-2 px-6 rounded-lg hover:bg-purple-700">
                    Resend Verification Email
                </button>
            </form>
        </div>
    </div>
</x-layout>