@extends('front.auth.account.index')

@section('account_content')
    <form action="AccountDetails.php" method="post">
        <h3>Details</h3>

        <label for="">Email*
            <input type="text" name="email" >
        </label>

        <h3>Password Change</h3>

        <label for="">Current Password*
            <input type="text" name="cPass">
        </label>

        <label for="">New Password*
            <input type="text" name="nPass">
        </label>

        <label for="">Confirm New Password*
            <input type="text" name="cnPass">
        </label>

        <button type="submit">Save Changes</button>
    </form>
@endsection
