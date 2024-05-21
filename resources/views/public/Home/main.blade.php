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
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check"></i> Iure at voluptas aspernatur dignissimos doloribus repudiandae.
                        </li>
                        <li><i class="bi bi-check"></i> Est ipsa assumenda id facilis nesciunt placeat sed doloribus
                            praesentium.</li>
                    </ul>
                    <p>
                        Voluptas nisi in quia excepturi nihil voluptas nam et ut. Expedita omnis eum consequatur non.
                        Sed in asperiores aut repellendus. Error quisquam ab maiores. Quibusdam sit in officia
                    </p>
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
                                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip
                                </p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-cube-alt"></i>
                                <h4>PACKAGES</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                </p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-receipt"></i>
                                <h4>RESUME</h4>
                                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-shield"></i>
                                <h4>Events & Homecomings</h4>
                                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-globe"></i>
                                <h4>Our Global Network</h4>
                                <p>Et fuga et deserunt et enim. Dolorem architecto ratione tensa raptor marte</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                                <i class="bx bx-id-card"></i>
                                <h4>Alumni Card Partners</h4>
                                <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>
                            </div>
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
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos qui modi asperiores sint accusamus
                    voluptatem quae animi ducimus deleniti velit optio a iusto accusantium quisquam, labore ad aliquid
                    atque. Tempore.</p>
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
