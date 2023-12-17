@extends('front.auth.account.index')

@section('account_content')
    <p>Do you want to exit the page?</p>

    <a href="{{route('front.logOut')}}">
        <button type="submit">Log out</button>
    </a>
@endsection
