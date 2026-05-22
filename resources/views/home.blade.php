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

        /* SIDEBAR */

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
             z-index:1040;
        }

        .sidebar.show{
            left:0;
        }

       .brand{
    color:white;
    font-size:24px;
    font-weight:700;
    text-align:center;
    margin-bottom:40px;
    line-height:1.3;
    word-break:break-word;
}

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
            background:rgba(255,255,255,0.1);
            color:white;
        }

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
            background:rgba(255,255,255,0.1);
            color:white;
        }

        /* MAIN CONTENT */

        .main-content{
            margin-left:270px;
            padding:30px;
            transition:.3s;
        }

        /* MOBILE TOPBAR */

        .mobile-topbar{
            display:none;
            background:white;
            padding:15px 20px;
            align-items:center;
            justify-content:space-between;
            box-shadow:0 5px 20px rgba(0,0,0,.05);
            position:sticky;
            top:0;
            z-index:1030;
        }

        .menu-btn{
            width:45px;
            height:45px;
            border:none;
            border-radius:12px;
            background:#2563eb;
            color:white;
            font-size:18px;
        }

        /* TOPBAR */

        .topbar{
            background:white;
            padding:20px 25px;
            border-radius:20px;
            margin-bottom:30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 5px 20px rgba(0,0,0,.05);
        }

        /* CARDS */

        .dashboard-card{
            background:white;
            border-radius:25px;
            padding:25px;
            box-shadow:0 10px 25px rgba(0,0,0,.05);
            height:100%;
        }

        .welcome-card{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            color:white;
        }

        .profile-image{
            width:90px;
            height:90px;
            border-radius:50%;
        }

        /* QUICK BUTTON */

        .quick-btn{
            border-radius:18px;
            padding:18px;
            font-weight:600;
            border:none;
            transition:.3s;
        }

        .quick-btn:hover{
            transform:translateY(-3px);
        }

        /* ACTIVITY */

        .activity-item{
            display:flex;
            gap:15px;
            margin-bottom:20px;
        }

        .activity-icon{
            width:45px;
            height:45px;
            border-radius:50%;
            background:#dbeafe;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#2563eb;
        }

        /* MODAL */

        #pdsModal .modal-content{
            border-radius:28px;
            overflow:hidden;
            border:none;
            background:#f8fafc;
            box-shadow:0 20px 50px rgba(0,0,0,.18);
        }

        #pdsModal .modal-header{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            border:none;
            padding:22px 30px;
        }

        #pdsModal .modal-title{
            font-size:1.5rem;
            font-weight:700;
        }

        #pdsModal .modal-body{
            padding:35px;
        }

        #pdsModal .modal-footer{
            border:none;
            padding:20px 30px;
            background:#f1f5f9;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:10px;
            flex-wrap:wrap;
        }

        #pdsModal h3{
            font-size:1.3rem;
            font-weight:700;
            color:#1e293b;
            border-left:5px solid #2563eb;
            padding-left:12px;
            margin-bottom:25px;
        }

        #pdsModal label{
            font-weight:600;
            color:#334155;
            margin-bottom:7px;
            display:block;
        }

        #pdsModal .form-control,
        #pdsModal .form-select{
            border-radius:14px;
            border:2px solid #cbd5e1;
            padding:13px 15px;
            background:white;
            transition:.3s;
            color:#0f172a;
        }

        #pdsModal .form-control::placeholder{
            color:#94a3b8;
        }

        #pdsModal .form-control:focus,
        #pdsModal .form-select:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 4px rgba(37,99,235,.15);
        }

        #pdsModal textarea{
            resize:none;
        }

        #pdsModal .progress{
            height:12px;
            border-radius:50px;
            background:#dbeafe;
            overflow:hidden;
        }

        #pdsModal .progress-bar{
            background:linear-gradient(90deg,#2563eb,#60a5fa);
            transition:.4s ease;
        }

        #pdsModal .btn{
            border-radius:12px;
            padding:11px 25px;
            font-weight:600;
            min-width:120px;
        }

        .step{
            animation:fadeSlide .4s ease;
        }

        @keyframes fadeSlide{

            from{
                opacity:0;
                transform:translateX(20px);
            }

            to{
                opacity:1;
                transform:translateX(0);
            }
        }

        /* MOBILE */

        @media(max-width:991px){

            .sidebar{
                left:-100%;
            }

            .sidebar.show{
                left:0;
            }

            .mobile-topbar{
                display:flex;
            }

            .main-content{
                margin-left:0;
                padding:15px;
            }

            .topbar{
                flex-direction:column;
                align-items:flex-start;
                gap:10px;
            }

            .welcome-card .d-flex{
                flex-direction:column;
                text-align:center;
            }

            .profile-image{
                width:70px;
                height:70px;
            }

            #pdsModal .modal-dialog{
                margin:10px;
            }

            #pdsModal .modal-body{
                padding:20px;
                max-height:65vh;
                overflow-y:auto;
            }

            /* FIX BUTTONS ON MOBILE */

            #pdsModal .modal-footer{
                flex-direction:row;
                justify-content:space-between;
                flex-wrap:nowrap;
            }

            #pdsModal .modal-footer .btn{
                width:48%;
                min-width:auto;
            }

            #pdsModal .row > div{
                width:100%;
            }
        }

