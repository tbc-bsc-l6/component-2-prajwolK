<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white rounded-lg shadow-md p-6 w-full max-w-sm">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-4">Forgot Password</h1>
            <p class="text-center text-sm text-gray-500 mb-6">Enter your email to receive a reset link.</p>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500">
                </div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition duration-150">
                    Send Password Reset Link
                </button>
            </form>

            <p class="mt-4 text-center text-sm text-gray-500">
                Remember your password? <a href="{{ route('login') }}" class="text-orange-600 hover:underline">Log in</a>
            </p>
        </div>
    </div>
</x-guest-layout>
