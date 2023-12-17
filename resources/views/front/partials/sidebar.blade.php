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
        <li class="{{ \Illuminate\Support\Facades\Request::is('/')?"active":"" }}">
            <a href="{{route('front.blog')}}">Blog</a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::is('cart')?"active":"" }}">
            <a href="{{route('front.cart')}}">Cart
                {{--                    (<?php echo $arrCount[0]['count'] ?>)--}}
            </a>
        </li>

        @auth
        <li class="{{ \Illuminate\Support\Facades\Request::is('/')?"active":"" }}">
            <a href="{{route('front.blog')}}">Account </a>
        </li>
        @else
        <li class="{{ \Illuminate\Support\Facades\Request::is('login')?"active":"" }}">
            <a href="{{route('front.login')}}">Log In </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::is('signup')?"active":"" }}">
            <a href="{{route('front.signup')}}">Sign Up</a>
        </li>

        @endauth

        <li class="{{ \Illuminate\Support\Facades\Request::is('checkout')?"active":"" }}">
            <a href="{{route('front.checkout')}}">Checkout</a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::is('admin/profile')?"active":"" }}">
            <a href="{{route('front.signup')}}">Thankyou</a>
        </li>
    </ul>
</div>
