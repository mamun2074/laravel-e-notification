<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php $ApplicationName = Config::get('settings.company_name'); ?>
    <title>@yield('title', 'Welcome To | ' . $ApplicationName)</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/uploads/logo/car-fav.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="{{ asset('admin/asset/css/font-g/font-1.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/asset/css/font-g/icon-1.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin/asset/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="{{ asset('admin/asset/plugins/node-waves/waves.css') }}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset('admin/asset/plugins/animate-css/animate.css') }}" rel="stylesheet" />
    <!-- toaster -->
    <link rel="stylesheet" href="{{ asset('admin/asset/css/toastr/toastr.css') }}">
    <link href="{{ asset('admin/asset/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />

    <!-- Datepicker -->
    <link href="{{ asset('admin/asset/plugins/datetimepicker/jquery.datetimepicker.css') }}" rel="stylesheet" />

    @stack('include-css')
    <!-- Custom Css -->
    <link href="{{ Helper::assetV('admin/asset/css/style.css') }}" rel="stylesheet">
    @if ($is_rtl)
        <link href="{{ Helper::assetV('admin/asset/css/style-rtl.css') }}" rel="stylesheet">
    @endif
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/asset/css/fontawesome.css') }}">
    <!-- Utility Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/layout/css/util.css') }}">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('admin/asset/css/themes/all-themes.css') }}" rel="stylesheet" />
</head>
<body class="theme-light-blue">
    <!-- Page Loader -->
    {{-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> --}}
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    @include('enotification::admin.includes.top-bar')
    <!-- #Top Bar -->
    <!-- Left Sidebar -->
    @include('enotification::admin.includes.left-sidebar')
    <!-- #END# Left Sidebar -->
    @yield('content')
    <!-- base url generator -->
    <!-- for language support -->
    <script>
        "use strict";
        window.translations = null;
        window.permissions = null;
        window.permission_enable = null;
        window.translations = {!! \Cache::get('translations') !!};
        window.permissions = {!! app('role_permissions') !!};
        window.permission_enable = {{ config('permissions-config.rolepermission-enable') == true ? 'true' : 'false' }};
        window.url = "<?php echo url('/'); ?>/";
        window.appDebug = parseInt("{{ env('APP_DEBUG') }}");
    </script>
    <!-- Jquery Core Js -->
    <script src="{{ asset('admin/asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('admin/asset/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('admin/asset/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('admin/asset/plugins/node-waves/waves.js') }}"></script>
    <!-- tooltips -->
    <script src="{{ asset('admin/asset/js/pages/ui/tooltips-popovers.js') }}"></script>
    <!-- toaster -->
    <script src="{{ asset('admin/asset/js/toastr.min.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ asset('admin/asset/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ asset('admin/asset/plugins/momentjs/moment.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ asset('admin/asset/plugins/datetimepicker/jquery.datetimepicker.js') }}"></script>
    <!-- axios Js -->
    <script src="{{ asset('admin/asset/js/axios.min.js') }}"></script>
    <script src="{{ Helper::assetV('admin/asset/js/helpers.js') }}"></script>
    <script src="{{ Helper::assetV('admin/asset/js/script.js') }}"></script>

    <!-- sesson message -->
    @if (session('error'))
        <script>
            toastr["error"]('{{ session('error') }}');
        </script>
    @endif

    <!-- page ways script -->
    @stack('include-js')
    <!-- Custom Js -->
    @if ($is_rtl)
        <script src="{{ Helper::assetV('admin/asset/js/admin-rtl.js') }}"></script>
    @else
        <script src="{{ Helper::assetV('admin/asset/js/admin.js') }}"></script>
    @endif
</body>

</html>
