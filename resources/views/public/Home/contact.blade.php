<!-- ======= Contact Section ======= -->
<section id="contact" class="contact bg-yellow">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2 class="text-white">Contact Us</h2>
            <p>We are here to address any questions you may have about the Office of Alumni Relations. Please
                contact us and we will get back to you as soon as possible.</p>
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 info">
                        <i class="bx bx-map"></i>
                        <h4>Address</h4>
                        <p>Mabini Street, Tuguegarao City<br>Cagayan, Philippines,3500</p>
                    </div>
                    <div class="col-lg-6 info">
                        <i class="bx bx-phone"></i>
                        <h4>Call Us</h4>
                        <p>396-1987<br>1997</p>
                    </div>
                    <div class="col-lg-6 info">
                        <i class="bx bx-envelope"></i>
                        <h4>Email Us</h4>
                        <p>spupadmin@spup.edu.ph</p>
                    </div>
                    <div class="col-lg-6 info">
                        <i class="bx bx-time-five"></i>
                        <h4>Working Hours</h4>
                        <p>Mon - Fri: 9AM to 5PM</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <form action="{{ route('send-mail') }}" method="post" class="mt-3"
                    data-aos="fade-up">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <input placeholder="Your Name" type="text" name="name" class="form-control" id="name"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <input placeholder="Your Email" type="email" class="form-control" name="email"
                            id="email" required>
                    </div>
                    <div class="form-group mt-3">
                        <input placeholder="Subject" type="text" class="form-control" name="subject" id="subject"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea placeholder="Message" class="form-control" name="message" rows="5" required></textarea>
                    </div>
                    {{-- <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div> --}}
                    <div class="text-center"><button type="submit" class="btn btn-success mt-3">Send Message</button></div>
                </form>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
