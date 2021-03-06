@extends('front.app')

@section('title', 'Nosotros')

@section('content')
  <!-- HERO -->
  <section class="module module-parallax bg-light-30" data-background="/img/front/section-7.jpg">

    <!-- HERO TEXT -->
    <div class="container">

      <div class="row">
        <div class="col-sm-12 text-center">
          <h1 class="mh-line-size-3 font-alt m-b-20">About us</h1>
          <h5 class="mh-line-size-4 font-alt">We don’t have a style — we have standards.</h5>
        </div>
      </div>

    </div>
    <!-- /HERO TEXT -->

  </section>
  <!-- /HERO -->

  <!-- ABOUT -->
  <section class="module">

    <div class="container">

      <div class="row">

        <!-- ABOUT STUDIO  -->
        <div class="col-sm-4">

          <h4 class="font-alt m-t-0 m-b-20">About Studio</h4>
          <p>The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p>

          <p><a href="#team" class="section-scroll">Who We Are →</a></p>

        </div>
        <!-- /ABOUT STUDIO  -->

        <!-- WHAT WE DO -->
        <div class="col-sm-4">

          <h4 class="font-alt m-t-0 m-b-20">What We Do</h4>
          <p>To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family.</p>

          <p><a href="#services" class="section-scroll">Our Services →</a></p>

        </div>
        <!-- /WHAT WE DO -->

        <!-- SKILLS -->
        <div class="col-sm-4">

          <h6 class="progress-title font-alt">Development</h6>
          <div class="progress">
            <div class="progress-bar pb-dark" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100">
              <span class="font-alt"></span>
            </div>
          </div>

          <h6 class="progress-title font-alt">Branding</h6>
          <div class="progress">
            <div class="progress-bar pb-dark" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100">
              <span class="font-alt"></span>
            </div>
          </div>

          <h6 class="progress-title font-alt">Marketing</h6>
          <div class="progress">
            <div class="progress-bar pb-dark" aria-valuenow="50" role="progressbar" aria-valuemin="0" aria-valuemax="100">
              <span class="font-alt"></span>
            </div>
          </div>

          <h6 class="progress-title font-alt">Photography</h6>
          <div class="progress">
            <div class="progress-bar pb-dark" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100">
              <span class="font-alt"></span>
            </div>
          </div>

        </div>
        <!-- /SKILLS -->

      </div>

    </div>

  </section >
  <!-- /ABOUT -->

  <!-- COUNTERS -->
  <section class="module module-video bg-dark" data-background="/img/front/section-10.jpg">

    <div class="container">

      <div class="row">

        <!-- COUNTER -->
        <div class="col-sm-3 m-b-md-20">
          <div class="counter-item">
            <div class="counter-title font-alt">
              <h5 class="font-alt counter-number" data-number="680"><span></span></h5>
              Cups of coffee
            </div>
          </div>
        </div>
        <!-- /COUNTER -->

        <!-- COUNTER -->
        <div class="col-sm-3 m-b-md-20">
          <div class="counter-item">
            <div class="counter-title font-alt">
              <h5 class="font-alt counter-number" data-number="1234"><span></span></h5>
              Total clients
            </div>
          </div>
        </div>
        <!-- /COUNTER -->

        <!-- COUNTER -->
        <div class="col-sm-3 m-b-md-20">
          <div class="counter-item">
            <div class="counter-title font-alt">
              <h5 class="font-alt counter-number" data-number="68"><span></span>k</h5>
              Photos made
            </div>
          </div>
        </div>
        <!-- /COUNTER -->

        <!-- COUNTER -->
        <div class="col-sm-3 m-b-md-20">
          <div class="counter-item">
            <div class="counter-title font-alt">
              <h5 class="counter-number" data-number="98"><span></span>%</h5>
              Happy clients
            </div>
          </div>
        </div>
        <!-- /COUNTER -->

      </div>

    </div>

    <!-- YOUTUBE VIDEO-->
    <div class="video-player" data-property="{videoURL:'https://www.youtube.com/watch?v=0pXYp72dwl0', containment:'.module-video', quality:'large', startAt:0, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:0, mute:true}"></div>
    <!-- /YOUTUBE VIDEO-->

  </section>
  <!-- /COUNTERS -->

  <!-- SERVICES -->
  <section id="services" class="module">

    <div class="container">

      <!-- MODULE TITLE -->
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Services</h2>
        </div>
      </div>
      <!-- /MODULE TITLE -->

      <div class="row multi-columns-row">

        <!-- CONTENT BOX -->
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="content-box">
            <div class="content-box-icon">
              <i class="icon icon-basic-pencil-ruler"></i>
            </div>
            <h5 class="content-box-title font-alt">Designs & interfaces</h5>
            <div class="content-box-text">
              The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
            </div>
          </div>
        </div>
        <!-- /CONTENT BOX -->

        <!-- CONTENT BOX -->
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="content-box">
            <div class="content-box-icon">
              <i class="icon icon-basic-gear"></i>
            </div>
            <h5 class="content-box-title font-alt">Highly customizable</h5>
            <div class="content-box-text">
              The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
            </div>
          </div>
        </div>
        <!-- /CONTENT BOX -->

        <!-- CONTENT BOX -->
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="content-box">
            <div class="content-box-icon">
              <i class="icon icon-basic-laptop"></i>
            </div>
            <h5 class="content-box-title font-alt">Responsive design</h5>
            <div class="content-box-text">
              The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
            </div>
          </div>
        </div>
        <!-- /CONTENT BOX -->

        <!-- CONTENT BOX -->
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="content-box">
            <div class="content-box-icon">
              <i class="icon icon-basic-bolt"></i>
            </div>
            <h5 class="content-box-title font-alt">Features & plugins</h5>
            <div class="content-box-text">
              The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
            </div>
          </div>
        </div>
        <!-- /CONTENT BOX -->

        <!-- CONTENT BOX -->
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="content-box">
            <div class="content-box-icon">
              <i class="icon icon-basic-chronometer"></i>
            </div>
            <h5 class="content-box-title font-alt">Optimised for speed</h5>
            <div class="content-box-text">
              The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
            </div>
          </div>
        </div>
        <!-- /CONTENT BOX -->

        <!-- CONTENT BOX -->
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="content-box">
            <div class="content-box-icon">
              <i class="icon icon-basic-life-buoy"></i>
            </div>
            <h5 class="content-box-title font-alt">Dedicated support</h5>
            <div class="content-box-text">
              The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
            </div>
          </div>
        </div>
        <!-- /CONTENT BOX -->

      </div>

    </div>

  </section>
  <!-- /SERVICES -->

  <!-- TESTIMONIALS -->
  <section class="module module-parallax bg-light-30" data-background="/img/front/section-3.jpg">

    <div class="container">

      <div class="row">

        <div class="col-sm-6 col-sm-offset-3">

          <!-- TESTIMONIALS CAROUSEL -->
          <div class="owl-carousel slider-testimonials text-center">

            <!-- SLIDE 1 -->
            <div class="item">
              <h5 class="module-icon m-b-20">
                <i class="ion-ios-chatboxes-outline"></i>
              </h5>
              <div class="font-serif m-b-20">
                The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
              </div>
              <div class="quote-author font-alt">Jack Woods / Somecompany inc.</div>
            </div>
            <!-- /SLIDE 1 -->

            <!-- SLIDE 2 -->
            <div class="item">
              <h5 class="module-icon m-b-20">
                <i class="ion-ios-chatboxes-outline"></i>
              </h5>
              <div class="font-serif m-b-20">
                The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
              </div>
              <div class="quote-author font-alt">Jack Woods, Somecompany inc.</div>
            </div>
            <!-- /SLIDE 2 -->

            <!-- SLIDE 3 -->
            <div class="item">
              <h5 class="module-icon m-b-20">
                <i class="ion-ios-chatboxes-outline"></i>
              </h5>
              <div class="font-serif m-b-20">
                The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
              </div>
              <div class="quote-author font-alt">Jack Woods, Somecompany inc.</div>
            </div>
            <!-- /SLIDE 3 -->

          </div>
          <!-- /TESTIMONIALS CAROUSEL -->

        </div>

      </div>

    </div>

  </section>
  <!-- /TESTIMONIALS -->

  <!-- TEAM -->
  <section id="team" class="module">

    <div class="container">

      <!-- MODULE TITLE -->
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Our Team</h2>
        </div>
      </div>
      <!-- /MODULE TITLE -->

      <div class="row">

        <!-- TEAM MEMBER -->
        <div class="col-sm-6 col-md-3 m-b-md-20">
          <div class="team-item">
            <div class="team-image">
              <img src="/img/front/team/team-1.jpg" alt="">
              <div class="team-detail text-center">
                <ul class="social-icon-links socicon-circle">
                  <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                  <li><a href="#"><i class="ion-social-dribbble"></i></a></li>
                  <li><a href="#"><i class="ion-social-octocat"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="team-descr">
              <h5 class="team-name font-alt">Martin Friman</h5>
              <div class="team-role font-serif">Programmer</div>
            </div>
          </div>
        </div>
        <!-- /TEAM MEMBER -->

        <!-- TEAM MEMBER -->
        <div class="col-sm-6 col-md-3 m-b-md-20">
          <div class="team-item">
            <div class="team-image">
              <img src="/img/front/team/team-2.jpg" alt="">
              <div class="team-detail text-center">
                <ul class="social-icon-links socicon-circle">
                  <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                  <li><a href="#"><i class="ion-social-dribbble"></i></a></li>
                  <li><a href="#"><i class="ion-social-octocat"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="team-descr">
              <h5 class="team-name font-alt">Andy River</h5>
              <div class="team-role font-serif">Designer</div>
            </div>
          </div>
        </div>
        <!-- /TEAM MEMBER -->

        <!-- TEAM MEMBER -->
        <div class="col-sm-6 col-md-3 m-b-md-20">
          <div class="team-item">
            <div class="team-image">
              <img src="/img/front/team/team-3.jpg" alt="">
              <div class="team-detail text-center">
                <ul class="social-icon-links socicon-circle">
                  <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                  <li><a href="#"><i class="ion-social-dribbble"></i></a></li>
                  <li><a href="#"><i class="ion-social-octocat"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="team-descr">
              <h5 class="team-name font-alt">John Smith</h5>
              <div class="team-role font-serif">Art Director</div>
            </div>
          </div>
        </div>
        <!-- /TEAM MEMBER -->

        <!-- TEAM MEMBER -->
        <div class="col-sm-6 col-md-3 m-b-md-20">
          <div class="team-item">
            <div class="team-image">
              <img src="/img/front/team/team-4.jpg" alt="">
              <div class="team-detail text-center">
                <ul class="social-icon-links socicon-circle">
                  <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                  <li><a href="#"><i class="ion-social-dribbble"></i></a></li>
                  <li><a href="#"><i class="ion-social-octocat"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="team-descr">
              <h5 class="team-name font-alt">Adele Snow</h5>
              <div class="team-role font-serif">Account manager</div>
            </div>
          </div>
        </div>
        <!-- /TEAM MEMBER -->

      </div>

    </div>

  </section>
  <!-- /TEAM -->

  <hr class="divider"><!-- DIVIDER -->

  <!-- CLIENTS -->
  <section class="module">

    <div class="container">

      <!-- MODULE TITLE -->
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Recent Clients</h2>
        </div>
      </div>
      <!-- /MODULE TITLE -->

      <div class="row">

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-1.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-2.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-3.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-4.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-5.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-6.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-7.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-8.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-9.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-10.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-11.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

        <!-- CLIENT LOGO -->
        <div class="col-sm-2 col-xs-6 client-item">
          <a href="#">
            <img src="/img/front/logos/logo-12.png" alt="">
          </a>
        </div>
        <!-- /CLIENT LOGO -->

      </div>

    </div>

  </section>
  <!-- /CLIENTS -->
@endsection
