@extends('layout.front')

@section('content')
    <div class="login">
        <div class="welcome">
            <h2>Welcome back</h2>
            <p>Enter your email and password to sign in to the website.</p>
            <p>Not signed up yet? <a href="Register.php">Sign up</a></p>
        </div>

        <div class="inputs" >
            <form action="Login.php" method="post">
                <label for="fName" >Email Address
                    <input type="text" name="email">
                </label>
                <label for="lName">Password
                    <input type="text" name="password" value="">
                </label>

                <label class="checkbox">
                    <input type="checkbox" name="checkbox">
                    <p> Keep me logged in </p>
                </label>

                <button type="submit">Sign in</button>
            </form>
{{--            <?php--}}
{{--            $email = $_POST['email'] ?? '';--}}
{{--            $pass = $_POST['password'] ?? '';--}}
{{--            $checkbox= $_POST['checkbox'] ?? '';--}}

{{--            $db = new Database();--}}
{{--            $result = $db->select('*')->table('users')->andWhere([['email', '=', $email], ['password', '=', $pass],])->fetchAll();--}}
{{--//        echo '<pre>';--}}
{{--            $arr = $result->fetch_assoc();--}}
{{--//        print_r($arr);--}}

{{--            if ($email && $pass && $checkbox){--}}
{{--                if (empty($arr)){--}}
{{--//                $add = $db->into()->table('users')->keys(['email', 'password'])->vals([$email, $pass ])->fetchAll();--}}
{{--                    echo'<div class="errMessage">istifadeci adi ve ya sifre yalnisdi</div>';--}}
{{--                }else{--}}

{{--//                    echo $val;--}}
{{--                    $_SESSION['userId']=$arr['user_id'];--}}

{{--                    echo '<div class="errMessage">Tebrikler hesaba giris etdiniz</div>';--}}
{{--                    header("Location: index.php");--}}
{{--                    exit();--}}
{{--                }--}}
{{--            }--}}
{{--//                    echo  $_SESSION['userId']?? 0;--}}
{{--            ?>--}}
        </div>
    </div>
@endsection
