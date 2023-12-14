@extends('layout.front')

@section('content')
<div class="login register">
    <div class="welcome">
        <h2>Register an Account</h2>
        <p>Welcome to the Notation</p>
        <p>Already have an account? <a href="Login.php">Sign in</a></p>
    </div>

    <div class="inputs">
        <form action="Register.php" method="post">
            <label for="fName">Email Address
                <input type="text" name="email">
            </label>
            <label for="lName">Password
                <input type="text" name="password">
            </label>

            <button type="submit">Sign up</button>
        </form>
        <p>By creating an account, you agree to the <span> Terms of Use</span> and <span>Privacy Policy</span>.
        </p>



    </div>



</div>

@endsection
