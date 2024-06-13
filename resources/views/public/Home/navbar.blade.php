<header id="header" class="position-absolute container-fluid header-transparent border-bottom">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5">
            {{-- <a class="navbar-brand" href="#"><img src="{{asset('images/qsu-logo.jpg')}}" alt="..."> <span>University of Philippines</span></a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="color: white">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#announcements">Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#news">News & Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#gallery">Gallery</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Events
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Upcoming Events</a></li>
                            <li><a class="dropdown-item" href="{{route('book-event')}}">Book an event</a></li>
                            {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>
