@extends('layout.front')

@section('content')
<div class="login register">
    <div class="welcome">
        <h2>Register an Account</h2>
        <p>Welcome to the Notation</p>
        <p>Already have an account? <a href="{{route('front.login')}}">Sign in</a></p>
    </div>

    <div class="inputs">
        <form action="{{route('front.signup')}}" method="post">
            @csrf

            <label for="email">Email Address
{{--                <input type="text" name="email" id="email" value="{{request()->get('email')}}">--}}
                <input type="text" name="email" id="email" value="{{old('email')}}">
                @error('email')
                <span class="errMessage">{{$message}}</span>
                @enderror
            </label>

            <label for="password">Password
                <input type="password" name="password" id="password">
                @error('password')
                <span class="errMessage">{{$message}}</span>
                @enderror
            </label>

            <label for="password_confirmation">Password Confirmation
                <input type="password" name="password_confirmation" id="password_confirmation" >
                @error('password_confirmation')
                <span class="errMessage">{{$message}}</span>
                @enderror
            </label>

            <button type="submit">Sign up</button>
        </form>
        <p>By creating an account, you agree to the <span> Terms of Use</span> and <span>Privacy Policy</span>.
        </p>



    </div>



</div>

@endsection
