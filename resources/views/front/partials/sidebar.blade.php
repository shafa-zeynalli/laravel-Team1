<div class="sideBar">
    <div class="logo mb-50">
        <div><p>N</p></div>
        <span>WP-Notes</span>
    </div>
    <div class="inputSB">

        <form action="SearchShop.php" method="post">
            <input type="text" placeholder="Search" name="search">
            <button type="submit"> Search</button>
        </form>

        <i class="fa-solid fa-magnifying-glass"></i>
    </div>

    <ul class="ulSB">
        <li <?php if (str_contains($_SERVER['PHP_SELF'], 'index.php')) echo 'style="border-left: 3px solid #EC7160;"'; ?>>
            <a href="index.php">Blog</a></li>
        <li <?php if (str_contains($_SERVER['PHP_SELF'], 'Cart.php')) echo 'style="border-left: 3px solid #EC7160;"'; ?> >
            <a href="Cart.php">Cart
                {{--                    (<?php echo $arrCount[0]['count'] ?>)--}}
            </a></li>
        <li <?php if (str_contains($_SERVER['PHP_SELF'], 'Login.php')) echo 'style="border-left: 3px solid #EC7160;"'; ?>>
            <a href="Login.php"><?php echo !isset($_SESSION['userId']) ? 'Log In' : ''; ?></a></li>
        <li <?php if (str_contains($_SERVER['PHP_SELF'], 'Account')) echo 'style="border-left: 3px solid #EC7160;"'; ?>>
            <a href="AccountDashboard.php"><?php echo isset($_SESSION['userId']) ? 'Account' : ''; ?></a></li>
        <li <?php if (str_contains($_SERVER['PHP_SELF'], 'Register.php')) echo 'style="border-left: 3px solid #EC7160;"'; ?>>
            <a href="Register.php">Sign Up</a></li>
        <li <?php if (str_contains($_SERVER['PHP_SELF'], 'Checkout.php')) echo 'style="border-left: 3px solid #EC7160;"'; ?>>
            <a href="Checkout.php">Checkout</a></li>
        <li <?php if (str_contains($_SERVER['PHP_SELF'], 'Thankyou.php')) echo 'style="border-left: 3px solid #EC7160;"'; ?>>
            <a href="Thankyou.php">Thankyou</a></li>
    </ul>
</div>
