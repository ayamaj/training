<div class="mb-4 text-sm text-gray-600">
    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
</div>

<!-- Session Status -->
@if (session('status'))
    <div class="mb-4 text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <label for="email" class="block mb-1">Email</label>
        <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
            Email Password Reset Link
        </button>
    </div>
</form>

