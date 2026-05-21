<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LGU Aparri Scholar</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

    <!-- DataTables -->

    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <!-- Custom CSS -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/styles.css') }}">

</head>

<body>

<!-- TOP NAVBAR -->

<nav class="navbar navbar-dark bg-dark fixed-top shadow-sm px-3">

    <div class="d-flex align-items-center">

        <!-- SIDEBAR TOGGLE -->

        <button class="btn btn-dark border-0 me-3"
                id="sidebarToggle">

            <i class="fa-solid fa-bars fs-5"></i>

        </button>

        <span class="navbar-brand mb-0 h1 fw-bold">

            LGU Aparri Scholar

        </span>

    </div>

</nav>

<!-- MAIN LAYOUT -->

<div id="wrapper">

    <!-- SIDEBAR -->

    <aside id="sidebar">

        <div class="sidebar-content">

            <!-- MENU -->

            <div>

                <!-- CORE -->

                <div class="sidebar-heading">

                    Core

                </div>

                <!-- DASHBOARD -->

                <a class="sidebar-link"
                   href="{{ url('/dashboard') }}">

                    <i class="fas fa-tachometer-alt"></i>

                    <span>Dashboard</span>

                </a>

                <!-- MANAGEMENT -->

                <div class="sidebar-heading">

                    Management

                </div>

                <!-- APPLICANTS -->

                <a class="sidebar-link"
                   href="{{ route('admin.applicants') }}">

                    <i class="fa-solid fa-user"></i>

                    <span>Applicant</span>

                </a>

                <!-- USERS -->

                <a class="sidebar-link"
                   href="{{ route('user.index') }}">

                    <i class="fa-solid fa-users"></i>

                    <span>Manage User</span>

                </a>

                <!-- SETTINGS -->

                <a class="sidebar-link"
                   href="{{ route('admin.settings') }}">

                    <i class="fa-solid fa-gear"></i>

                    <span>Admin Settings</span>

                </a>

                <!-- ACTIVITY -->

                <div class="sidebar-heading">

                    Activity

                </div>

                <!-- LOGOUT -->

                <a class="sidebar-link"
                   href="{{ route('logout') }}"
                   onclick="
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                   ">

                    <i class="fa-solid fa-door-open"></i>

                    <span>Logout</span>

                </a>

                <form id="logout-form"
                      action="{{ route('logout') }}"
                      method="POST"
                      class="d-none">

                    @csrf

                </form>

            </div>

            <!-- FOOTER -->

            <div class="sidebar-footer">

                <div class="small text-light">

                    Logged in as

                </div>

                <div class="fw-bold text-white">

                    Admin

                </div>

            </div>

        </div>

    </aside>

    <!-- OVERLAY -->

    <div id="sidebarOverlay"></div>

    <!-- CONTENT -->

    <div id="content">

        <main class="p-4">

            @yield('content')

        </main>

    </div>

</div>

<!-- STYLES -->

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    overflow-x:hidden;
    background:#f4f6f9;
    font-family:Arial, Helvetica, sans-serif;
}

/* NAVBAR */

.navbar{
    height:60px;
    z-index:2000;
}

/* WRAPPER */

#wrapper{
    display:flex;
}

/* SIDEBAR */

#sidebar{
    width:260px;
    height:100vh;
    background:#1f2937;
    position:fixed;
    top:60px;
    left:0;
    transition:.3s ease;
    z-index:1500;
}

#sidebar.minimized{
    width:80px;
}

#sidebar.minimized .sidebar-link span,
#sidebar.minimized .sidebar-heading,
#sidebar.minimized .sidebar-footer{
    display:none;
}

.sidebar-content{
    height:calc(100vh - 60px);
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}

/* HEADINGS */

.sidebar-heading{
    color:#9ca3af;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:1px;
    padding:18px 20px 10px;
}

/* LINKS */

.sidebar-link{
    display:flex;
    align-items:center;
    gap:15px;
    color:#e5e7eb;
    text-decoration:none;
    padding:14px 20px;
    margin:5px 12px;
    border-radius:12px;
    transition:.2s;
    font-size:15px;
    font-weight:500;
}

.sidebar-link i{
    width:22px;
    text-align:center;
    font-size:16px;
}

.sidebar-link:hover{
    background:#2563eb;
    color:#fff;
    transform:translateX(5px);
}

/* FOOTER */

.sidebar-footer{
    background:#111827;
    padding:18px;
    text-align:center;
}

/* CONTENT */

#content{
    margin-left:260px;
    margin-top:60px;
    width:100%;
    transition:.3s ease;
}

#content.expanded{
    margin-left:80px;
}

/* OVERLAY */

#sidebarOverlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.4);
    z-index:1400;
    display:none;
}

/* MOBILE */

@media(max-width:991px){

    #sidebar{
        left:-260px;
    }

    #sidebar.mobile-show{
        left:0;
    }

    #content{
        margin-left:0;
    }

    #content.expanded{
        margin-left:0;
    }

    #sidebarOverlay.show{
        display:block;
    }

}

</style>

<!-- SCRIPTS -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

const sidebar = document.getElementById('sidebar');

const content = document.getElementById('content');

const toggleBtn = document.getElementById('sidebarToggle');

const overlay = document.getElementById('sidebarOverlay');

/*
|--------------------------------------------------------------------------
| TOGGLE SIDEBAR
|--------------------------------------------------------------------------
*/

toggleBtn.addEventListener('click', function(){

    if(window.innerWidth <= 991){

        sidebar.classList.toggle('mobile-show');

        overlay.classList.toggle('show');

    }else{

        sidebar.classList.toggle('minimized');

        content.classList.toggle('expanded');

    }

});

/*
|--------------------------------------------------------------------------
| CLOSE MOBILE SIDEBAR
|--------------------------------------------------------------------------
*/

overlay.addEventListener('click', function(){

    sidebar.classList.remove('mobile-show');

    overlay.classList.remove('show');

});

</script>

</body>
</html>