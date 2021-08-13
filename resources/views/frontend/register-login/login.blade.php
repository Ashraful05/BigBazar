@extends('frontend.master')
@section('title','Customer Login Page')
@section('content')

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px;border-radius: 20px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign In</div>

                        <form action="{{ route('login') }}" method="post" id="contact_form">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Or Phone Number</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" name="btn" class="btn btn-info">LogIn</button>
                            </div>
                        </form>
                        <br>
                        <button type="submit" class="btn btn-danger"><a href="{{ route('password.request') }}" class="text-white">I forgot my password</a></button>
                        <br>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit"><i class="fab fa-facebook-square"></i>  LogIn With Facebook</button>
                        <br>
                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block" type="submit"><i class="fab fa-google"></i>  LogIn With Google</a>


                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px;border-radius: 20px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign Up</div>

                        <form action="{{route('register')}}" method="post" id="contact_form">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" class="form-control"  name="name" placeholder="Enter your Full Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your Email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Retype your Password" required>
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" name="btn" class="btn btn-info">Register</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

@endsection
