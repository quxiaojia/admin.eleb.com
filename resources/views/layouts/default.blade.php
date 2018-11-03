@include('layouts._header')
@include('layouts.nav')

    <div class="container" style="background-color: #CCFFCC;border-radius: 10px">
        @include('layouts.notice')
        @yield('contents')
        @include('layouts._footer')
    </div>
