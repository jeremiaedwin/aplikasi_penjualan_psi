<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('/sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet" />
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidenav')
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('layouts.topbar')
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">@yield('page')</h1>
                    @include('sweetalert::alert')
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div> 
            @include('layouts.footer')
        </div>
    </div>



<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <!--<a class="btn btn-primary" href="{{ url('login') }}">Logout</a>-->
           <a href="{{ route('logout') }}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
            </a>
 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
      </div>
    </div>
  </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/sbadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/sbadmin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
