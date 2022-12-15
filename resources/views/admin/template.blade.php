@include('admin.partials.head')

<body class="g-sidenav-show  bg-gray-200">

        @include('admin.partials.sidenav')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
            @include('admin.partials.topbar')
        <!-- End Navbar -->

        @yield('content')

    </main>

    @include('admin.partials.scripts')
