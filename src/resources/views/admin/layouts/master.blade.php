<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Admin Dashboard for managing users, settings, reports and system configurations. Fast, secure and responsive design.">
    <meta name="keywords"
        content="admin dashboard, admin panel, management system, responsive admin, bootstrap dashboard">
    <meta name="author" content="Your Name or Company">

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="Admin Dashboard">
    <meta property="og:description" content="A modern and responsive admin dashboard built with Bootstrap.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://yourdomain.com/admin">
    <meta property="og:image" content="https://yourdomain.com/assets/images/dashboard-og.png">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Admin Dashboard">
    <meta name="twitter:description" content="A clean and scalable admin dashboard built with Bootstrap.">
    <meta name="twitter:image" content="https://yourdomain.com/assets/images/dashboard-og.png">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('vendor/enotification/assets/images/favicon.png') }}">


    <!-- Bootstrap CSS -->
    <link href="{{ asset('vendor/enotification/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="{{ asset('vendor/enotification/assets/vendor/bootstrap/css/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- extra plugin css -->
    @stack('include-css')


    <!-- Main css -->
    <link href="{{ asset('vendor/enotification/assets/css/main.css') }}" rel="stylesheet">

    <!-- Responsive -->
    <link href="{{ asset('vendor/enotification/assets/css/responsive.css') }}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <!-- Left Sidebar -->
        @include('enotification::admin.includes.left-sidebar')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Top Navigation -->
            @include('enotification::admin.includes.top-bar')
            <!-- Main Content Area -->
            <div id="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0 text-gray-800">Dashboard Overview</h3>
                    <button class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-download"></i>
                        <span class="d-none d-sm-inline">Download Report</span>
                    </button>
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="{{ asset('vendor/enotification/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Jquery js -->

    <script src="{{ asset('vendor/enotification/assets/js/jquery-3.7.0.min.js') }}"></script>
    

    <!-- moment js -->
    <script src="{{ asset('vendor/enotification/assets/js/moment.min.js') }}"></script>

    <!-- extra plugin js -->
    @stack('include-js')


    <!-- Main js -->
    <script src="{{ asset('vendor/enotification/assets/js/main.js') }}"></script>

    
</body>

</html>
