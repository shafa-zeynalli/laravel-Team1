@extends('layout.front')

@section('content')
    <div class="accountDashboard">
        <h2>Account</h2>
        <ul>
            <a href="{{route('front.accountDashboard')}}" class="{{ \Illuminate\Support\Facades\Request::is('account/dashboard')?"bg":"" }}">
                <li>Dashboard</li>
            </a>
            <a href="{{route('front.accountOrders')}}" class="{{ \Illuminate\Support\Facades\Request::is('account/orders')?"bg":"" }}">
                <li>Orders</li>
            </a>
            <a href="{{route('front.accountDetails')}}" class="{{ \Illuminate\Support\Facades\Request::is('account/details')?"bg":"" }}">
                <li>Details</li>
            </a>
            <a href="{{route('front.accountLogOut')}}" class="{{ \Illuminate\Support\Facades\Request::is('account/logout')?"bg":"" }}">
                <li>Logout</li>
            </a>


        </ul>
        @yield('account_content')
    </div>
@endsection
