<div>
    <div>
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" />
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit">{{ __('Confirm') }}</button>
        </div>
    </form>
</div>

