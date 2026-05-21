<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
    <a class="navbar-brand ps-3" href="{{url('/dashboard')}}">ADMIN</a>
          
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                   
                   
                </div>
            </form>
           
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      
            <a class="nav-link " id="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ auth()->user()->name }}</a>
     
    </ul>
</nav>



<script>
window.addEventListener('DOMContentLoaded', event => {


const sidebarToggle = document.body.querySelector('#sidebarToggle');
if (sidebarToggle) {
 
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    });
}

});


</script>