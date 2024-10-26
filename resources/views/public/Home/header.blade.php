<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPUP Alumni System</title>
    <link rel="shortcut icon" href="{{ asset('images/qsu-logo.jpg') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}"> --}}
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        .logo-container {
            display: flex;
            align-items: center;
        }
        .logo-container img {
            margin-right: 8px; /* Adjust spacing between logos */
        }
        .subtitle {
            font-size: 0.8rem;
            line-height: 1rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-yellow border-nav">
        <div class="container-fluid mobile-nav">
            <a class="navbar-brand" href="{{ route('home') }}">
                <div class="logo-container">
                    <img src="{{ asset('images/qsu-logo.jpg') }}" alt="...">
                    <img src="{{ asset('images/SPUPAA LOGO.png') }}" alt="...">
                </div>
                <div>
                    <span class="logo-text mx-3" style="font-size: 1.1rem">ST. PAUL UNIVERSITY PHILIPPINES</span>
                    <div class="subtitle mx-3">Office of Alumni and External Relations</div>
                </div>
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (auth()->user() == null)
                        <li class="nav-item mx-3">
                            <a class="btn btn-danger px-3" aria-current="page" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary px-3" href="{{ route('login') }}">Admin</a>
                        </li>
                    @else
                        <li>
                            <a href="#" class="btn btn-danger px-3" onclick="document.getElementById('logoutForm').submit()">Sign out</a>
                            <form method="post" id="logoutForm" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
