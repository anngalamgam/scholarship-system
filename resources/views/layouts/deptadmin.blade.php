<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>New Caps</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/sb-admin-2.min.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('build/assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.1/datatables.min.css" rel="stylesheet">
 
 <script src="https://cdn.datatables.net/v/dt/dt-2.0.1/datatables.min.js"></script>
    

</head>
<body>

    @include('layouts.inc.dept.admin-navbar')
    <div id="layoutSidenav">
        @include('layouts.inc.dept.admin-sidebar')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
      
            </div>
    </div>
  
    <style>

#layoutSidenav {
    display: flex;
    transition: margin-left 0.3s ease-in-out;
}


#layoutSidenav_nav {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    width: 220px; 
    z-index: 1030;
    background-color: #343a40;
    overflow-y: auto;
    height: 100vh;
    transition: transform 0.3s ease-in-out;
}

#layoutSidenav_nav.collapsed {
    transform: translateX(-220px); 
}


.sb-topnav {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1040;
    height: 56px;
    background-color: #343a40;
}


#layoutSidenav_content {
    margin-top: 56px; 
    height: calc(100vh - 56px); 
    padding: 20px;
    padding-left: 220px; 
    width: 100%;
    transition: padding-left 0.3s ease-in-out, width 0.3s ease-in-out;
}


#layoutSidenav_nav.collapsed + #layoutSidenav_content {
    padding-left: 50px; 
}


   </style>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('layoutSidenav_nav');
        sidebar.classList.toggle('collapsed'); 
        
        const content = document.getElementById('layoutSidenav_content');
        content.classList.toggle('collapsed'); 
    }
</script>



    <script src="{{ asset('build/assets/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
   
    <script src="{{ asset('build/assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    
    <script src="{{ asset('build/assets/js/datatables-simple-demo.js') }}"></script>

    <script src="{{ asset('build/assets/js/datatables-demo.js') }}"></script>
    <script src="{{ asset('build/assets/js/database.min.js') }}"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <!-- CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
   
   
</body>
</html>