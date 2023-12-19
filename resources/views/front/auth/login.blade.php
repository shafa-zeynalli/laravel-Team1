@extends('layout.front')

@section('content')
    <div class="login">
        <div class="welcome">
            @if(session('success'))
                <span class="successMessage">
                    {{ session('success') }}
                </span>
            @endif
            <h2>Welcome back</h2>
            <p>Enter your email and password to sign in to the website.</p>
            <p>Not signed up yet? <a href="{{route('front.signup')}}">Sign up</a></p>
        </div>

        <div class="inputs" >


            <form action="{{route('front.login')}}" method="post">
                @csrf
                <label for="email" >Email Address
                    <input type="text" name="email" value="{{old('email')}}">
                    @error('email')
                    <span class="errMessage">{{$message}}</span>
                    @enderror
                </label>

                <label for="password">Password
                    <input type="text" name="password" value="">
                    @error('password')
                    <span class="errMessage">{{$message}}</span>
                    @enderror
                </label>

                <label class="checkbox">
                    <input type="checkbox">
                    <p> Keep me logged in </p>
                </label>

                <button type="submit">Sign in</button>
            </form>
        </div>
    </div>
@endsection
