@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- PAGE HEADER -->

    <div class="card border-0 shadow-lg rounded-4 mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h2 class="fw-bold mb-1">

                        <i class="fa-solid fa-layer-group text-primary me-2"></i>

                        User Management

                    </h2>

                    <p class="text-muted mb-0">

                        Manage all system users here

                    </p>

                </div>

                <button type="button"
                        class="btn btn-primary px-4 rounded-3 shadow-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#addUserModal">

                    <i class="fas fa-plus me-2"></i>

                    Add User

                </button>

            </div>

        </div>

    </div>

    <!-- ALERTS -->

    @if(Session::has('success'))

    <div class="floating-alert success-alert">

        <div class="alert-icon">

            <i class="fa-solid fa-circle-check"></i>

        </div>

        <div>

            <h6 class="fw-bold mb-1">
                Success
            </h6>

            <small>
                {{ Session::get('success') }}
            </small>

        </div>

        <button class="close-alert"
                onclick="closeAlert()">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>

    @endif

    @if(Session::has('message'))

    <div class="floating-alert error-alert">

        <div class="alert-icon">

            <i class="fa-solid fa-circle-exclamation"></i>

        </div>

        <div>

            <h6 class="fw-bold mb-1">
                Error
            </h6>

            <small>
                {{ Session::get('message') }}
            </small>

        </div>

        <button class="close-alert"
                onclick="closeAlert()">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>

    @endif

    <!-- USER TABLE -->

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <h4 class="fw-bold mb-0">

                    User List

                </h4>

                <!-- SEARCH -->

                <div class="position-relative search-box">

                    <i class="fa-solid fa-magnifying-glass search-icon"></i>

                    <input type="text"
                           id="searchInput"
                           class="form-control search-input"
                           placeholder="Search users...">

                </div>

            </div>

        </div>

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-dark">

                        <tr>

                           

                            <th>
                                FULL NAME
                            </th>

                            <th>
                                EMAIL
                            </th>

                            <th>
                                ROLE
                            </th>

                        </tr>

                    </thead>

                    <tbody id="userTable">

                        @forelse ($user as $index => $pic)

                        <tr>

                           

                            <td class="fw-semibold text-uppercase">

                                {{ $pic->name }}

                            </td>

                            <td>

                                {{ $pic->email }}

                            </td>

                            <td>

                                @if($pic->role_as == 1)

                                    <span class="badge bg-danger px-3 py-2">

                                        Admin

                                    </span>

                                @else

                                    <span class="badge bg-primary px-3 py-2">

                                        Student

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4"
                                class="text-center py-5">

                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                                     width="120"
                                     class="mb-3">

                                <h5 class="text-muted">

                                    No users found

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

<!-- ADD USER MODAL -->

<div class="modal fade"
     id="addUserModal"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content border-0 rounded-4 shadow-lg">

            <div class="modal-header border-0 pb-0">

                <h4 class="fw-bold">

                    <i class="fa-solid fa-user-plus text-primary me-2"></i>

                    Add New User

                </h4>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body p-4">

                <form method="POST"
                      action="{{ route('user.store') }}">

                    @csrf

                    <div class="row g-4">

                        <!-- NAME -->

                        <div class="col-md-6">

                            <label class="fw-semibold mb-2">

                                Full Name

                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control rounded-3 @error('name') is-invalid @enderror"
                                   placeholder="Enter full name"
                                   value="{{ old('name') }}">

                            @error('name')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                            @enderror

                        </div>

                        <!-- EMAIL -->

                        <div class="col-md-6">

                            <label class="fw-semibold mb-2">

                                Email Address

                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control rounded-3 @error('email') is-invalid @enderror"
                                   placeholder="Enter email"
                                   value="{{ old('email') }}">

                            @error('email')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                            @enderror

                        </div>

                        <!-- ROLE -->

                        <div class="col-md-12">

                            <label class="fw-semibold mb-2">

                                User Type

                            </label>

                            <select class="form-select rounded-3 @error('role_as') is-invalid @enderror"
                                    name="role_as">

                                <option disabled selected>

                                    Select User Type

                                </option>

                                <option value="1">

                                    Admin

                                </option>

                                <option value="2">

                                    Student

                                </option>

                            </select>

                            @error('role_as')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                            @enderror

                        </div>

                        <!-- PASSWORD -->

                        <div class="col-md-6">

                            <label class="fw-semibold mb-2">

                                Password

                            </label>

                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control rounded-3 @error('password') is-invalid @enderror"
                                   placeholder="********">

                            @error('password')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                            @enderror

                        </div>

                        <!-- CONFIRM PASSWORD -->

                        <div class="col-md-6">

                            <label class="fw-semibold mb-2">

                                Confirm Password

                            </label>

                            <input type="password"
                                   name="password_confirmation"
                                   id="confirmPassword"
                                   class="form-control rounded-3"
                                   placeholder="********">

                        </div>

                        <!-- PASSWORD ERROR -->

                        <div class="col-md-12">

                            <div id="passwordError"
                                 class="text-danger fw-semibold"
                                 style="display:none;">

                                Password does not match.

                            </div>

                        </div>

                        <!-- BUTTON -->

                        <div class="col-md-12">

                            <button type="submit"
                                    class="btn btn-primary w-100 py-3 rounded-3"
                                    id="submitBtn">

                                <i class="fa-solid fa-user-plus me-2"></i>

                                Register User

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<style>

