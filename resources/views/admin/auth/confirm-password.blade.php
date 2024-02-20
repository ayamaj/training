<div class="mb-4 text-sm text-gray-600">
    This is a secure area of the application. Please confirm your password before continuing.
</div>

<form method="POST" action="/password/confirm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <!-- Password -->
    <div>
        <label for="password" class="block mb-1">Password</label>
        <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password">
        @if ($errors->has('password'))
            <span class="text-sm text-red-500">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div class="flex justify-end mt-4">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
            Confirm
        </button>
    </div>
</form>

