
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url('/dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                           
                            <div class="sb-sidenav-menu-heading"> Management</div>
                           <a class="nav-link" href="{{ route('admin.applicants') }}">
    <div class="sb-nav-link-icon">
        <i class="fa-solid fa-user"></i>
    </div>
    Applicant
</a>
                            
                            <a class="nav-link" href="{{route('user.index')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></div>
                                Manage User
                            </a>
                               
                          

                           
                            <div class="sb-sidenav-menu-heading">Activity</div>

                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-door-open"></i></i></div>
                               Log out
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                            </a>
                        </div>

                        
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>


          