<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shop ARB</title>
    @include('head')
</head>

    <body >

        <!-- Header -->
        @include('header')

        <!-- Cart -->
        @include('cart')

        <!-- Content -->
        @yield('content')

        <!-- Footer -->
        @include('footer')

    </body>
</html>
