
@extends('front.app')

@section('title', 'Graffiti')

@section('content')


<!-- HERO -->
<section id="hero" class="module-hero module-video module-full-height bg-light-30" data-background="assets/images/section-11.jpg">

  <!-- HERO TEXT -->
  <div class="hero-caption">
    <div class="hero-text">

      <h1 class="mh-line-size-3 font-alt m-b-20">Youtube video background</h1>
      <h5 class="mh-line-size-6">You can use youtube video background for presenting yourself</h5>

    </div>
  </div>
  <!-- /HERO TEXT -->

  <!-- YOUTUBE VIDEO-->
  <div class="video-player" data-property="{videoURL:'https://www.youtube.com/watch?v=I87iJpf4CU8', containment:'.module-video', quality:'large', startAt:0, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:0, mute:true}"></div>
  <!-- /YOUTUBE VIDEO-->

</section>
<!-- /HERO -->

<!-- SINGLE PORTFOLIO -->
<section class="module">

  <div class="container">

    <!-- PROJECT DETAILS -->
    <div class="row m-b-70">

      <div class="col-md-4">

        <ul class="project-details m-b-sm-30">
          <li class="font-alt">Categories: <a href="#">Photography</a>,<a href="#">Design</a></li>
          <li class="font-alt">Released: 23 November 2015</li>
          <li class="font-alt">Online: <a href="#">www.site.com</a></li>
          <li class="font-alt">Client: <a href="#">Mark Stone</a></li>
        </ul>

      </div>

      <div class="col-md-8">

        <h5 class="font-alt m-t-0">Insight</h5>
        <blockquote class="serif-quote font-serif">
          <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.</p>
        </blockquote>

      </div>

    </div>
    <!-- /PROJECT DETAILS -->

    <!-- PORTFOLIO CONTENT -->
    <div class="row">

      <div class="col-sm-12">

        <p><img src="assets/images/portfolio-single/portfolio-single-wide-2.jpg" alt=""></p>
        <p><img src="assets/images/portfolio-single/portfolio-single-wide-1.jpg" alt=""></p>

      </div>

    </div>
    <!-- /PORTFOLIO CONTENT -->

  </div>

</section>
<!-- /SINGLE PORTFOLIO -->

<hr class="divider"><!-- DIVIDER -->

<!-- RELATED PROJECT -->
<section class="module">

  <div class="container">

    <!-- MODULE TITLE -->
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h2 class="module-title font-alt">Related Project</h2>
      </div>
    </div>
    <!-- /MODULE TITLE -->

    <!-- WORKS GRID -->
    <div class="row">

      <div id="works-grid" class="works-grid works-hover-w">

        <!-- DO NOT DELETE THIS DIV -->
        <div class="grid-sizer"></div>

        <!-- PORTFOLIO ITEM -->
        <div class="work-item design">
          <a href="portfolio-single-1.html">
            <img src="assets/images/portfolio/img-2.jpg" alt="">
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
            <img src="assets/images/portfolio/img-3.jpg" alt="">
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
            <img src="assets/images/portfolio/img-4.jpg" alt="">
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
            <img src="assets/images/portfolio/img-5.jpg" alt="">
            <div class="work-caption font-alt">
              <h3 class="work-title">Cambridge friend</h3>
              <div class="work-descr">
                Design
              </div>
            </div>
          </a>
        </div>
        <!-- /PORTFOLIO ITEM -->

      </div>

    </div>
    <!-- /WORKS GRID -->

  </div>

</section>
<!-- /RELATED PROJECT -->
