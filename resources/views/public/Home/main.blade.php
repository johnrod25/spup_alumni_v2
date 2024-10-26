<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="details">
        <div class="container">

            <div class="section-title">
                <h2>About Us</h2>
            </div>

            <div class="row content">
                <div class="col-md-4" data-aos="fade-right">
                    <img src="{{ asset('img/details-1.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-8 pt-4" data-aos="fade-up">
                    <h3 class="mb-3">Welcome to the St. Paul University Philippines Alumni Association!</h3>
                    {{-- <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p> --}}
                    {{-- <ul>
                        <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check"></i> Iure at voluptas aspernatur dignissimos doloribus repudiandae.
                        </li>
                        <li><i class="bi bi-check"></i> Est ipsa assumenda id facilis nesciunt placeat sed doloribus
                            praesentium.</li>
                    </ul> --}}
                    <h5>
                        The St. Paul University Philippines Alumni Association (SPUPAA) is a vibrant and dynamic community of graduates who share a common bond through their education at St. Paul University Philippines (SPUP). Established to foster a lifelong connection between the university and its alumni, the SPUPAA serves as a cornerstone for networking, professional development, and social engagement among Paulinians worldwide.
                    </h5>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Announcement Section ======= -->
    <section id="announcements" class="details bg-yellow">
        <div class="container">

            <div class="section-title">
                <h2 class="text-white">Announcements</h2>
                <p>Never miss the latest news! Be up to date with all the happenings. Check out our news and
                    announcements.</p>
            </div>

            <div class="row gap-4 content d-flex justify-content-center">
                @foreach ($announcements as $announcement)
                    <div class="card col-md-4 p-3" data-aos="fade-right">
                        <img src="{{ asset('images/announcements/' . $announcement->image_path) }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <p class="card-text text-wrap">{{ $announcement->content }}</p>
                            <p class="mt-2"> {{ date('M d, Y', strtotime($announcement->created_at)) }}</p>
                            <a href="{{ route('show-announcement', $announcement->id) }}"
                                class="btn btn-outline-success">Continue Reading</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container d-flex justify-content-center align-items-center mt-5">
                <a href="{{ route('all-announcements') }}" class="btn btn-success px-5">View All</a>
            </div>
        </div>
    </section><!-- End Announcement Section -->

    <!-- ======= App Servicees Section ======= -->
    <section id="services" class="features">
        <div class="container">

            <div class="section-title">
                <h2>Alumni Services</h2>
                <p>The following are the services available to the SPUP Alumni.</p>
            </div>

            <div class="row no-gutters">
                <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
                    <div class="content d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-md-6 icon-box" data-aos="fade-up">
                                <i class="bx bx-images"></i>
                                <h4>YEARBOOK</h4>
                                <p>Capture and cherish your memories with our beautifully crafted yearbooks
                                </p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-cube-alt"></i>
                                <h4>PACKAGES</h4>
                                <p>Explore our packages tailord to meet your specific needs
                                </p>
                            </div>
                            {{-- <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-receipt"></i>
                                <h4>RESUME</h4>
                                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                            </div> --}}
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-shield"></i>
                                <h4>Events Booking</h4>
                                <p>Join us for memorable events</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-globe"></i>
                                <h4>Our Global Network</h4>
                                <p>Connect with our extensive global network of alumni</p>
                            </div>
                            {{-- <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                                <i class="bx bx-id-card"></i>
                                <h4>Alumni Card Partners</h4>
                                <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2"
                    data-aos="fade-left" data-aos-delay="100">
                    <img src="{{ asset('img/features.svg') }}" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </section><!-- End App Features Section -->

    <!-- ======= Announcement Section ======= -->
    <section id="news" class="details bg-yellow">
        <div class="container-fluid px-5">
            <div class="section-title">
                <h2 class="text-white">News And Articles</h2>
                <p>Never miss the latest news! Be up to date with all the happenings - check out below our news and
                    announcements about our university's events and our exemplary SPUP Alumni.</p>
            </div>
            <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3" style="color: black" data-aos="fade-up">
                <a class="navbar-brand" href="#">Recent News And Articles</a>
                <ul class="nav nav-pills" data-aos="fade-down">
                    <?php $i = 1; ?>
                    @foreach ($news as $new)
                        @if ($i < 3)
                            <li class="nav-item">
                                <a class="nav-link px-3"
                                    href="#scrollspyHeading{{ $new->id }}">{{ $new->title }}</a>
                            </li>
                        @elseif ($i == 3)
                            <li class="nav-item dropdown">
                                <a class="nav-link px-3 dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false">More</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="#scrollspyHeading{{ $new->id }}">{{ $new->title }}</a></li>
                                @else
                                    <li><a class="dropdown-item"
                                            href="#scrollspyHeading{{ $new->id }}">{{ $new->title }}</a></li>
                        @endif
                        <?php $i++; ?>
                    @endforeach
                </ul>
                </li>
                </ul>
            </nav>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
                @foreach ($news as $new)
                    <a href="{{ route('show-news', $new->id) }}" class="text-black"
                        title="Click to read more about this news/articles">
                        <div id="scrollspyHeading{{ $new->id }}"
                            class="container-fluid d-flex align-items-center my-3">
                            <img src="{{ asset('images/news/' . $new->image_path) }}" alt=""
                                class="mx-3 news-image">
                            <div class="content">
                                <h5 class="title">{{ $new->title }}</h5>
                                <p class="info">{{ $new->content }}</p>
                                <p class="mt-2"> {{ date('M d, Y', strtotime($new->created_at)) }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
                <div class="container d-flex justify-content-center align-items-center mt-5">
                    <a href="{{ route('all-news') }}" class="btn btn-success px-5">View All</a>
                </div>

            </div>
        </div>
    </section><!-- End Announcement Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Gallery</h2>
                <p>Our gallery showcases the vibrant and diverse experiences of SPUP alumni. Whether it's capturing the joy of reunions, the inspiration of professional milestones, or the camaraderie at networking events, these images reflect the heart of our alumni community. Take a journey through the memories and milestones that define us.</p>
            </div>
        </div>
        <div class="container-fluid" data-aos="fade-up">
            <div class="gallery-slider swiper">
                <div class="swiper-wrapper">
                    @foreach ($galleries as $gallery)
                        <div class="swiper-slide">
                            <a href="{{ asset('images/galleries/' . $gallery->image_path) }}"
                                class="gallery-lightbox" data-gall="gallery-carousel">
                                <img src="{{ asset('images/galleries/' . $gallery->image_path) }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Gallery Section -->

</main><!-- End #main -->
