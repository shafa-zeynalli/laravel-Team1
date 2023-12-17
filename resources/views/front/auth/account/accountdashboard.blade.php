@extends('front.auth.account.index')

@section('account_content')
    <p>Hello Vitatheme (not Vitatheme? <span> <a href="{{route('front.accountLogOut')}}">Log out</a></span>)</p>
    <p>From your account dashboard you can view your <span> <a href="{{route('front.accountOrders')}}">recent orders </a> </span>and edit your <span>
            <a href="{{route('front.accountDetails')}}">password and account details</a></span>.</p>
@endsection
