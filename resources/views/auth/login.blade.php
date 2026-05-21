<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LGU Aparri Scholar Portal') }}</title>

    <!-- GOOGLE FONT -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- FONT AWESOME -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Montserrat',sans-serif;
            overflow-x:hidden;
            min-height:100vh;
            position:relative;
            background:#0f172a;
        }

        /* BACKGROUND */

        .background-wrapper{
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            z-index:-2;
            overflow:hidden;
        }

        .background-wrapper img{
            width:100%;
            height:100%;
            object-fit:cover;
            filter:blur(5px) brightness(40%);
            transform:scale(1.1);
        }

        .background-overlay{
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(15,23,42,.55);
            z-index:-1;
        }

        /* MAIN */

        .main-wrapper{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:30px 15px;
        }

        /* LOGIN CARD */

        .login-card{
            width:100%;
            max-width:450px;
            background:rgba(255,255,255,0.12);
            backdrop-filter:blur(18px);
            border:1px solid rgba(255,255,255,.15);
            border-radius:30px;
            padding:40px 30px;
            box-shadow:0 20px 40px rgba(0,0,0,.35);
        }

        /* LOGO */

        .logo-wrapper{
            display:flex;
            justify-content:center;
            margin-bottom:18px;
        }

        .logo{
            width:120px;
            height:120px;
            border-radius:50%;
            object-fit:cover;
            border:4px solid rgba(255,255,255,.25);
            box-shadow:0 10px 25px rgba(0,0,0,.3);
            background:white;
        }

        /* TITLE */

        .portal-title{
            text-align:center;
            color:white;
            font-size:2rem;
            font-weight:800;
            margin-bottom:5px;
        }

        .portal-subtitle{
            text-align:center;
            color:#e2e8f0;
            margin-bottom:30px;
            font-size:.95rem;
        }

        /* FORM */

        .form-title{
            text-align:center;
            color:white;
            font-size:1.2rem;
            font-weight:700;
            margin-bottom:25px;
        }

        .input-group-custom{
            position:relative;
            margin-bottom:20px;
        }

        .input-group-custom input{
            width:100%;
            border:none;
            outline:none;
            padding:15px 50px 15px 18px;
            border-radius:15px;
            background:rgba(255,255,255,.12);
            border:1px solid rgba(255,255,255,.15);
            color:white;
            font-size:.95rem;
            transition:.3s;
        }

        .input-group-custom input::placeholder{
            color:#cbd5e1;
        }

        .input-group-custom input:focus{
            border-color:#60a5fa;
            box-shadow:0 0 0 4px rgba(96,165,250,.2);
        }

        .input-group-custom i{
            position:absolute;
            top:50%;
            right:18px;
            transform:translateY(-50%);
            color:#cbd5e1;
            cursor:pointer;
        }

        /* BUTTON */

        .login-btn{
            width:100%;
            border:none;
            padding:14px;
            border-radius:15px;
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            color:white;
            font-weight:700;
            font-size:1rem;
            transition:.3s;
            margin-top:10px;
        }

        .login-btn:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 25px rgba(37,99,235,.35);
        }

        /* ERROR */

        .error-box{
            background:rgba(239,68,68,.15);
            border:1px solid rgba(239,68,68,.3);
            color:#fee2e2;
            border-radius:15px;
            padding:12px 15px;
            margin-bottom:20px;
            font-size:.9rem;
        }

        .error-box ul{
            margin:0;
            padding-left:18px;
        }

        /* LINKS */

        .extra-links{
            text-align:center;
            margin-top:20px;
            color:#e2e8f0;
            font-size:.92rem;
        }

        .extra-links a{
            color:white;
            text-decoration:none;
            font-weight:700;
        }

        .extra-links a:hover{
            text-decoration:underline;
        }

        /* MOBILE */

        @media(max-width:768px){

            .login-card{
                padding:30px 20px;
                border-radius:25px;
            }

            .logo{
                width:95px;
                height:95px;
            }

            .portal-title{
                font-size:1.6rem;
            }

            .portal-subtitle{
                font-size:.85rem;
            }

            .form-title{
                font-size:1.05rem;
            }

            .input-group-custom input{
                padding:14px 45px 14px 15px;
                font-size:.9rem;
            }

            .login-btn{
                padding:13px;
                font-size:.95rem;
            }
        }

    </style>

</head>

<body>

    <!-- BACKGROUND -->
    <div class="background-wrapper">

        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f8?q=80&w=1600&auto=format&fit=crop"
             alt="Background">

    </div>

    <div class="background-overlay"></div>

    <!-- MAIN -->
    <div class="main-wrapper">

        <div class="login-card">

            <!-- LOGO -->
            <div class="logo-wrapper">

                <a href="{{ url('/') }}">

                    <img src="{{ asset('img/favicon.ico') }}"
                         alt="Logo"
                         class="logo">

                </a>

            </div>

            <!-- TITLE -->
            <h1 class="portal-title">
                LGU Aparri Scholar
            </h1>

            <p class="portal-subtitle">
                Scholarship Application Portal
            </p>

            <!-- FORM -->
            <form method="POST"
                  action="{{ route('login') }}">

                @csrf

                <h3 class="form-title">
                    Sign in to your account
                </h3>

                <!-- ERRORS -->
                @if ($errors->any())

                    <div class="error-box">

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <!-- EMAIL -->
                <div class="input-group-custom">

                    <input type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           placeholder="Enter your email"
                           required
                           autofocus>

                    

                </div>

                <!-- PASSWORD -->
                <div class="input-group-custom">

                    <input type="password"
                           name="password"
                           id="password"
                           placeholder="Enter your password"
                           required>


                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="login-btn">

                    <i class="fa-solid fa-right-to-bracket me-2"></i>
                    Sign In

                </button>

                <!-- REGISTER -->
                <div class="extra-links">

                    Don't have an account?

                    <a href="{{ route('register') }}">
                        Register
                    </a>

                </div>

            </form>

        </div>

    </div>

    <!-- SCRIPT -->
    <script>

        const togglePassword =
            document.getElementById('togglePassword');

        const password =
            document.getElementById('password');

        togglePassword.addEventListener('click', function(){

            const type =
                password.getAttribute('type') === 'password'
                ? 'text'
                : 'password';

            password.setAttribute('type', type);

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');

        });

    </script>

</body>

</html>