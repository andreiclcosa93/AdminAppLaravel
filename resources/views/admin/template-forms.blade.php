@include('admin.partials.head')

<body class="bg-gray-200">

  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-color: #000;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">

                @yield('content')

            </div>
          </div>
        </div>
      </div>

      @include('admin.partials.footer')

    </div>
  </main>

  @include('admin.partials.scripts')
