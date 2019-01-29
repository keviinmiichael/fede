@extends('front.app')

@section('content')

  <!-- HERO -->
  <section id="hero" class="module-hero module-full-height">

    <div id="slides">

      <ul class="slides-container">

        <li class="bg-light bg-film">
          <img src="/img/front/section-6.jpg" alt="">

          <!-- HERO TEXT -->
          <div class="hero-caption">
            <div class="hero-text">
              <h1 class="mh-line-size-1 font-alt m-b-50 wow fadeInDown">Superslides</h1>
              <h5 class="mh-line-size-5 font-alt wow fadeInDown" data-wow-delay="0.7s">Create your own animation of text </h5>
            </div>
          </div>
          <!-- /HERO TEXT -->
        </li>

        <li class="bg-light-30">
          <img src="/img/front/section-3.jpg" alt="">

          <!-- HERO TEXT -->
          <div class="hero-caption">
            <div class="hero-text">
              <h1 class="mh-line-size-2 font-alt m-b-50 wow bounceInDown">Superslides support</h1>
              <h5 class="mh-line-size-5 font-alt wow bounceInLeft" data-wow-delay="0.7s">More than 50 css animations</h5>
            </div>
          </div>
          <!-- /HERO TEXT -->
        </li>

        <li class="bg-dark bg-dark-30">
          <img src="/img/front/section-14.jpg" alt="">

          <!-- HERO TEXT -->
          <div class="hero-caption">
            <div class="hero-text">
              <h5 class="mh-line-size-5 font-alt m-b-50 wow rotateIn">Present yourself</h5>
              <h1 class="mh-line-size-3 font-alt wow rotateInUpRight" data-wow-delay="0.7s">Build your own style</h1>
            </div>
          </div>
          <!-- /HERO TEXT -->
        </li>

      </ul>

      <nav class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
      </nav>

    </div>

  </section>
  <!-- /HERO -->

  <!-- PORTFOLIO -->
  <section id="portfolio" class="module">

    <div class="container">

      <!-- FILTER -->
      <div class="row">

        <div class="col-sm-12">
          <ul id="filters" class="filters font-alt">
            <li><a href="#" data-filter="*" class="current">All <sup><small>.355</small></sup></a></li>
            <li><a href="#" data-filter=".branding">Branding <sup><small>.78</small></sup></a></li>
            <li><a href="#" data-filter=".design">Design <sup><small>.123</small></sup></a></li>
            <li><a href="#" data-filter=".photo">Photo <sup><small>.144</small></sup></a></li>
            <li><a href="#" data-filter=".web">Web <sup><small>.140</small></sup></a></li>
          </ul>
        </div>

      </div>
      <!-- /FILTER -->

      <!-- WORKS GRID -->
      <div class="row">

        <div id="works-grid" class="works-grid works-hover-w">

          <!-- DO NOT DELETE THIS DIV -->
          <div class="grid-sizer"></div>

          <!-- PORTFOLIO ITEM -->
          <div class="work-item tall branding">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-1.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">The GreenHouse Studio</h3>
                <div class="work-descr">
                  Branding
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

          <!-- PORTFOLIO ITEM -->
          <div class="work-item design">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-2.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">The languages only</h3>
                <div class="work-descr">
                  Design
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

          <!-- PORTFOLIO ITEM -->
          <div class="work-item design">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-3.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">Everyone realizes</h3>
                <div class="work-descr">
                  Design
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

          <!-- PORTFOLIO ITEM -->
          <div class="work-item design">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-4.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">Corporate Identity</h3>
                <div class="work-descr">
                  Design
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

          <!-- PORTFOLIO ITEM -->
          <div class="work-item design">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-5.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">Cambridge friend</h3>
                <div class="work-descr">
                  Design
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

          <!-- PORTFOLIO ITEM -->
          <div class="work-item wide-tall branding photo web">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-6.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">The grammar of the resulting language</h3>
                <div class="work-descr">
                  Branding / Photo / Web
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

          <!-- PORTFOLIO ITEM -->
          <div class="work-item wide design photo web">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-7.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">A collection of textile samples</h3>
                <div class="work-descr">
                  Design / Photo / Web
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

          <!-- PORTFOLIO ITEM -->
          <div class="work-item branding photo">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-8.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">Gregor then turned</h3>
                <div class="work-descr">
                  Branding / Photo
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

          <!-- PORTFOLIO ITEM -->
          <div class="work-item branding photo">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-9.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">He must have tried it</h3>
                <div class="work-descr">
                  Branding / Photo
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

          <!-- PORTFOLIO ITEM -->
          <div class="work-item wide design web">
            <a href="portfolio-single-1.html">
              <img src="/img/front/portfolio/img-10.jpg" alt="">
              <div class="work-caption font-alt">
                <h3 class="work-title">However hard he threw himself</h3>
                <div class="work-descr">
                  Design / Web
                </div>
              </div>
            </a>
          </div>
          <!-- /PORTFOLIO ITEM -->

        </div>

      </div>
      <!-- /WORKS GRID -->

      <!-- SHOW MORE -->
      <div class="row m-t-70 text-center wow fadeInUp">
        <div class="col-sm-12">

          <button id="show-more" class="btn btn-block btn-lg btn-g show-more">More works</button>

        </div>
      </div>
      <!-- /SHOW MORE -->

    </div>

  </section>
  <!-- /PORTFOLIO -->

@endsection
