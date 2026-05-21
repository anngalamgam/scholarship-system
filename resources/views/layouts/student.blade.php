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

    <style>

        body{
            background:#f1f5f9;
            font-family:Arial, sans-serif;
        }

        /* SIDEBAR */

        .sidebar{
            width:270px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:linear-gradient(180deg,#0f172a,#1e293b);
            padding:20px;
            overflow-y:auto;
        }

        .brand{
            color:white;
            font-size:26px;
            font-weight:700;
            text-align:center;
            margin-bottom:40px;
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

        .main-content{
            margin-left:270px;
            padding:30px;
        }

        /* CARDS */

        .dashboard-card{
            background:white;
            border-radius:25px;
            padding:25px;
            box-shadow:0 10px 25px rgba(0,0,0,.05);
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

        /* QUICK BUTTONS */

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

        /* MODAL */

        .modal-content{
            border:none;
            border-radius:30px;
            overflow:hidden;
            background:#f8fafc;
        }

        .modal-header{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            border:none;
            padding:20px 30px;
        }

        .modal-body{
            padding:35px;
        }

        .modal-footer{
            border:none;
            padding:20px 30px;
        }

        .step h3{
            font-weight:700;
            color:#0f172a;
        }

        .form-control,
        .form-select{
            border-radius:14px;
            padding:12px 15px;
            border:1px solid #dbeafe;
        }

        .form-control:focus,
        .form-select:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 0.2rem rgba(37,99,235,.15);
        }

        .progress{
            height:12px;
            border-radius:20px;
            background:#e2e8f0;
        }

        .progress-bar{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
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
            background:rgba(255,255,255,0.1);
            color:white;
        }

        @media(max-width:991px){

            .sidebar{
                width:100%;
                height:auto;
                position:relative;
            }

            .main-content{
                margin-left:0;
            }
        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="brand">
            LGU SCHOLAR PORTAL
        </div>

        <a href="#">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </a>

        <a href="#"
   data-bs-toggle="modal"
   data-bs-target="#pdsModal">

    <i class="fa-solid fa-file-lines"></i>
    Fill-up Form

</a>

        <a href="#">
            <i class="fa-solid fa-print"></i>
            Print PDF
        </a>

        <a href="#">
            <i class="fa-solid fa-file-pdf"></i>
            Download PDF
        </a>

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

    <!-- MAIN -->
    <div class="main-content">

        @yield('content')

    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>