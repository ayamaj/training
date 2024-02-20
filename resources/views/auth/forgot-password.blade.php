<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 100px;
        padding: 0;
        text-align: center;
    }

    .container {
        max-width: 400px;
        margin: 0px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="email"] {
        width: 30%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 5px;
    }

    button[type="submit"] {
        background-color: #ad2450c2;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        text-align: center;
        margin: 30px;
    }

    button[type="submit"]:hover {
        background-color: #aa4d91;
    }

    .error-message {
        color: red;
    }
</style>

<body>

    <div>
        <div>
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" >{{ __('Email Password Reset Link') }}</button>
            </div>
        </form>
    </div>
<style>

</style>
</body>
</html>