#pdsModal .btn-close{
    width:40px;
    height:40px;
    border-radius:50%;
    background-color:rgba(255,255,255,.15);
    opacity:1;
}
.modal{
    z-index:2000 !important;
}

.modal-backdrop{
    z-index:1990 !important;
}
        /* PDF ALERT */

.pdf-alert{
    position:fixed;
    top:100px;
    right:-500px;
    width:380px;
    max-width:90%;
    background:linear-gradient(135deg,#ef4444,#b91c1c);
    color:white;
    padding:18px 20px;
    border-radius:20px;
    display:flex;
    align-items:flex-start;
    gap:15px;
    z-index:2000;
    pointer-events:auto;
    box-shadow:0 10px 30px rgba(0,0,0,.25);
    transition:.5s ease;
}

.pdf-alert.show{
    right:20px;
}

.pdf-alert-icon{
    width:55px;
    height:55px;

    min-width:55px;

    border-radius:50%;

    background:rgba(255,255,255,.18);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:22px;
}

.pdf-close{
    margin-left:auto;

    border:none;
    background:none;

    color:white;

    font-size:20px;

    cursor:pointer;
}

.pdf-alert h5{
    font-weight:700;
}

.pdf-alert p{
    font-size:14px;
    opacity:.95;
}

@media(max-width:768px){

    .pdf-alert{
        top:80px;
        left:10px;
        right:10px;
        width:auto;
        max-width:none;

        transform:translateY(-20px);
        opacity:0;
    }

    .pdf-alert.show{
        transform:translateY(0);
        opacity:1;
    }

}


.sidebar{
    z-index:1050;
}

.mobile-topbar{
    z-index:1060;
}

    </style>

</head>

<body>
    <!-- PDF ALERT -->
<div class="pdf-alert" id="pdfAlert">

    <div class="pdf-alert-icon">

        <i class="fa-solid fa-file-circle-xmark"></i>

    </div>

    <div>

        <h5 class="mb-1">
            Fill-up Form First
        </h5>

        <p class="mb-0">
            You need to complete and submit your scholar form before downloading the PDF.
        </p>

    </div>

    <button class="pdf-close"
            onclick="closePdfAlert()">

        <i class="fa-solid fa-xmark"></i>

    </button>

</div>

    <!-- MOBILE TOPBAR -->
    <div class="mobile-topbar">

        <h5 class="fw-bold mb-0">
            LGU PORTAL
        </h5>

        <button class="menu-btn"
                id="menuBtn">

            <i class="fa-solid fa-bars"></i>

        </button>

    </div>

    <!-- SIDEBAR -->
    <div class="sidebar"
         id="sidebar">

        <div class="brand">
            LGU SCHOLAR PORTAL
        </div>

        <a href="#">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </a>

        <a href="{{ route('student.settings') }}">
        <i class="fa fa-gear"></i> Settings
    </a>

        <a href="#"
           data-bs-toggle="modal"
           data-bs-target="#pdsModal">

            <i class="fa-solid fa-file-lines"></i>
            Fill-up Form

        </a>
        {{-- DOWNLOAD PDF SIDEBAR BUTTON --}}

@if($record)

    <a href="{{ route('student.pdf') }}">

        <i class="fa-solid fa-file-pdf"></i>
        Download PDF

    </a>

@else

    <a href="javascript:void(0)"
       onclick="showPdfAlert()">

        <i class="fa-solid fa-file-pdf"></i>
        Download PDF

    </a>

@endif

       

     

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                    class="logout-btn">

                <i class="fa-solid fa-right-from-bracket"></i>
                Logout

            </button>

        </form>

    </div>

    <script>document.addEventListener('click', function(e){

    if(
        window.innerWidth <= 991 &&
        !sidebar.contains(e.target) &&
        !menuBtn.contains(e.target)
    ){

        sidebar.classList.remove('show');

    }

});</script>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar">

            <div>

                <h3 class="fw-bold mb-0">
                    Student Dashboard
                </h3>

                <small class="text-muted">
                    Welcome back to your Scholar Application Portal
                </small>

            </div>

            

        </div>

        <!-- ROW -->
        <div class="row g-4">

   @if(session('success'))

<!-- FLOATING SUCCESS ALERT -->
<div class="floating-alert success-alert">

    <div class="alert-icon">
        <i class="fa-solid fa-circle-check"></i>
    </div>

    <div class="alert-content">

        <h5>
            Form Successfully Submitted
        </h5>

        <p>
            Your scholar application form has been submitted successfully.
            You can now print or download your PDF.
        </p>

    </div>

</div>

@endif


@if(session('already_submitted'))

<!-- FLOATING ERROR ALERT -->
<div class="floating-alert submitted-alert">

    <div class="alert-icon">
        <i class="fa-solid fa-ban"></i>
    </div>

    <div class="alert-content">

        <h5>
            You Already Submitted
        </h5>

        <p>
            You already created your scholar application form.
            You cannot create another form.
        </p>

    </div>

</div>

@endif


<style>

.floating-alert{
    position:fixed;

    top:90px;
    right:20px;

    width:380px;
    max-width:90%;

    z-index:99999;

    display:flex;
    align-items:flex-start;
    gap:15px;

    padding:18px 20px;

    border-radius:20px;

    backdrop-filter:blur(12px);

    box-shadow:
    0 10px 30px rgba(0,0,0,.25);

    animation:
    slideIn .5s ease,
    floatAlert 3s ease-in-out infinite;

    overflow:hidden;
}

/* SUCCESS */

.success-alert{
    background:linear-gradient(
        135deg,
        rgba(34,197,94,.95),
        rgba(22,163,74,.92)
    );

    color:white;
}

/* ERROR */

.submitted-alert{
    background:linear-gradient(
        135deg,
        rgba(239,68,68,.95),
        rgba(185,28,28,.92)
    );

    color:white;
}

/* ICON */

.alert-icon{
    width:58px;
    height:58px;

    min-width:58px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:rgba(255,255,255,.18);

    font-size:24px;

    animation:pulseIcon 2s infinite;
}

/* CONTENT */

.alert-content h5{
    margin:0 0 6px;
    font-size:18px;
    font-weight:800;
}

.alert-content p{
    margin:0;
    font-size:14px;
    line-height:1.6;
    opacity:.95;
}

/* SLIDE ANIMATION */

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

/* FLOAT EFFECT */

@keyframes floatAlert{

    0%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-6px);
    }

    100%{
        transform:translateY(0);
    }
}

