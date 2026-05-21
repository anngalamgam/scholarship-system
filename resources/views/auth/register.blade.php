@extends('layouts.app')

@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        background:#0f172a;
        overflow-x:hidden;
        font-family:'Montserrat',sans-serif;
    }

    /* BACKGROUND */

    .register-page{
        min-height:100vh;
        position:relative;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:40px 15px;
        overflow:hidden;
    }

    .register-bg{
        position:absolute;
        inset:0;
        z-index:1;
    }

    .register-bg img{
        width:100%;
        height:100%;
        object-fit:cover;
        filter:blur(5px) brightness(35%);
        transform:scale(1.1);
    }

    .register-overlay{
        position:absolute;
        inset:0;
        background:rgba(0,0,0,0.35);
        z-index:2;
    }

    /* CARD */

    .register-container{
        position:relative;
        z-index:3;
        width:100%;
        max-width:1000px;
    }

    .register-card{
        background:rgba(255,255,255,0.12);
        backdrop-filter:blur(14px);
        border:1px solid rgba(255,255,255,0.15);
        border-radius:30px;
        overflow:hidden;
        box-shadow:0 20px 50px rgba(0,0,0,0.35);
    }

    /* LEFT SIDE */

    .register-left{
        background:linear-gradient(135deg,#2563eb,#1d4ed8);
        color:white;
        padding:60px 40px;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        text-align:center;
        min-height:100%;
    }

    .register-logo{
        width:140px;
        height:140px;
        border-radius:50%;
        object-fit:cover;
        border:5px solid rgba(255,255,255,0.2);
        margin-bottom:25px;
        box-shadow:0 10px 25px rgba(0,0,0,0.25);
    }

    .register-left h2{
        font-size:2rem;
        font-weight:800;
        margin-bottom:15px;
    }

    .register-left p{
        color:#e2e8f0;
        line-height:1.8;
        font-size:1rem;
    }

    /* RIGHT SIDE */

    .register-right{
        background:white;
        padding:50px 40px;
    }

    .register-title{
        font-size:2rem;
        font-weight:800;
        color:#0f172a;
        margin-bottom:10px;
    }

    .register-subtitle{
        color:#64748b;
        margin-bottom:35px;
    }

    /* FORM */

    .form-label{
        font-weight:700;
        color:#1e293b;
        margin-bottom:8px;
    }

    .form-control{
        border-radius:15px;
        padding:14px 16px;
        border:2px solid #cbd5e1;
        transition:.3s;
        box-shadow:none !important;
    }

    .form-control:focus{
        border-color:#2563eb;
    }

    .input-group-text{
        border-radius:15px 0 0 15px;
        border:2px solid #cbd5e1;
        background:#f8fafc;
    }

    /* BUTTON */

    .register-btn{
        width:100%;
        border:none;
        border-radius:15px;
        padding:14px;
        font-weight:700;
        font-size:1rem;
        background:linear-gradient(135deg,#2563eb,#1d4ed8);
        color:white;
        transition:.3s;
    }

    .register-btn:hover{
        transform:translateY(-2px);
    }

    /* LOGIN LINK */

    .login-link{
        text-align:center;
        margin-top:20px;
        color:#64748b;
    }

    .login-link a{
        color:#2563eb;
        font-weight:700;
        text-decoration:none;
    }

    /* MOBILE */

    @media(max-width:991px){

        .register-left{
            padding:40px 25px;
        }

        .register-right{
            padding:40px 25px;
        }

    }

    @media(max-width:768px){

        .register-page{
            padding:20px 10px;
        }

        .register-card{
            border-radius:22px;
        }

        .register-left{
            padding:35px 20px;
        }

        .register-right{
            padding:35px 20px;
        }

        .register-logo{
            width:100px;
            height:100px;
        }

        .register-left h2{
            font-size:1.5rem;
        }

        .register-title{
            font-size:1.7rem;
        }

        .form-control{
            padding:12px 14px;
        }

        .register-btn{
            padding:13px;
        }

    }

</style>

<div class="register-page">

    <!-- BACKGROUND -->
    <div class="register-bg">

        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f8?q=80&w=1600&auto=format&fit=crop"
             alt="Background">

    </div>

    <!-- OVERLAY -->
    <div class="register-overlay"></div>

    <!-- CONTENT -->
    <div class="container register-container">

        <div class="row g-0 register-card">

            <!-- LEFT -->
            <div class="col-lg-5">

                <div class="register-left">

                    <img src="{{ asset('build/assets/img/favicon.ico') }}"
                         class="register-logo"
                         alt="Logo">

                    <h2>
                        LGU Aparri Scholar Portal
                    </h2>

                    <p>
                        Create your account and start your scholarship
                        application journey today.
                    </p>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-7">

                <div class="register-right">

                    <h2 class="register-title">
                        Register
                    </h2>

                    <p class="register-subtitle">
                        Fill in your details to create your account.
                    </p>

                    <form method="POST"
                          action="{{ route('register') }}">

                        @csrf

                        <!-- NAME -->
                        <div class="mb-4">

                            <label for="name"
                                   class="form-label">

                                Full Name

                            </label>

                            <input id="name"
                                   type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required
                                   autocomplete="name"
                                   autofocus
                                   placeholder="Enter your full name">

                            @error('name')

                                <span class="invalid-feedback d-block">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <!-- EMAIL -->
                        <div class="mb-4">

                            <label for="email"
                                   class="form-label">

                                Email Address

                            </label>

                            <input id="email"
                                   type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email"
                                   placeholder="Enter your email">

                            @error('email')

                                <span class="invalid-feedback d-block">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-4">

                            <label for="password"
                                   class="form-label">

                                Password

                            </label>

                            <input id="password"
                                   type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   required
                                   autocomplete="new-password"
                                   placeholder="Enter your password">

                            @error('password')

                                <span class="invalid-feedback d-block">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="mb-4">

                            <label for="password-confirm"
                                   class="form-label">

                                Confirm Password

                            </label>

                            <input id="password-confirm"
                                   type="password"
                                   class="form-control"
                                   name="password_confirmation"
                                   required
                                   autocomplete="new-password"
                                   placeholder="Confirm your password">

                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                                class="register-btn">

                            Create Account

                        </button>

                        <!-- LOGIN -->
                        <div class="login-link">

                            Already have an account?

                            <a href="{{ route('login') }}">

                                Login

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection