<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form-v6 by Colorlib</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/nunito-font.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="form-v6">
    <div class="page-content">
        <div class="form-v6-content">
            <div class="form-left">
                <img src="images/club_student.png" alt="form">
            </div>
            <form class="form-detail" method="POST" action="{{ route('login') }}">
                @csrf
                <h2>Register Form</h2>
                <!-- email -->

                <div class="form-row">
                    <input type="text" name="email" id="email" class="input-text" placeholder="Email Address" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <!-- password -->
                <div class="form-row">
                    <input type="password" name="password" id="password" class="input-text" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                    @endif
                    <button type="submit">Log in</button>
                </div>
            </form>
        </div>
    </div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

