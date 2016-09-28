<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/select2/select2.min.css") }}">
    <!-- App.css -->
    <link rel="stylesheet" href="{{ asset("/css/app.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css") }} ">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css") }}">

    @yield('stylesheets')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini layout-boxed">
    <div class="wrapper">

        @include('dashboard.masterpage.header')

        @include('dashboard.masterpage.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('title')
                    <small>@yield('description')</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    @yield('breadcrumb')
                </ol>
            </section>

            <section class="content">
                @yield('content')
            </section>
        </div>

        @include('dashboard.masterpage.footer')

        @include('dashboard.masterpage.control-sidebar')

        <div class="control-sidebar-bg"></div>
    </div>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
    <!-- Select2 -->
    <script src="{{ asset("/bower_components/AdminLTE/plugins/select2/select2.min.js") }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset("/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>

    <!-- /REQUIRED JS SCRIPTS/ -->

    <!-- Allows JS scripts to access BaseURL -->
    <script type="text/javascript"> var APP_URL = {!! json_encode(url('/')) !!} </script>

    <!-- Inserts template specific scripts -->
    @yield('scripts')

</body>
</html>
