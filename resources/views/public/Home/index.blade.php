    @include('public.Home.header')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        @include('public.Home.navbar')
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/img_3167.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>OFFICE OF ALUMNI RELATIONS</h5>
                    <p>We are the major arm of the Saint Paul University Philippines in forging and sustaining ties with its alumni—unifying and strengthening generations of competent and compassionate SPUPs committed to the service of the Church, the nation and the global community.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/grad-1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/grad-1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    @include('public.Home.main')

    @include('public.Home.contact')
    @include('public.Home.footer')

