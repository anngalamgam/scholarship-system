<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>LGU Aparri Scholar Portal</title>

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
          rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
          rel="stylesheet"
          type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic"
          rel="stylesheet"
          type="text/css" />

    <!-- Styles -->
    <link rel="stylesheet"
          href="{{ asset('build/assets/new/css/styles.css')}}">

    <!-- Bootstrap -->
    
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        html,
        body{
            width:100%;
            overflow-x:hidden;
            font-family:'Montserrat',sans-serif;
            background:#0f172a;
        }

        /* NAVBAR */

        #mainNav{
            background:rgba(15,23,42,0.95) !important;
            backdrop-filter:blur(10px);
            padding:12px 0;
            transition:.3s;
        }

        .navbar-brand{
            display:flex;
            align-items:center;
        }

        .navbar-brand img{
            width:70px;
            height:70px;
            min-width:70px;
            min-height:70px;
            max-width:70px;
            max-height:70px;

            border-radius:50%;
            object-fit:cover;
            object-position:center;

            display:block;

            border:3px solid rgba(255,255,255,0.2);

            background:transparent;
        }

        .nav-link{
            color:white !important;
            font-weight:600;
            transition:.3s;
        }

        .nav-link:hover{
            background:rgba(255,255,255,0.1);
        }

        /* HERO */

        .masthead{
            position:relative;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            padding:130px 20px 60px;
        }

        /* BACKGROUND */

        .bg-carousel{
            position:absolute;
            inset:0;
            width:100%;
            height:100%;
            z-index:1;
        }

        .bg-carousel .carousel-item{
            height:100vh;
        }

        .bg-carousel img{
            width:100%;
            height:100%;
            object-fit:cover;
            filter:blur(4px) brightness(35%);
            transform:scale(1.1);
        }

        /* OVERLAY */

        .masthead-overlay{
            position:absolute;
            inset:0;
            background:rgba(0,0,0,0.35);
            z-index:2;
        }

        /* CONTENT */

        .hero-content{
            position:relative;
            z-index:3;
            width:100%;
        }

        /* LOGO FIX */

        .logo-wrapper{
            width:190px;
            height:190px;

            border-radius:50%;

            overflow:hidden;

            display:flex;
            align-items:center;
            justify-content:center;

            margin:0 auto 35px;

            border:5px solid rgba(255,255,255,0.2);

            box-shadow:0 10px 30px rgba(0,0,0,0.35);

            background:transparent;
        }

        .masthead-avatar{
            width:100%;
            height:100%;

            object-fit:cover;
            object-position:center;

            display:block;

            border-radius:50%;
        }

        /* TITLE */

        .masthead-heading{
            font-size:3.5rem;
            font-weight:800;
            color:white;
            line-height:1.2;
            text-shadow:0 5px 20px rgba(0,0,0,0.5);
        }

        .masthead-subheading{
            margin-top:18px;
            color:#f8fafc;
            font-size:1.15rem;
            max-width:700px;
            margin-left:auto;
            margin-right:auto;
            line-height:1.8;
        }

        /* DIVIDER */

        .divider-custom{
            margin:2rem 0;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:15px;
        }

        .divider-custom-line{
            width:100px;
            height:4px;
            background:white;
            border-radius:50px;
        }

        .divider-custom-icon{
            color:white;
            font-size:1.2rem;
        }

        /* BUTTON */

        .hero-btn{
            border:none;
            border-radius:50px;
            padding:15px 40px;
            font-weight:700;
            font-size:1rem;
            transition:.3s;
        }

        .hero-btn:hover{
            transform:translateY(-3px);
        }

        /* FOOTER */

        .footer{
            background:#0f172a;
        }

        .copyright{
            background:#020617;
        }

        .btn-social{
            width:50px;
            height:50px;
            border-radius:50%;
            display:inline-flex;
            align-items:center;
            justify-content:center;
        }

        /* TABLET */

        @media(max-width:991px){

            .masthead-heading{
                font-size:2.7rem;
            }

            .logo-wrapper{
                width:160px;
                height:160px;
            }

        }

        /* MOBILE */

        @media(max-width:768px){

            #mainNav{
                padding:10px 0;
            }

            .navbar-brand img{
                width:55px;
                height:55px;
                min-width:55px;
                min-height:55px;
                max-width:55px;
                max-height:55px;
            }

            .masthead{
                padding:120px 15px 50px;
            }

            .logo-wrapper{
                width:200px;
                height:200px;

                min-width:200px;
                min-height:200px;

                max-width:200px;
                max-height:200px;

                margin-bottom:50px;
            }

            .masthead-heading{
                font-size:2rem;
                line-height:1.4;
            }

            .masthead-subheading{
                font-size:.95rem;
                line-height:1.7;
                padding:0 10px;
            }

            .divider-custom-line{
                width:60px;
            }

            .hero-btn{
                width:100%;
                max-width:260px;
                padding:14px 20px;
                font-size:.95rem;
            }

        }
        /* GLOW BUTTON */

