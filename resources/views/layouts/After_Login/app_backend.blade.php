<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ $title ?? config('app.name') }}</title>

    {{--  Font Awesome Icons  --}}
    <link rel="stylesheet" href="{{ asset('template-dashboard-admin-lte') }}/plugins/fontawesome-free/css/all.min.css">

    {{--  Theme style  --}}
    <link rel="stylesheet" href="{{ asset('template-dashboard-admin-lte') }}/dist/css/adminlte.min.css">

    {{--  Google Font: Source Sans Pro  --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{--  CSS CUSTOM  --}}
    <link rel="stylesheet" href="{{ asset('template-dashboard-admin-lte')}}/css/custom.css">

    {{--  @stack('toast-notification-css')  --}}

    @livewireStyles

</head>

<body class="hold-transition sidebar-mini text-sm">
    <div class="wrapper">

        {{-- Ini adalah component untuk memanggil view --}}
        <livewire:backend.navbar />
        <livewire:backend.aside />

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <livewire:backend.content-header :title="$title"></livewire:backend.content-header>

            {{-- LOGIKA KENDALI --}}
            {{-- @if ($contentHeader ?? '')
            @if ($contentHeader == true)
                <livewire:backend.content-header />
            @endif
          @endif --}}

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    @yield('content')

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Hallo</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('template-dashboard-admin-lte') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template-dashboard-admin-lte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template-dashboard-admin-lte') }}/dist/js/adminlte.min.js"></script>

    @livewireScripts

    <script>
        window.addEventListener('closeModal', event => {
            $("#modal_create_siswa").modal('hide');
        })

    </script>

    @stack('sweet-alert-js')

    {{--  @stack('toast-notification-js')  --}}
</body>

</html>
