@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>

                    <div class="card-body">
                        @isset($url)
                            <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                                @else
                                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                        @endisset
                                        @csrf
                                        <div class="form-group icon_parent">
                                            <label for="email">E-mail</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                            <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group icon_parent">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="chech_container">Remember me
                                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <a class="registration" href="{{route('register')}}">Create new account</a><br>
                                            <a href="{{ route('password.request') }}" class="text-white">I forgot my password</a>
                                            <button type="submit" class="btn btn-blue">Login</button>
                                        </div>
                                    </form>
                                    <div class="footer">
                                        <p>Copyright &copy; 2020 <a href="https://easylearningbd.com/">easy Learning</a>. All rights reserved.</p>
                                    </div>

                    </div>
                </div>
            </div><!--/ content wrapper -->
        </div>
    </div><!--/ wrapper -->
@endsection
