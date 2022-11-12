@include('partials.head')

<body>
<div class="preloader">
    <div class="preloader__row">
        <div class="preloader__item"></div>
        <div class="preloader__item"></div>
    </div>
</div>
<div class="wrapper">
    @if(request()->is('/') )
        @include('partials.header')
    @else
        @include('partials.header-pages')
    @endif

    @yield('content')

    @include('partials.footer')
</div>
@include('partials.modal')
@stack('map')
</body>

</html>