.glow-btn{
    background:linear-gradient(135deg,#38bdf8,#2563eb);
    color:white !important;
    border:none;
    position:relative;
    overflow:hidden;

    animation:glowPulse 2s infinite;
}

/* HOVER */

.glow-btn:hover{
    color:white !important;
    transform:translateY(-3px) scale(1.03);
}

/* GLOW EFFECT */

@keyframes glowPulse{

    0%{
        box-shadow:
        0 0 5px #38bdf8,
        0 0 10px #38bdf8,
        0 0 20px #2563eb;
    }

    50%{
        box-shadow:
        0 0 15px #38bdf8,
        0 0 30px #38bdf8,
        0 0 50px #2563eb;
    }

    100%{
        box-shadow:
        0 0 5px #38bdf8,
        0 0 10px #38bdf8,
        0 0 20px #2563eb;
    }
}
.custom-toggler{
    width:50px;
    height:50px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,#38bdf8,#2563eb);
    color:white;
    font-size:1.2rem;

    display:flex;
    align-items:center;
    justify-content:center;

    transition:.3s;

    animation:togglerGlow 2s infinite;
}

/* HOVER */

.custom-toggler:hover{
    transform:scale(1.05);
    color:white;
}

/* REMOVE BOOTSTRAP BORDER */

.custom-toggler:focus{
    box-shadow:none;
}
/* HERO TITLE */

.hero-title-wrapper{
    position:relative;
    display:inline-block;
    padding:10px 25px;
}

/* MAIN TITLE */

.masthead-heading{
    font-size:3.4rem;
    font-weight:900;
    line-height:1.2;
    letter-spacing:2px;
    position:relative;
    z-index:2;
}

/* GLOW TEXT */

.title-glow{
    color:#ffffff;

    text-shadow:
    0 0 10px #38bdf8,
    0 0 20px #38bdf8,
    0 0 40px #2563eb;

    animation:titleGlow 2.5s infinite;
}

/* SECOND TITLE */

.title-outline{
    color:#e0f2fe;

    text-shadow:
    0 0 8px rgba(56,189,248,.7),
    0 0 18px rgba(37,99,235,.8);

    font-size:3rem;
}

/* LIGHT EFFECT */

.title-light{
    position:absolute;
    top:50%;
    left:50%;

    width:280px;
    height:280px;

    transform:translate(-50%,-50%);

    background:radial-gradient(
        circle,
        rgba(56,189,248,.35) 0%,
        rgba(37,99,235,.15) 40%,
        transparent 70%
    );

    z-index:1;

    border-radius:50%;

    animation:pulseLight 3s infinite;

    /* IMPORTANT FIX */
    pointer-events:none;
}

/* GLOW ANIMATION */

@keyframes titleGlow{

    0%{
        text-shadow:
        0 0 10px #38bdf8,
        0 0 20px #38bdf8,
        0 0 40px #2563eb;
    }

    50%{
        text-shadow:
        0 0 20px #38bdf8,
        0 0 40px #38bdf8,
        0 0 70px #2563eb;
    }

    100%{
        text-shadow:
        0 0 10px #38bdf8,
        0 0 20px #38bdf8,
        0 0 40px #2563eb;
    }
}

/* LIGHT PULSE */

@keyframes pulseLight{

    0%{
        transform:translate(-50%,-50%) scale(1);
        opacity:.8;
    }

    50%{
        transform:translate(-50%,-50%) scale(1.15);
        opacity:1;
    }

    100%{
        transform:translate(-50%,-50%) scale(1);
        opacity:.8;
    }
}

/* TABLET */

@media(max-width:991px){

    .masthead-heading{
        font-size:2.6rem;
    }

    .title-outline{
        font-size:2.3rem;
    }

}

/* MOBILE */

@media(max-width:768px){

    .hero-title-wrapper{
        padding:5px 10px;
    }

    .masthead-heading{
        font-size:1.9rem;
        letter-spacing:1px;
    }

    .title-outline{
        font-size:1.7rem;
    }

    .title-light{
        width:180px;
        height:180px;
    }

}


    </style>

</head>

<body id="page-top">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top"
         id="mainNav">

        <div class="container">

            <!-- LOGO -->
            <a class="navbar-brand"
               href="#page-top">

                <img src="{{ asset('build/assets/img/favicon.ico') }}"
                     alt="LGU Logo">

            </a>

            <!-- TOGGLE -->
           <button class="navbar-toggler custom-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarResponsive">

    <i class="fas fa-bars"></i>

</button>

            <!-- NAV -->
            <div class="collapse navbar-collapse"
                 id="navbarResponsive">

                <ul class="navbar-nav ms-auto">

                    @if (Route::has('login'))

                        @auth

                        @else

                            <!-- LOGIN -->
                            <li class="nav-item mx-lg-1">

                                <a class="nav-link py-3 px-3 rounded"
                                   href="{{ route('login') }}">

                                    Log in

                                </a>

                            </li>

                            <!-- REGISTER -->
                            @if (Route::has('register'))

                            <li class="nav-item mx-lg-1">

                                <a class="nav-link py-3 px-3 rounded"
                                   href="{{ route('register') }}">

                                    Register

                                </a>

                            </li>

                            @endif

                        @endauth

                    @endif

                </ul>

            </div>

        </div>

    </nav>

    <!-- HERO -->
    <header class="masthead text-center">

        <!-- CAROUSEL -->
        <div id="heroCarousel"
             class="carousel slide carousel-fade bg-carousel"
             data-bs-ride="carousel"
             data-bs-interval="3500">

            <div class="carousel-inner">

            <div class="carousel-item active">

                    <img src="{{ asset('build/assets/img/library.jpg') }}"
                         alt="Education">

                </div>
              
                <div class="carousel-item ">

                    <img src="{{ asset('build/assets/img/books.png') }}"
                         alt="Scholarship">

                </div>

                <!-- IMAGE 2 -->
                <div class="carousel-item">

                    <img src="{{ asset('build/assets/img/students.jpg') }}"
                         alt="Students">

                </div>

                <!-- IMAGE 3 -->
                <div class="carousel-item">

                    <img src="{{ asset('build/assets/img/images.jpg') }}"
                         alt="Students">

                </div>
                <div class="carousel-item">

                    <img src="{{ asset('build/assets/img/images1.jpg') }}"
                         alt="Students">

                </div>
                <div class="carousel-item">

                    <img src="{{ asset('build/assets/img/images2.jpg') }}"
                         alt="Students">

                </div>

            </div>

        </div>

        <!-- OVERLAY -->
        <div class="masthead-overlay"></div>

        <!-- CONTENT -->
        <div class="container hero-content d-flex align-items-center flex-column">

            <!-- LOGO -->
            <div class="logo-wrapper">

                <img class="masthead-avatar"
                     src="{{ asset('build/assets/img/favicon.ico') }}"
                     alt="LGU Aparri Logo">

            </div>

            <!-- TITLE -->
<div class="hero-title-wrapper">

    <h1 class="masthead-heading text-uppercase mb-0">

        <span class="title-glow">
            LGU Aparri Scholar
        </span>

        <br>

        <span class="title-outline">
            Application Portal
        </span>

    </h1>

    <div class="title-light"></div>

</div>

            <!-- DIVIDER -->
            <div class="mt-4">

    <a href="{{ route('register') }}"
       class="btn btn-light hero-btn glow-btn">

        APPLY NOW!

    </a>

</div>

            <!-- SUBTITLE -->
            <p class="masthead-subheading ">

                Empowering students through accessible scholarship opportunities
                and educational support for a brighter future.

            </p>

           

        </div>

    </header>

    <!-- FOOTER -->
    <footer class="footer text-center py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-4">

                    <h4 class="text-uppercase mb-4 text-white">
                        Social
                    </h4>

                    <a class="btn btn-outline-light btn-social mx-1"
                        href="https://www.facebook.com/share/1CoVaQHiPg/"
                        target="_blank"
                        rel="noopener noreferrer">

                            <i class="fab fa-facebook-f"></i>

                        </a>


                </div>

            </div>

        </div>

    </footer>

    <!-- COPYRIGHT -->
    <div class="copyright py-4 text-center text-white">

        <div class="container">

            <small>
                Copyright &copy; LGU Aparri Scholar Portal 2026
            </small>

        </div>

    </div>

    <!-- SCRIPT -->
    <script src="{{ asset('build/assets/new/js/scripts.js')}}"></script>

</body>

</html>