/* ICON PULSE */

@keyframes pulseIcon{

    0%{
        transform:scale(1);
    }

    50%{
        transform:scale(1.08);
    }

    100%{
        transform:scale(1);
    }
}

/* MOBILE */

@media(max-width:768px){

    .floating-alert{
        top:80px;
        right:10px;
        left:10px;

        width:auto;

        padding:16px;
    }

    .alert-content h5{
        font-size:16px;
    }

    .alert-content p{
        font-size:13px;
    }

    .alert-icon{
        width:50px;
        height:50px;
        min-width:50px;
        font-size:20px;
    }

}
</style>

            <!-- WELCOME -->
            <div class="col-lg-8">

                <div class="dashboard-card welcome-card">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        <div>

                            <h2 class="fw-bold mb-3">
                                Welcome <span class="fw-semibold">
                    {{ auth()->user()->name }}
                </span> 👋
                            </h2>

                            <p class="mb-4">
                                Complete your LGU Scholar Application Form.
                            </p>

                            <button class="btn btn-light btn-lg rounded-pill px-4 glowing-form-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#pdsModal">

                        <i class="fa-solid fa-pen-to-square me-2"></i>

                        Fill-up your form

                    </button>

                        </div>

                       

                    </div>

                </div>

            </div>
            <style>.glowing-form-btn{
    position:relative;

    background:linear-gradient(135deg,#38bdf8,#2563eb) !important;

    color:white !important;

    border:none !important;

    font-weight:700;

    padding:14px 35px !important;

    overflow:hidden;

    transition:.4s ease;

    animation:
    glowButton 2s infinite,
    floatButton 3s ease-in-out infinite;

    box-shadow:
    0 0 10px rgba(56,189,248,.6),
    0 0 25px rgba(37,99,235,.5);
}

/* SHINE EFFECT */

.glowing-form-btn::before{
    content:'';

    position:absolute;

    top:0;
    left:-100%;

    width:100%;
    height:100%;

    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,.5),
        transparent
    );

    transition:.6s;
}

