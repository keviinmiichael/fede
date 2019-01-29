@extends('front.app')

@section('title', 'Tattoo')

@section('content')

<!-- SINGLE PORTFOLIO -->
<section class="module">

  <div class="container">

    <!-- PORTFOLIO CONTENT -->
    <div class="row multi-columns-row">


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

      <!-- GALLERY ITEM -->
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="gallery-box">
          <h5 class="gallery-box-title font-alt">Tattos del pibe</h5>
          <div class="gallery-box-text font-serif">
            Branding
          </div>
          <a href="/img/front/tattoo/tattoo1.jpg" class="gallery" title="Title 1">
            <img src="/img/front/tattoo/tattoo1.jpg" alt="">
          </a>
        </div>
      </div>
      <!-- /GALLERY ITEM -->

      <!-- GALLERY ITEM -->
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="gallery-box">
          <h5 class="gallery-box-title font-alt">Tattoo de otro pibe</h5>
          <div class="gallery-box-text font-serif">
            Branding / Photo
          </div>
          <a href="assets/images/portfolio-single/img-1-2.jpg" class="gallery" title="Title 2">
            <img src="assets/images/portfolio-single/img-1-2.jpg" alt="">
          </a>
        </div>
      </div>
      <!-- /GALLERY ITEM -->

      <!-- GALLERY ITEM -->
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="gallery-box">
          <h5 class="gallery-box-title font-alt">Otro Tattoo</h5>
          <div class="gallery-box-text font-serif">
            Design
          </div>
          <a href="assets/images/portfolio-single/img-1-3.jpg" class="gallery" title="Title 3">
            <img src="assets/images/portfolio-single/img-1-3.jpg" alt="">
          </a>
        </div>
      </div>
      <!-- /GALLERY ITEM -->

      <!-- GALLERY ITEM -->
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="gallery-box">
          <h5 class="gallery-box-title font-alt">Corporate Identity</h5>
          <div class="gallery-box-text font-serif">
            Design / Photo / Web
          </div>
          <a href="assets/images/portfolio-single/img-1-4.jpg" class="gallery" title="Title 4">
            <img src="assets/images/portfolio-single/img-1-4.jpg" alt="">
          </a>
        </div>
      </div>
      <!-- /GALLERY ITEM -->

      <!-- GALLERY ITEM -->
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="gallery-box">
          <h5 class="gallery-box-title font-alt">Cambridge friend</h5>
          <div class="gallery-box-text font-serif">
            Design / Web
          </div>
          <a href="assets/images/portfolio-single/img-1-5.jpg" class="gallery" title="Title 5">
            <img src="assets/images/portfolio-single/img-1-5.jpg" alt="">
          </a>
        </div>
      </div>
      <!-- /GALLERY ITEM -->

      <!-- GALLERY ITEM -->
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="gallery-box">
          <h5 class="gallery-box-title font-alt">A collection of textile</h5>
          <div class="gallery-box-text font-serif">
            Branding / Photo / Web
          </div>
          <a href="assets/images/portfolio-single/img-1-6.jpg" class="gallery" title="Title 6">
            <img src="assets/images/portfolio-single/img-1-6.jpg" alt="">
          </a>
        </div>
      </div>
      <!-- /GALLERY ITEM -->

    </div>
    <!-- /PORTFOLIO CONTENT -->

    <!-- PROJECT DETAILS -->
    <div class="row m-t-70">

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
