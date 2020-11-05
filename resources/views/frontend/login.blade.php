@extends('frontendtemplate')

@section('content')

<div class="container my-5">
	<div class="row justify-content-center">		
		<div class="col-5">
			{{-- <h1 class="my-4">Login</h1> --}}
			{{-- <form action="signin.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label class="small mb-1" for="inputEmailAddress">Email</label>
					<input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" />
				</div>

				<div class="form-group">
					<label class="small mb-1" for="inputPassword">Password</label>
					<input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
				</div>

				<div class="form-group">
					<div class="custom-control custom-checkbox">
						<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
						<label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
					</div>

					<a class="small" href="#">Forgot Password?</a>

				</div>

				<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
					<button type="submit" class="btn btn-secondary mainfullbtncolor btn-block">Login</button>
				</div>
			</form> --}}
			<form method="POST" action="{{ route('login') }}">
				@csrf

				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

					<div class="col-md-6">
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

					<div class="col-md-6">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-6 offset-md-4">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

							<label class="form-check-label" for="remember">
								{{ __('Remember Me') }}
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-8 offset-md-4">
						<button type="submit" class="btn btn-primary">
							{{ __('Login') }}
						</button>

						@if (Route::has('password.request'))
						<a class="btn btn-link" href="{{ route('password.request') }}">
							{{ __('Forgot Your Password?') }}
						</a>
						@endif
					</div>
				</div>
			</form>
			<div class=" mt-3 text-center ">
				<a href="register.php" class="loginLink text-decoration-none">Need an account? Sign Up!</a>
			</div>
		</div>
	</div>
</div>
@endsection