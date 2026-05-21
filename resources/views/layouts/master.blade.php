<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>New Caps</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    {{-- DataTables --}}
    <link rel="stylesheet"
        href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    {{-- Your Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sb-admin-2.min.css') }}">

</head>

<body id="page-top">

    @include('layouts.inc.admin-navbar')

    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">
            @include('layouts.inc.admin-sidebar')
        </div>

        <div id="layoutSidenav_content">

            <main class="p-4">
                @yield('content')
            </main>

        </div>

    </div>

    <style>

        #layoutSidenav {
            display: flex;
        }

        #layoutSidenav_nav {
            width: 250px;
            min-height: 100vh;
            background: #343a40;
            position: fixed;
            top: 56px;
            left: 0;
            overflow-y: auto;
            transition: 0.3s;
        }

        #layoutSidenav_nav.collapsed {
            margin-left: -250px;
        }

        #layoutSidenav_content {
            margin-left: 250px;
            width: 100%;
            margin-top: 56px;
            transition: 0.3s;
        }

        #layoutSidenav_content.expanded {
            margin-left: 0;
        }

        .sb-topnav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
        }

    </style>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- DataTables --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <script>

        function toggleSidebar() {

            const sidebar = document.getElementById('layoutSidenav_nav');

            const content = document.getElementById('layoutSidenav_content');

            sidebar.classList.toggle('collapsed');

            content.classList.toggle('expanded');
        }

    </script>

</body>

</html>