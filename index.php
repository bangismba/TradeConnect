<?php

include "includes/header-2.php";

?>
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2 data-aos="fade-up" >Welcome to TradeConnect<br>your ultimate platform for finding and connecting with skilled tradesmen in your area. </h2>
            <p data-aos="fade-up" class="welcome" data-aos-delay="90">Whether you need a plumber, electrician, carpenter, or any other tradesman, TradeConnect makes it easy to find the right professional for the job.</p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="register.php" class="btn-get-started">Get started</a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/workers.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section py-5">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h1>What we stand for</h1>
        <p>Why Choose TradeConnect?</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <h4>User-Friendly Interface</h4>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Our app is designed with simplicity and usability in mind, ensuring a smooth experience for both clients and tradesmen.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <h4>Verified Tradesmen</h4>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>We verify all tradesmen profiles to ensure you connect with qualified and reliable professionals.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <h4>Secure Platform</h4>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Your data and communications are protected with industry-standard security measures.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <h4>Community-Driven</h4>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Join a community of tradesmen and clients who value quality work and professional connections.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

  </main>

  <?php

include "includes/footer.php";
include "includes/script.php";

?>
</body>

</html>