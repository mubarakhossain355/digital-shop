<!DOCTYPE html>
<html class="no-js" lang="en">
    <title>DigitalShop - @yield('title')</title>
<head>
    @include('website.includes.meta')
    @include('website.includes.style')

</head>

<body>


    <!-- Quick view -->

    @include('website.includes.modal')


    @include('website.includes.header')
    @include('website.includes.mobile_header')

    <main class="main">
        @yield('content')
    </main>

    @include('website.includes.footer')
    <!-- Preloader Start -->
    @include('website.includes.preloader')
    <!-- Vendor JS-->
    @include('website.includes.script')


</body>

</html>
