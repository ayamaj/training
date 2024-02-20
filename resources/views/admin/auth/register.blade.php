<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <label for="name" class="block mb-1">Name</label>
        <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
        @error('name')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <label for="email" class="block mb-1">Email</label>
        <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
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
        <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Already registered?</a>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600 ms-4">Register</button>
    </div>
</form>
