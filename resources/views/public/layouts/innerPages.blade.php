<!doctype html>
<html lang="en">

@include('public.includes.head')

<body>


<div class="site-wrap" id="home-section">

    @include('public.includes.header')
    @include('public.includes.innerPagesCarousel')

    @yield('content')

    @include('public.includes.rentCarSection')
    @include('public.includes.footer')

</div>

@include('public.includes.js')

</body>
</html>

