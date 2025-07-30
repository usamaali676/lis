<!DOCTYPE html>
<html lang="zxx">
    <head>
@include('layouts.partials.headFront')
</head>
<body class="header-one">

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="utf-preloader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper -->
    <div id="main_wrapper">
        @include('layouts.partials.nav')
        <div class="clearfix"></div>

        @yield('content')

        <!-- Footer -->
        @include('layouts.partials.footer')
        <div id="bottom_backto_top"><a href="#"></a></div>
    </div>

    @include('layouts.partials.front-scripts')
    <!-- Style Switcher -->
    <div id="color_switcher_preview">
        <h2>Choose Your Color <a href="#"><i class="fa fa-cog fa-spin (alias)"></i></a></h2>
        <div>
            <ul class="colors" id="color1">
                <li><a href="#" class="stylesheet"></a></li>
                <li><a href="#" class="stylesheet_1"></a></li>
                <li><a href="#" class="stylesheet_2"></a></li>
                <li><a href="#" class="stylesheet_3"></a></li>
                <li><a href="#" class="stylesheet_4"></a></li>
                <li><a href="#" class="stylesheet_5"></a></li>
            </ul>
        </div>
    </div>
</body>

</html>