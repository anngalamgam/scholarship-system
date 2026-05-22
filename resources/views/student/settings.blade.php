<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Dashboard</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#f1f5f9;
            font-family:Arial,sans-serif;
            overflow-x:hidden;
        }

        /* =========================
           MOBILE MENU BUTTON
        ========================== */

       .mobile-toggle{
    display:none;

    position:fixed;
    top:15px;
    right:15px;

    width:45px;
    height:45px;

    border:none;
    border-radius:12px;

    background:#2563eb;
    color:white;

    z-index:5000;

    box-shadow:0 5px 15px rgba(0,0,0,.2);
}
        /* =========================
           SIDEBAR
        ========================== */

        .sidebar{
            width:270px;
            height:100vh;

            position:fixed;
            top:0;
            left:0;

            background:linear-gradient(180deg,#0f172a,#1e293b);

            padding:20px;

            overflow-y:auto;

            transition:.3s;

            z-index:3000;
        }

        /* COLLAPSED */

        .sidebar.collapsed{
            width:85px;
        }

        .sidebar.collapsed .link-text{
            display:none;
        }

        .sidebar.collapsed .brand-text{
            display:none;
        }

        .sidebar.collapsed a{
            justify-content:center;
        }

        .sidebar.collapsed .logout-btn{
            justify-content:center;
        }

        /* BRAND */

        .brand{
            display:flex;
            justify-content:space-between;
            align-items:center;

            margin-bottom:40px;
        }

        .brand h4{
            color:white;
            font-weight:700;
            margin:0;
            font-size:20px;
        }

        /* MINIMIZE BUTTON */

        #minSidebar{
            width:35px;
            height:35px;

            border:none;
            border-radius:10px;

            background:white;

            color:#0f172a;

            transition:.3s;
        }

        #minSidebar:hover{
            background:#2563eb;
            color:white;
        }

        /* LINKS */

        .sidebar a{
            display:flex;
            align-items:center;
            gap:12px;

            text-decoration:none;

            color:#cbd5e1;

            padding:14px 16px;

            border-radius:14px;

            margin-bottom:10px;

            transition:.3s;

            font-weight:500;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,.1);
            color:white;
            transform:translateX(5px);
        }

        .sidebar a.active{
            background:#2563eb;
            color:white;
        }

        /* LOGOUT */

        .logout-btn{
            width:100%;

            border:none;
            background:none;

            display:flex;
            align-items:center;
            gap:12px;

            color:#cbd5e1;

            padding:14px 16px;

            border-radius:14px;

            transition:.3s;

            font-weight:500;
        }

        .logout-btn:hover{
            background:rgba(255,255,255,.1);
            color:white;
        }

        /* =========================
           MAIN CONTENT
        ========================== */

        .main-content{
            margin-left:270px;
            padding:30px;

            transition:.3s;
        }

        .main-content.expanded{
            margin-left:85px;
        }

        /* =========================
           TOPBAR
        ========================== */

        .topbar{
            background:white;

            padding:20px 25px;

            border-radius:22px;

            margin-bottom:30px;

            display:flex;
            justify-content:space-between;
            align-items:center;

            box-shadow:0 10px 30px rgba(0,0,0,.05);
        }

        .topbar h3{
            font-weight:700;
            margin-bottom:5px;
        }

        /* =========================
           CARD
        ========================== */

        .card-box{
            background:white;

            border-radius:24px;

            padding:25px;

            box-shadow:0 10px 25px rgba(0,0,0,.05);
        }

        .card-box h3{
            font-weight:700;
        }

        .card-box h5{
            font-weight:700;
            margin-bottom:20px;
        }

        /* =========================
           INPUTS
        ========================== */

        .form-control{
            border-radius:14px;
            border:2px solid #e2e8f0;

            padding:14px 15px;

            transition:.3s;
        }

        .form-control:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 4px rgba(37,99,235,.12);
        }

        /* =========================
           BUTTONS
        ========================== */

        .btn{
            border-radius:14px;
            padding:12px;
            font-weight:600;
        }

        .btn-primary{
            background:#2563eb;
            border:none;
        }

        .btn-success{
            border:none;
        }

        /* =========================
           ALERTS
        ========================== */

        .alert{
            border:none;
            border-radius:16px;
            padding:16px 20px;
            font-weight:600;
        }

        /* =========================
           MOBILE
        ========================== */

        @media(max-width:991px){

            .mobile-toggle{
                display:flex;
                align-items:center;
                justify-content:center;
            }

            .sidebar{
                left:-100%;
            }

            .sidebar.show{
                left:0;
            }

            .main-content{
                margin-left:0 !important;
                padding:15px;
                margin-top:70px;
            }

            .topbar{
                padding:18px;
            }

            #minSidebar{
                display:none;
            }
        }
