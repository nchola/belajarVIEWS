<html dir="ltr" lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        {{-- Top --}}
        @include('layouts.top')

        {{-- Sidebar --}}
        @include('layouts.sidebar')
        <div class="page-wrapper">
            {{-- Content --}}
            @yield('content')
        </div>
    </div>
    @include('layouts.scripts')
    @stack('scripts')
</body>

</html>
