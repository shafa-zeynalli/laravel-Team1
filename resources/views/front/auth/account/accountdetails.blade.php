@extends('front.auth.account.index')

@section('account_content')
    <form action="{{route('front.updatePassword')}}" method="post">
        @csrf
        <h3>Details</h3>

        <label for="">Email*
            <input type="text" name="email"  value="{{old('email')}}">
            @error('email')
            <span class="errMessage">{{ $message }}</span>
            @enderror
        </label>

        <h3>Password Change</h3>

        <label for="">Current Password*
            <input type="text" name="current_password" value="{{old('current_password')}}">
            @error('current_password')
            <span class="errMessage">{{ $message }}</span>
            @enderror
        </label>

        <label for="">New Password*
            <input type="text" name="password" value="{{old('password')}}">
            @error('password')
            <span class="errMessage">{{ $message }}</span>
            @enderror
        </label>

        <label for="">Confirm New Password*
            <input type="text" name="password_confirmation" value="{{old('password_confirmation')}}">
            @error('password_confirmation')
            <span class="errMessage">{{ $message }}</span>
            @enderror
        </label>

        <button type="submit">Save Changes</button>
    </form>
@endsection