body{
    background:#f1f5f9;
}

/* CARD */

.card{
    overflow:hidden;
}

/* TABLE */

.table tbody tr{
    transition:.2s;
}

.table tbody tr:hover{
    transform:scale(1.01);
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

/* SEARCH */

.search-box{
    width:280px;
}

.search-input{
    padding-left:45px;
    height:45px;
    border-radius:30px;
}

.search-icon{
    position:absolute;
    top:50%;
    left:16px;
    transform:translateY(-50%);
    color:#6c757d;
}

/* FORM */

.form-control,
.form-select{
    height:50px;
    border-radius:14px;
}

.btn{
    font-weight:600;
}

/* ALERT */

.floating-alert{
    position:fixed;
    top:20px;
    right:20px;
    z-index:9999;

    min-width:340px;

    display:flex;
    align-items:center;
    gap:15px;

    padding:18px;

    border-radius:18px;

    color:#fff;

    animation:slideIn .5s ease;
}

.success-alert{
    background:linear-gradient(135deg,#16a34a,#22c55e);
}

.error-alert{
    background:linear-gradient(135deg,#dc2626,#ef4444);
}

.alert-icon{
    font-size:35px;
}

.close-alert{
    margin-left:auto;
    border:none;
    background:none;
    color:white;
    font-size:18px;
}

/* MOBILE */

@media(max-width:768px){

    .search-box{
        width:100%;
    }

    .floating-alert{
        left:15px;
        right:15px;
        min-width:auto;
    }

    .modal-dialog{
        margin:10px;
    }

    .table{
        min-width:600px;
    }

}

/* ANIMATION */

@keyframes slideIn{

    from{
        transform:translateX(100%);
        opacity:0;
    }

    to{
        transform:translateX(0);
        opacity:1;
    }

}

</style>

<script>

/* SEARCH */

document.getElementById('searchInput').addEventListener('keyup', function(){

    let value = this.value.toLowerCase();

    let rows = document.querySelectorAll('#userTable tr');

    rows.forEach(function(row){

        if(row.innerText.toLowerCase().includes(value)){

            row.style.display = '';

        }else{

            row.style.display = 'none';

        }

    });

});

/* PASSWORD MATCH */

const password = document.getElementById('password');

const confirmPassword = document.getElementById('confirmPassword');

const passwordError = document.getElementById('passwordError');

const submitBtn = document.getElementById('submitBtn');

function validatePassword(){

    if(confirmPassword.value === ''){

        passwordError.style.display = 'none';

        submitBtn.disabled = false;

        return;

    }

    if(password.value !== confirmPassword.value){

        passwordError.style.display = 'block';

        submitBtn.disabled = true;

    }else{

        passwordError.style.display = 'none';

        submitBtn.disabled = false;

    }

}

password.addEventListener('keyup', validatePassword);

confirmPassword.addEventListener('keyup', validatePassword);

/* CLOSE ALERT */

function closeAlert(){

    let alert = document.querySelector('.floating-alert');

    if(alert){

        alert.remove();

    }

}

/* AUTO CLOSE ALERT */

setTimeout(() => {

    closeAlert();

}, 4000);

</script>

@endsection