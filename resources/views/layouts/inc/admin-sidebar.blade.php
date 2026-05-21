<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<div id="layoutSidenav_nav">

    <nav class="sb-sidenav accordion sb-sidenav-dark"
         id="sidenavAccordion">

        <div class="sb-sidenav-menu">

            <div class="nav">

                <!-- CORE -->

                <div class="sb-sidenav-menu-heading">
                    Core
                </div>

                <a class="nav-link"
                   href="{{ url('/dashboard') }}">

                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>

                    Dashboard

                </a>

                <!-- MANAGEMENT -->

                <div class="sb-sidenav-menu-heading">
                    Management
                </div>

                <!-- APPLICANT -->

                <a class="nav-link"
                   href="{{ route('admin.applicants') }}">

                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    Applicant

                </a>

                <!-- USERS -->

                <a class="nav-link"
                   href="{{ route('user.index') }}">

                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-people-group"></i>
                    </div>

                    Manage User

                </a>

                <!-- SETTINGS -->

                <a class="nav-link"
                   href="{{ route('admin.settings') }}">

                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-gear"></i>
                    </div>

                    Admin Settings

                </a>

                <!-- ACTIVITY -->

                <div class="sb-sidenav-menu-heading">
                    Activity
                </div>

                <!-- LOGOUT -->

                <a class="nav-link"
                   href="{{ route('logout') }}"
                   onclick="
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                   ">

                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-door-open"></i>
                    </div>

                    Log out

                </a>

                <form id="logout-form"
                      action="{{ route('logout') }}"
                      method="POST"
                      class="d-none">

                    @csrf

                </form>

            </div>

        </div>

        <!-- FOOTER -->

        <div class="sb-sidenav-footer">

            <div class="small">
                Logged in as:
            </div>

            Admin

        </div>

    </nav>

</div>