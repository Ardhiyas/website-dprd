@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
                <img src="{{ asset('dist') }}/assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
                <div class="container">
                    <h2>Welcome to Medicio</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#about" class="btn-get-started">Read More</a>
                </div>
            </div><!-- End Carousel Item -->
            <div class="carousel-item">
                <img src="{{ asset('dist') }}/assets/img/hero-carousel/hero-carousel-2.jpg" alt="">
                <div class="container">
                    <h2>At vero eos et accusamus</h2>
                    <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id
                        quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                        Temporibus autem quibusdam et aut officiis debitis aut.</p>
                    <a href="#about" class="btn-get-started">Read More</a>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="{{ asset('dist') }}/assets/img/hero-carousel/hero-carousel-3.jpg" alt="">
                <div class="container">
                    <h2>Temporibus autem quibusdam</h2>
                    <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur
                        aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
                        nesciunt omnis iste natus error sit voluptatem accusantium.</p>
                    <a href="#about" class="btn-get-started">Read More</a>
                </div>
            </div><!-- End Carousel Item -->
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
            <ol class="carousel-indicators"></ol>
        </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About Us<br></h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('dist') }}/assets/img/about.jpg" class="img-fluid" alt="">
                    <a href="https://youtu.be/yKbUQkkA-ks?si=2jk7nqbbuc89bJrk" class="glightbox pulsating-play-btn"></a>
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in
                                voluptate velit.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident
                    </p>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- Contact Section -->
        <section id="contact" class="contact section">

          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
          </div><!-- End Section Title -->

          <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            <iframe style="border:0; width: 100%; height: 370px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.218888625371!2d111.4607947!3d-7.8713702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e799f8534ac9527%3A0x133720168b40cb33!2sDPRD%20Kabupaten%20Ponorogo!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div><!-- End Google Maps -->

          <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
              <div class="col-lg-6 ">
                <div class="row gy-4">

                  <div class="col-lg-12">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                      <i class="bi bi-geo-alt"></i>
                      <h3>Address</h3>
                      <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                  </div><!-- End Info Item -->

                  <div class="col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                      <i class="bi bi-telephone"></i>
                      <h3>Call Us</h3>
                      <p>+1 5589 55488 55</p>
                    </div>
                  </div><!-- End Info Item -->

                  <div class="col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                      <i class="bi bi-envelope"></i>
                      <h3>Email Us</h3>
                      <p>info@example.com</p>
                    </div>
                  </div><!-- End Info Item -->

                </div>
              </div>

              <div class="col-lg-6">
                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
                  <div class="row gy-4">

                    <div class="col-md-6">
                      <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                    </div>

                    <div class="col-md-6 ">
                      <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                    </div>

                    <div class="col-md-12">
                      <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                    </div>

                    <div class="col-md-12">
                      <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>

                      <button type="submit">Send Message</button>
                    </div>

                  </div>
                </form>
              </div><!-- End Contact Form -->

            </div>

          </div>

        </section><!-- /Contact Section -->
@endsection
