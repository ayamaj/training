

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
			<form class="form-detail" action="#" method="post">
				<h2>Register Form</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                <!-- name  -->
				<div class="form-row">
					<input type="text" name="name" id="name" class="input-text" placeholder="Your Name" value="{{ old('name') }}" required  autocomplete="name" >
                    @error('name')
                   <span>{{ $message }}</span>
                   @enderror
				</div>
                <!-- email -->
				<div class="form-row">
					<input type="text" name="email" id="your-email" class="input-text" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                    <span>{{ $message }}</span>
                @enderror
				</div>
                <!-- password -->
				<div class="form-row">
					<input type="password" name="password" id="password" class="input-text" placeholder="Password" required autocomplete="new-password">
				</div>
                <!-- confirm parrword -->
				<div class="form-row">
					<input type="password" name="password_confirmation" id="comfirm-password" class="input-text" placeholder="Comfirm Password" required autocomplete="new-password">
                    @error('password_confirmation')
                    <span>{{ $message }}</span>
                @enderror
				</div>
                <!--submit -->
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                    <button class="button">
                        <span class="ms-4">{{ __('Register') }}</span>
                      </button>
                </div>
			</form>
		</div>
	</div>
    <style>
        .button {
  position: relative;
  overflow: hidden;
  height: 3rem;
  padding: 0 2rem;
  border-radius: 1.5rem;
  background: #3d3a4e;
  background-size: 400%;
  color: #fff;
  border: none;
  cursor: pointer;
  left: -50px;
  right: 20px;
  bottom: 20%;
  top: 60px;

}

.button:hover::before {
  transform: scaleX(1);
}

.button-content {
  position: relative;
  z-index: 1;
}

.button::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  transform: scaleX(0);
  transform-origin: 0 50%;
  width: 100%;
  height: inherit;
  border-radius: inherit;
  background: linear-gradient(
    82.3deg,
    rgba(150, 93, 233, 1) 10.8%,
    rgba(99, 88, 238, 1) 94.3%
  );
  transition: all 0.475s;
}

    </style>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


