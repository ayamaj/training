<form method="POST" action="{{ route('password.store') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email Address -->
    <div>
        <label for="email" class="block mb-1">Email</label>
        <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
        @error('email')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div class="mt-4">
        <label for="password" class="block mb-1">Password</label>
        <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
        @error('password')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <label for="password_confirmation" class="block mb-1">Confirm Password</label>
        <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
        @error('password_confirmation')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Reset Password</button>
    </div>
</form>
