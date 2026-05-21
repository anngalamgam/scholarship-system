@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->

    <div class="card border-0 shadow-lg rounded-4 mb-4">

        <div class="card-body p-4">

            <h1 class="fw-bold mb-1">
                Admin Settings
            </h1>

            <p class="text-muted mb-0">
                Update admin email and password
            </p>

        </div>

    </div>

    <!-- SUCCESS ALERT -->

    @if(session('success'))

    <div class="floating-alert success-alert">

        <div class="icon-box">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <div>

            <div class="fw-bold">
                Success
            </div>

            <div>
                {{ session('success') }}
            </div>

        </div>

    </div>

    @endif

    <!-- ERROR ALERT -->

    @if(session('error'))

    <div class="floating-alert error-alert">

        <div class="icon-box">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>

        <div>

            <div class="fw-bold">
                Error
            </div>

            <div>
                {{ session('error') }}
            </div>

        </div>

    </div>

    @endif
    @if ($errors->any())

<div class="floating-alert error-alert">

    <div class="icon-box">
        <i class="fa-solid fa-circle-xmark"></i>
    </div>

    <div>

        <div class="fw-bold">Validation Error</div>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

</div>

@endif

    <div class="row">

        <!-- EMAIL -->

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Update Email
                    </h4>

                    <form action="{{ route('admin.settings.update') }}" method="POST">

                        @csrf

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Email Address
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ auth()->user()->email }}"
                                   class="form-control rounded-4"
                                   required>

                        </div>

                        <button class="btn btn-primary px-4 rounded-4">

                            <i class="fa-solid fa-envelope me-2"></i>

                            Update Email

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- PASSWORD -->

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Update Password
                    </h4>

                   <form action="{{ route('admin.settings.update.password') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Current Password
                            </label>

                            <input type="password"
                                   name="current_password"
                                   class="form-control rounded-4"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                New Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control rounded-4"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Confirm Password
                            </label>

                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control rounded-4"
                                   required>

                        </div>

                        <button class="btn btn-success px-4 rounded-4">

                            <i class="fa-solid fa-lock me-2"></i>

                            Update Password

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.card{
    transition:.3s;
}

.card:hover{
    transform:translateY(-5px);
}

/* ALERT */

.floating-alert{
    position:fixed;
    top:20px;
    right:20px;
    z-index:9999;
    min-width:340px;
    padding:18px 20px;
    border-radius:18px;
    color:#fff;
    display:flex;
    align-items:center;
    gap:15px;
    animation:slideIn .5s ease;
    box-shadow:0 10px 30px rgba(0,0,0,.2);
}

.success-alert{
    background:linear-gradient(135deg,#16a34a,#22c55e);
}

.error-alert{
    background:linear-gradient(135deg,#dc2626,#ef4444);
}

.icon-box{
    font-size:38px;
}

/* ANIMATION */

@keyframes slideIn{

    from{
        opacity:0;
        transform:translateX(120%);
    }

    to{
        opacity:1;
        transform:translateX(0);
    }

}

</style>

<script>

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

</script>

@endsection