/* =========================
   FLOATING ALERT
========================= */

.floating-alert{
    position:fixed;

    top:20px;
    right:20px;

    width:380px;
    max-width:90%;

    z-index:99999;

    display:flex;
    align-items:flex-start;
    gap:15px;

    padding:18px 20px;

    border-radius:20px;

    color:white;

    box-shadow:
    0 10px 30px rgba(0,0,0,.25);

    animation:
    slideIn .4s ease,
    floatAlert 3s ease-in-out infinite;

    overflow:hidden;
}

/* SUCCESS */

.success-alert{
    background:linear-gradient(
        135deg,
        #22c55e,
        #16a34a
    );
}

/* ERROR */

.error-alert{
    background:linear-gradient(
        135deg,
        #ef4444,
        #b91c1c
    );
}

/* ICON */

.alert-icon{
    width:55px;
    height:55px;

    min-width:55px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:rgba(255,255,255,.18);

    font-size:22px;
}

/* CONTENT */

.alert-content h5{
    margin:0 0 5px;
    font-size:18px;
    font-weight:700;
}

.alert-content p{
    margin:0;
    font-size:14px;
    opacity:.95;
}

/* CLOSE */

.close-alert{
    border:none;
    background:none;

    color:white;

    font-size:20px;

    margin-left:auto;

    cursor:pointer;

    z-index:999999;

    position:relative;

    padding:5px;

    display:flex;
    align-items:center;
    justify-content:center;
}

/* ANIMATION */

@keyframes slideIn{

    from{
        opacity:0;
        transform:translateX(100px);
    }

    to{
        opacity:1;
        transform:translateX(0);
    }
}

@keyframes floatAlert{

    0%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-4px);
    }

    100%{
        transform:translateY(0);
    }
}

/* MOBILE */

@media(max-width:768px){

    .floating-alert{

        top:15px;
        left:15px;
        right:15px;
pointer-events:auto;
        width:auto;

        padding:16px;
    }

}
    </style>

</head>

<body>

<!-- MOBILE TOGGLE -->
<button class="mobile-toggle"
        id="mobileToggle">

    <i class="fa fa-bars"></i>

</button>

<!-- SIDEBAR -->
<div class="sidebar"
     id="sidebar">

    <!-- BRAND -->
    <div class="brand">

        <h4 class="brand-text">
            LGU PORTAL
        </h4>

        <!-- MINIMIZE -->
        <button id="minSidebar">

            <i class="fa fa-angle-left"></i>

        </button>

    </div>

    <!-- DASHBOARD -->
    <a href="{{ url('/home') }}"
       class="{{ request()->routeIs('student.dashboard') ? 'active' : '' }}">

        <i class="fa fa-home"></i>

        <span class="link-text">
            Dashboard
        </span>

    </a>

    <!-- SETTINGS -->
    <a href="{{ route('student.settings') }}"
       class="{{ request()->routeIs('student.settings') ? 'active' : '' }}">

        <i class="fa fa-gear"></i>

        <span class="link-text">
            Settings
        </span>

    </a>

    <!-- PDF -->
    <a href="{{ route('student.pdf') }}">

        <i class="fa fa-file-pdf"></i>

        <span class="link-text">
            Download PDF
        </span>

    </a>

    <!-- LOGOUT -->
    <form method="POST"
          action="{{ route('logout') }}">

        @csrf

        <button class="logout-btn">

            <i class="fa fa-right-from-bracket"></i>

            <span class="link-text">
                Logout
            </span>

        </button>

    </form>

</div>

<!-- MAIN -->
<div class="main-content"
     id="mainContent">

    <!-- TOPBAR -->
    <div class="topbar">

        <div>

            <h3>
                Student Settings
            </h3>

            <small class="text-muted">
                Manage your student account settings
            </small>

        </div>

    </div>

   {{-- SUCCESS FLOATING ALERT --}}
@if(session('success'))

<div class="floating-alert success-alert"
     id="floatingAlert">

    <div class="alert-icon">

        <i class="fa-solid fa-circle-check"></i>

    </div>

    <div class="alert-content">

        <h5>
            Success
        </h5>

        <p>
            {{ session('success') }}
        </p>

    </div>

    <button class="close-alert"
            onclick="closeAlert()">

        <i class="fa fa-xmark"></i>

    </button>

</div>

@endif

{{-- ERROR FLOATING ALERT --}}
@if(session('error'))