/* HOVER */

.glowing-form-btn:hover{
    transform:translateY(-4px) scale(1.03);

    color:white !important;

    box-shadow:
    0 0 20px rgba(56,189,248,.9),
    0 0 45px rgba(37,99,235,.8);
}

/* SHINE MOVE */

.glowing-form-btn:hover::before{
    left:100%;
}

/* GLOW ANIMATION */

@keyframes glowButton{

    0%{
        box-shadow:
        0 0 10px rgba(56,189,248,.5),
        0 0 20px rgba(37,99,235,.4);
    }

    50%{
        box-shadow:
        0 0 20px rgba(56,189,248,.9),
        0 0 45px rgba(37,99,235,.8);
    }

    100%{
        box-shadow:
        0 0 10px rgba(56,189,248,.5),
        0 0 20px rgba(37,99,235,.4);
    }
}

/* FLOAT EFFECT */

@keyframes floatButton{

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

    .glowing-form-btn{
        width:100%;
        font-size:15px !important;
        padding:13px 20px !important;
    }

}</style>

            <!-- PROGRESS -->
            <div class="col-lg-4">

    <div class="dashboard-card completion-card">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="fw-bold mb-0 text-white">
                Form Completion
            </h5>

            <div class="completion-icon">

                <i class="fa-solid fa-chart-line"></i>

            </div>

        </div>

        <!-- PROGRESS -->
        <div class="progress custom-progress mb-3">

            <div class="progress-bar custom-progress-bar
                {{ $completion == 100 ? 'bg-success' : 'bg-danger' }}"
                 role="progressbar"
                 style="width: {{ $completion }}%">

            </div>

        </div>

        <!-- PERCENT -->
        <div class="d-flex justify-content-between align-items-center">

            <h2 class="fw-bold
                {{ $completion == 100 ? 'text-success' : 'text-danger' }}">

                {{ $completion }}%

            </h2>

            @if($completion == 100)

                <span class="badge bg-success px-3 py-2 rounded-pill">

                    Completed

                </span>

            @else

                <span class="badge bg-danger px-3 py-2 rounded-pill">

                    Incomplete

                </span>

            @endif

        </div>

    </div>

</div>
<style>
    /* COMPLETION CARD */

.completion-card{
    background:linear-gradient(135deg,#0f172a,#1e293b);

    border-radius:24px;

    padding:25px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.25);

    border:1px solid rgba(255,255,255,.08);

    transition:.4s ease;

    
}

/* HOVER */

