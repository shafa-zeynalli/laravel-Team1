@extends('layout.front')

@section('content')
    <div class="accountDashboard">
        <h2>Account</h2>
        <ul>
            <a href="AccountDashboard.php"
                >
                <li>Dashboard</li>
            </a>
            <a href="AccountOrders.php"
                >
                <li>Orders</li>
            </a>
            <a href="AccountDetails.php"
            >
                <li>Details</li>
            </a>
            <a href="AccountLogOut.php" class="bg"

            >
                <li>Logout</li>
            </a>


        </ul>
            @yield('account_content')
    </div>
@endsection