<div class="floating-alert error-alert"
     id="floatingAlert">

    <div class="alert-icon">

        <i class="fa-solid fa-circle-exclamation"></i>

    </div>

    <div class="alert-content">

        <h5>
            Error
        </h5>

        <p>
            {{ session('error') }}
        </p>

    </div>

    <button class="close-alert"
            onclick="closeAlert()">

        <i class="fa fa-xmark"></i>

    </button>

</div>

@endif

{{-- VALIDATION ERROR FLOATING ALERT --}}
@if($errors->any())

<div class="floating-alert error-alert"
     id="floatingAlert">

    <div class="alert-icon">

        <i class="fa-solid fa-circle-exclamation"></i>

    </div>

    <div class="alert-content">

        <h5>
            Validation Error
        </h5>

        <p>
            {{ $errors->first() }}
        </p>

    </div>

    <button class="close-alert"
            onclick="closeAlert()">

        <i class="fa fa-xmark"></i>

    </button>

</div>

@endif

    <!-- SETTINGS ROW -->
    <div class="row g-4">

        <!-- EMAIL -->
        <div class="col-lg-6">

            <div class="card-box h-100">

                <h5>

                    <i class="fa fa-envelope me-2 text-primary"></i>

                    Update Email

                </h5>

                <form method="POST"
                      action="{{ route('student.settings.update') }}">

                    @csrf

                    <div class="mb-3">

                        <label class="mb-2 fw-semibold">
                            Email Address
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ auth()->user()->email }}"
                               class="form-control"
                               required>

                    </div>

                    <button class="btn btn-primary w-100">

                        Save Email

                    </button>

                </form>

            </div>

        </div>

       <!-- PASSWORD -->
<div class="col-lg-6">

    <div class="card-box h-100">

        <h5>

            <i class="fa fa-lock me-2 text-success"></i>

            Update Password

        </h5>

        <form method="POST"
              action="{{ route('student.settings.update') }}"
              id="passwordForm">

            @csrf

            <div class="mb-3">

                <label class="mb-2 fw-semibold">
                    Current Password
                </label>

                <input type="password"
                       name="current_password"
                       class="form-control"
                       placeholder="Enter current password">

            </div>

            <div class="mb-3">

                <label class="mb-2 fw-semibold">
                    New Password
                </label>

                <input type="password"
                       name="password"
                       id="password"
                       class="form-control"
                       placeholder="Enter new password">

            </div>

            <div class="mb-2">

                <label class="mb-2 fw-semibold">
                    Confirm Password
                </label>

                <input type="password"
                       name="password_confirmation"
                       id="confirmPassword"
                       class="form-control"
                       placeholder="Confirm password">

            </div>

            <!-- ERROR MESSAGE -->
            <div id="passwordError"
                 class="text-danger fw-semibold mb-3"
                 style="display:none;">

                Password does not match.

            </div>

            <button class="btn btn-success w-100"
                    id="submitBtn">

                Update Password

            </button>

        </form>
            </div>

        </div>

    </div>

</div>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

const password = document.getElementById('password');

const confirmPassword = document.getElementById('confirmPassword');

const passwordError = document.getElementById('passwordError');

const submitBtn = document.getElementById('submitBtn');

function validatePassword(){

    if(confirmPassword.value === ''){

        passwordError.style.display = 'none';

        confirmPassword.classList.remove('is-invalid');

        submitBtn.disabled = false;

        return;
    }

    if(password.value !== confirmPassword.value){

        passwordError.style.display = 'block';

        confirmPassword.classList.add('is-invalid');

        submitBtn.disabled = true;

    }else{

        passwordError.style.display = 'none';

        confirmPassword.classList.remove('is-invalid');

        submitBtn.disabled = false;

    }

}

password.addEventListener('keyup', validatePassword);

confirmPassword.addEventListener('keyup', validatePassword);

</script>
<script>
    

    const sidebar = document.getElementById('sidebar');

    const mainContent = document.getElementById('mainContent');

    const minSidebar = document.getElementById('minSidebar');

    const mobileToggle = document.getElementById('mobileToggle');

    let collapsed = false;

    // DESKTOP MINIMIZE

    minSidebar.addEventListener('click', () => {

        collapsed = !collapsed;

        sidebar.classList.toggle('collapsed');

        mainContent.classList.toggle('expanded');

        minSidebar.innerHTML = collapsed
            ? '<i class="fa fa-angle-right"></i>'
            : '<i class="fa fa-angle-left"></i>';

    });

    // MOBILE TOGGLE

    mobileToggle.addEventListener('click', () => {

        sidebar.classList.toggle('show');

    });


function closeAlert(){

    const alert = document.getElementById('floatingAlert');

    if(alert){

        alert.style.display = 'none';

    }

}

/* AUTO CLOSE */

setTimeout(() => {

    closeAlert();

}, 4000);


</script>

</body>
</html>