.completion-card:hover{
    transform:translateY(-5px);

    box-shadow:
    0 15px 40px rgba(56,189,248,.15);
}

/* ICON */

.completion-icon{
    width:50px;
    height:50px;

    border-radius:16px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:linear-gradient(135deg,#38bdf8,#2563eb);

    color:white;

    font-size:20px;

    box-shadow:
    0 0 20px rgba(56,189,248,.4);
}

/* PROGRESS */

.custom-progress{
    height:14px;

    border-radius:50px;

    background:rgba(255,255,255,.1);

    overflow:hidden;
}

/* BAR */

.custom-progress-bar{
    border-radius:50px;

    transition:width 1s ease;

    animation:glowProgress 2s infinite;
}

/* FLOAT */

@keyframes floatCard{

    0%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-5px);
    }

    100%{
        transform:translateY(0);
    }
}

/* GLOW */

@keyframes glowProgress{

    0%{
        box-shadow:0 0 5px rgba(255,255,255,.2);
    }

    50%{
        box-shadow:0 0 20px rgba(255,255,255,.5);
    }

    100%{
        box-shadow:0 0 5px rgba(255,255,255,.2);
    }
}

/* MOBILE */

@media(max-width:768px){

    .completion-card{
        padding:20px;
    }

    .completion-icon{
        width:45px;
        height:45px;
        font-size:18px;
    }

}
</style>

        <!-- QUICK ACTIONS -->
        <div class="row g-4 mt-1">

            <div class="col-lg-8">

                <div class="dashboard-card">

                    <h4 class="fw-bold mb-4">
                        Quick Actions
                    </h4>

                    <div class="row g-3">

                        <div class="col-md-4">

                            <button class="btn btn-primary w-100 quick-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#pdsModal">

                                <i class="fa-solid fa-file-lines mb-2"></i>
                                <br>
                                Fill-up Form

                            </button>

                        </div>

                       

                       {{-- DOWNLOAD PDF BODY BUTTON --}}

<div class="col-md-4">

    @if($record)

        <a href="{{ route('student.pdf') }}"
           class="text-decoration-none">

            <button class="btn btn-danger w-100 quick-btn">

                <i class="fa-solid fa-file-pdf mb-2"></i>
                <br>

                Download PDF

            </button>

        </a>

    @else

        <button type="button"
                class="btn btn-danger w-100 quick-btn"
                onclick="showPdfAlert()">

            <i class="fa-solid fa-file-pdf mb-2"></i>
            <br>

            Download PDF

        </button>

    @endif

</div>

                    </div>

                </div>

            </div>

        <!-- ACTIVITY -->
<div class="col-lg-4">

    <div class="dashboard-card">

        <h4 class="fw-bold mb-4">
            Recent Activity
        </h4>

        @if($record)

            <!-- FORM SUBMITTED -->
            <div class="activity-item">

                <div class="activity-icon">
                    <i class="fa-solid fa-file-circle-check"></i>
                </div>

                <div>

                    <div class="fw-semibold">
                        Scholar Form Submitted
                    </div>

                    <small class="text-muted">
                        {{ $record->created_at->diffForHumans() }}
                    </small>

                </div>

            </div>

            <!-- PROFILE UPDATED -->
            <div class="activity-item">

                <div class="activity-icon">
                    <i class="fa-solid fa-user-pen"></i>
                </div>

                <div>

                    <div class="fw-semibold">
                        Profile Completed
                    </div>

                    <small class="text-muted">
                        {{ $record->updated_at->diffForHumans() }}
                    </small>

                </div>

            </div>

        @else

            <!-- NO ACTIVITY -->
            <div class="activity-item">

                <div class="activity-icon">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>

                <div>

                    <div class="fw-semibold">
                        No Activity Yet
                    </div>

                    <small class="text-muted">
                        Please fill-up your scholar form
                    </small>

                </div>

            </div>

        @endif

    </div>

