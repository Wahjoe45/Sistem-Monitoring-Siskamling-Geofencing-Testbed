
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard') | Sistem Monitoring Keamanan Lingkungan</title>

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    @stack('scripts')
    @stack('styles')
</head>

<body id="page-top">

<div id="wrapper">

    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <!-- Navbar -->
            @include('components.navbar')

            <!-- Main Content -->
            <div class="container-fluid">

                @hasSection('page-title')
                    <div class="mb-4">
                        <h1 class="h3 text-gray-800">
                            @yield('page-title')
                        </h1>
                    </div>
                @endif

                @yield('content')

            </div>

        </div>

        <!-- Footer -->
        @include('components.footer')

    </div>

</div>

<!-- Scroll to Top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

@stack('scripts')

</body>
</html>
