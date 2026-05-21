@extends('layouts.master')

@section('content')


<div class="container-fluid py-4">

    <!-- HEADER -->

    <div class="card border-0 shadow-lg rounded-4 mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h1 class="fw-bold mb-1">
                        Scholarship Applicants
                    </h1>

                    <p class="text-muted mb-0">
                        Manage all scholarship applicants here
                    </p>

                </div>

                <div>

                    <a href="{{ route('admin.approved.applicants') }}"
                       class="btn btn-success px-4 rounded-3">

                        <i class="fa-solid fa-circle-check me-2"></i>

                        Approved Applicants

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- SUCCESS -->

   @if(session('success'))

<div class="floating-alert">

    <div class="success-alert success-bg">

        <div class="success-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <div class="success-content">

            <div class="success-title">
                Success
            </div>

            <div class="success-message">
                {{ session('success') }}
            </div>

        </div>

        <button type="button"
                class="close-alert"
                onclick="closeAlert()">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>

</div>

@endif


@if(session('error'))

<div class="floating-alert">

    <div class="success-alert error-bg">

        <div class="success-icon">
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>

        <div class="success-content">

            <div class="success-title">
                Duplicate
            </div>

            <div class="success-message">
                {{ session('error') }}
            </div>

        </div>

        <button type="button"
                class="close-alert"
                onclick="closeAlert()">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>

</div>

@endif


    <!-- TABLE CARD -->

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

    <h4 class="fw-bold mb-0">
        Applicant List
    </h4>

    <div class="d-flex align-items-center gap-3 flex-wrap">

        <!-- SEARCH BAR -->

        <div class="position-relative">

            <i class="fa-solid fa-magnifying-glass position-absolute"
               style="
                    left:15px;
                    top:50%;
                    transform:translateY(-50%);
                    color:#6c757d;
               "></i>

            <input type="text"
                   id="searchInput"
                   class="form-control rounded-4 ps-5"
                   placeholder="Search applicants..."
                   style="
                        width:260px;
                        height:45px;
                        border:1px solid #dcdcdc;
                   ">

        </div>

        <!-- TOTAL -->

        <span class="badge bg-primary px-4 py-2 fs-6">

            {{ $applicants->count() }} Applicants

        </span>


            </div>

        </div>

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>FULL NAME</th>

                            <th>COURSE</th>

                            <th>SCHOOL</th>

                            <th>CONTACT</th>

                            <th>EMAIL</th>

                            <th>STATUS</th>

                            <th width="220">
                                ACTION
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($applicants as $student)

                        <tr>

                            <td class="fw-bold">
                                #{{ $student->id }}
                            </td>

                            <td>

                                <div class="fw-bold text-uppercase">

                                    {{ $student->first_name }}
                                    {{ $student->middle_name }}
                                    {{ $student->last_name }}

                                </div>

                            </td>

                            <td class="text-uppercase">
                                {{ $student->college_course }}
                            </td>

                            <td class="text-uppercase">
                                {{ $student->college_school }}
                            </td>

                            <td>
                                {{ $student->contact_number }}
                            </td>

                            <td>
                                {{ $student->email }}
                            </td>

                            <td>

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    PENDING
                                </span>

                            </td>

                            <td>

                                <div class="d-flex gap-2 flex-wrap">

                                    <!-- VIEW -->

                                    

                                    <!-- APPROVE -->

                                    <form action="{{ route('admin.approve', $student->id) }}"
                                          method="POST">

                                        @csrf

                                        <button class="btn btn-success btn-sm rounded-3 px-3">

                                            <i class="fa-solid fa-check"></i>

                                            Approve

                                        </button>

                                    </form>

                                    <!-- DELETE -->

                                  

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center py-5">

                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                                     width="120"
                                     class="mb-3">

                                <h5 class="text-muted">
                                    No applicants found
                                </h5>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<style>

.table tbody tr{
    transition:.2s;
}

.table tbody tr:hover{
    transform:scale(1.01);
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.card{
    overflow:hidden;
}
.success-bg{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    box-shadow:
        0 0 15px rgba(34,197,94,.5),
        0 0 35px rgba(34,197,94,.3);
}

/* ERROR COLOR */

.error-bg{
    background:linear-gradient(135deg,#dc2626,#ef4444);
    box-shadow:
        0 0 15px rgba(239,68,68,.5),
        0 0 35px rgba(239,68,68,.3);
}

.btn{
    font-weight:600;
}

.badge{
    border-radius:30px;
}
.table tbody tr{
    transition:.2s;
}

.table tbody tr:hover{
    transform:scale(1.01);
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.card{
    overflow:hidden;
}

.btn{
    font-weight:600;
}

.badge{
    border-radius:30px;
}

/* FLOATING SUCCESS ALERT */

.floating-alert{
    position:fixed;
    top:25px;
    right:25px;
    z-index:9999;
    animation:slideIn .5s ease;
}

.success-alert{
    width:380px;
    background:linear-gradient(135deg,#16a34a,#22c55e);
    color:#fff;
    border-radius:18px;
    padding:18px 20px;
    display:flex;
    align-items:center;
    gap:15px;
    box-shadow:
        0 0 15px rgba(34,197,94,.5),
        0 0 35px rgba(34,197,94,.3);
    animation:glow 2s infinite alternate;
}

.success-icon{
    font-size:40px;
}

.success-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:2px;
}

.success-message{
    font-size:14px;
    opacity:.95;
}

.close-alert{
    margin-left:auto;
    background:none;
    border:none;
    color:#fff;
    font-size:18px;
    cursor:pointer;
}

/* ANIMATIONS */

@keyframes slideIn{

    from{
        transform:translateX(120%);
        opacity:0;
    }

    to{
        transform:translateX(0);
        opacity:1;
    }

}

@keyframes glow{

    from{
        box-shadow:
            0 0 10px rgba(34,197,94,.4),
            0 0 25px rgba(34,197,94,.2);
    }

    to{
        box-shadow:
            0 0 20px rgba(34,197,94,.8),
            0 0 45px rgba(34,197,94,.5);
    }

}
</style>

<script>
    function closeAlert(){

    document.querySelector('.floating-alert').style.display = 'none';

}

/* AUTO CLOSE AFTER 4 SECONDS */

setTimeout(() => {

    let alert = document.querySelector('.floating-alert');

    if(alert){

        alert.style.transition = '.5s';
        alert.style.opacity = '0';

        setTimeout(() => {

            alert.remove();

        },500);

    }

},4000);


document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('keyup', function () {

        let value = this.value.toLowerCase();

        let rows = document.querySelectorAll('tbody tr');

        rows.forEach(function(row){

            if(row.innerText.toLowerCase().includes(value)){

                row.style.display = '';

            }else{

                row.style.display = 'none';

            }

        });

    });

});

</script>

@endsection