</div>


    <!-- MODAL -->
    <div class="modal fade"
         id="pdsModal"
         tabindex="-1">

        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">

            <div class="modal-content">

                <form action="{{ route('student.store') }}"
      method="POST"
      enctype="multipart/form-data"
      id="pdsForm">

    @csrf

    <!-- HEADER -->
    <div class="modal-header text-white">

        <h4 class="modal-title">
            LGU Scholar Form
        </h4>

        <button type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="modal">
        </button>

    </div>

    <!-- BODY -->
    <div class="modal-body">

        <!-- PROGRESS -->
        <div class="progress mb-4">

            <div class="progress-bar"
                 id="progressBar"
                 style="width:33%">
            </div>

        </div>

        <!-- STEP 1 -->
        <div class="step"
             id="step1">

            <h3>Student Profile</h3>

            <div class="row g-3">

                <div class="col-md-4">
                    <label>First Name</label>
                    <input type="text"
                           name="first_name"
                           class="form-control"
                           placeholder="Enter first name"
                           required>
                </div>

                <div class="col-md-4">
                    <label>Middle Name</label>
                    <input type="text"
                           name="middle_name"
                           class="form-control"
                           placeholder="Enter middle name"
                          >
                </div>

                <div class="col-md-4">
                    <label>Last Name</label>
                    <input type="text"
                           name="last_name"
                           class="form-control"
                           placeholder="Enter last name"
                           required>
                </div>

                <div class="col-md-4">
                    <label>Age</label>
                    <input type="number"
                           name="age"
                           class="form-control"
                           placeholder="Enter your Age"
                           required>
                </div>

                <div class="col-md-4">
                    <label>Birth Date</label>
                    <input type="date"
                           name="birth_date"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-4">
                    <label>Gender</label>

                    <select name="gender"
                            class="form-select"
                            required>

                        <option value="">
                            Select gender
                        </option>

                        <option>
                            Male
                        </option>

                        <option>
                            Female
                        </option>

                    </select>
                </div>

                <div class="col-md-4">
                    <label>Contact Number</label>
                    <input type="text"
                           name="contact_number"
                           class="form-control"
                           placeholder="Enter contact number"
                           required>
                </div>

                <div class="col-md-4">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Enter email"
                           >
                </div>

                <div class="col-md-4">
                    <label>Address</label>

                    <textarea name="address"
                              class="form-control"
                              rows="3"
                              placeholder="Enter address"
                              required></textarea>
                </div>

            </div>

        </div>

        <!-- STEP 2 -->
        <div class="step d-none"
             id="step2">

            <h3>Educational Attainment</h3>

            <div class="row g-3">

                <div class="col-md-6">
                    <label>Elementary School</label>
                    <input type="text"
                           name="elementary_school"
                           class="form-control"
                           placeholder="Enter elementary school"
                           required>
                </div>

                <div class="col-md-6">
                    <label>Year Graduated</label>
                    <input type="text"
                           name="elementary_year"
                           class="form-control"
                           placeholder="Enter year graduated"
                           required>
                </div>

                <div class="col-md-6">
                    <label>High School</label>
                    <input type="text"
                           name="highschool_school"
                           class="form-control"
                           placeholder="Enter high school"
                           required>
                </div>

                <div class="col-md-6">
                    <label>Year Graduated</label>
                    <input type="text"
                           name="highschool_year"
                           class="form-control"
                           placeholder="Enter year graduated"
                           required>
                </div>

                <div class="col-md-6">
                    <label>College School</label>
                    <input type="text"
                           name="college_school"
                           class="form-control"
                           placeholder="Enter college school"
                           required>
                </div>

                <div class="col-md-6">
                    <label>Course</label>
                    <input type="text"
                           name="college_course"
                           class="form-control"
                           placeholder="Enter course"
                           required>
                </div>

                

            </div>

        </div>

        <!-- STEP 3 -->
        <div class="step d-none"
             id="step3">

            <h3>Family Background</h3>

            <div class="row g-3">

                <div class="col-md-6">
                    <label>Father Name</label>
                    <input type="text"
                           name="father_name"
                           class="form-control"
                           placeholder="Enter father name"
                           required>
                </div>

                <div class="col-md-6">
                    <label>Father Occupation</label>
                    <input type="text"
                           name="father_occupation"
                           class="form-control"
                           placeholder="Enter father occupation"
                           required>
                </div>

                <div class="col-md-6">
                    <label>Mother Name</label>
                    <input type="text"
                           name="mother_name"
                           class="form-control"
                           placeholder="Enter mother name"
                           required>
                </div>

                <div class="col-md-6">
                    <label>Mother Occupation</label>
                    <input type="text"
                           name="mother_occupation"
                           class="form-control"
                           placeholder="Enter mother occupation"
                           required>
                </div>

                <div class="col-md-6">
                    <label>Guardian Name</label>
                    <input type="text"
                           name="guardian_name"
                           class="form-control"
                           placeholder="Enter guardian name"
                           required>
                </div>

                <div class="col-md-6">
                    <label>Guardian Contact</label>
                    <input type="text"
                           name="guardian_contact"
                           class="form-control"
                           placeholder="Enter guardian contact"
                           required>
                </div>

                <div class="col-md-12">
                    <label>Total Annual Family Income</label>
                    <input type="text"
                           name="annual"
                           class="form-control"
                           placeholder="Enter annual income"
                           required>
                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->
    <div class="modal-footer">

        <button type="button"
                class="btn btn-secondary"
                id="prevBtn">

            Previous

        </button>

        <button type="button"
                class="btn btn-primary"
                id="nextBtn">

            Next

        </button>

        <button type="submit"
                class="btn btn-success d-none"
                id="submitBtn">

            Save PDF

        </button>

    </div>

