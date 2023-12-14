<!doctype html>
<html lang="en">
    @include('front.partials.top')
<body>
<div class="dFlex w-100">

    @include('front.partials.sidebar')
    <div>
        <div class="container">
            @yield('content')

            @include('front.partials.footer')

        </div>
    </div>
</div>
@include('front.partials.bottom')
</body>
</html>