</form>

            </div>

        </div>

    </div>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>

    // MOBILE SIDEBAR

    const menuBtn = document.getElementById('menuBtn');

    const sidebar = document.getElementById('sidebar');

    menuBtn.addEventListener('click', () => {

        sidebar.classList.toggle('show');

    });

    // MULTISTEP MODAL

    let currentStep = 1;

    const totalSteps = 3;

    const nextBtn = document.getElementById('nextBtn');

    const prevBtn = document.getElementById('prevBtn');

    const submitBtn = document.getElementById('submitBtn');

    const progressBar = document.getElementById('progressBar');

    function validateStep(step){

        let valid = true;

        const currentInputs = document.querySelectorAll(
            '#step' + step + ' input, #step' + step + ' select, #step' + step + ' textarea'
        );

        currentInputs.forEach(input => {

            if(!input.checkValidity()){

                input.reportValidity();

                valid = false;

            }

        });

        return valid;
    }

    function updateSteps(){

        document.querySelectorAll('.step')
            .forEach(step => step.classList.add('d-none'));

        document.getElementById('step' + currentStep)
            .classList.remove('d-none');

        progressBar.style.width =
            ((currentStep / totalSteps) * 100) + '%';

        prevBtn.style.display =
            currentStep === 1 ? 'none' : 'inline-block';

        nextBtn.classList.toggle(
            'd-none',
            currentStep === totalSteps
        );

        submitBtn.classList.toggle(
            'd-none',
            currentStep !== totalSteps
        );
    }

    nextBtn.addEventListener('click', () => {

        if(!validateStep(currentStep)){
            return;
        }

        if(currentStep < totalSteps){

            currentStep++;

            updateSteps();

        }

    });

    prevBtn.addEventListener('click', () => {

        if(currentStep > 1){

            currentStep--;

            updateSteps();

        }

    });

    document.getElementById('pdsForm')
        .addEventListener('submit', function(e){

            if(!validateStep(currentStep)){

                e.preventDefault();

            }

        });

    updateSteps();



function showPdfAlert(){

    const alertBox = document.getElementById('pdfAlert');

    alertBox.classList.add('show');

    setTimeout(() => {

        alertBox.classList.remove('show');

    }, 4000);

}

function closePdfAlert(){

    const alertBox = document.getElementById('pdfAlert');

    alertBox.classList.remove('show');

}

setTimeout(() => {

    document.querySelectorAll('.floating-alert')
        .forEach(alert => {

            alert.style.opacity = '0';

            setTimeout(() => {

                alert.remove();

            }, 500);

        });

}, 4000);
</script>

</body>

</html>