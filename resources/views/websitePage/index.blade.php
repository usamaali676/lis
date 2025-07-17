<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{$land_page->meta_title}}</title>
  <meta name="description" content="{{$land_page->meta_description}}">
  <meta name="keywords" content="{{$land_page->meta_keywords}}">
  <link rel="canonical" href="https://localbeings.com/{{$land_page->slug}}"/>
  <meta name="robots" content="index, follow"> 
  <link rel="icon" type="image/x-icon" href="{{asset('assets/images/fav-icon.png')}}" >

  <!-- Favicons -->
  <!--<link href="assets/img/favicon.png" rel="icon">-->
  <!--<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <!--<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>-->
  <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">-->

  <!-- Vendor CSS Files -->                           
  <link rel="stylesheet"  href="{{asset('assets/landingpage/bootstrap/css/bootstrap.min.css')}}">
  <link rel="preload" type="text/css" href="{{asset('assets/landingpage/bootstrap-icons/bootstrap-icons.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" type="text/css" href="{{asset('assets/landingpage/aos/aos.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" type="text/css" href="{{asset('assets/landingpage/css/glightbox.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" type="text/css" href="{{asset('assets/landingpage/swiper/swiper-bundle.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">

  <!-- Main CSS File -->
  <link rel="preload" type="text/css"  href="{{asset('assets/landingpage/main.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">

  <!-- =======================================================
  * Template Name: Squadfree
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <!-- Include Glightbox CSS -->

  <style>
    :root{
        --accent-color
    }
    .header .logo img{
        width: 230px;
        height: 80px;
        object-fit: contain;
        margin-right: 20px;
        transition: filter 0.3s ease-in-out;
        max-height: 100%
    }
    .services.section, .container-fluid.fluid-content, section, .section{
        background-color: #fff;
    }
    .about .icon-box p{
        color: #000;
        font-size: 16px;
    }
    p, dl, ol, ul{
        color: #000;
        font-size: 16px;
    }
    h1, h2, h3, h4, h5, h6, .about .icon-box h4 a, .services .service-item h4 a{
        color: #282828;
    }
    .col-lg-12.content-col h3{
        font-weight: 600 !important;
    }
    h1{
      font-size: 3.5rem;   
      font-weight: 700;
      text-transform: uppercase;
    text-shadow: -1px 0 2px #2f4d5a;
    }
    .content-col h2 {
        font-weight: 700;
    }
    b, strong {
        font-weight: 700;
    }
            .scrolled .header {
            background-color: #fff;
        }
        .col-md-6.icon-box.position-relative{
            border: 1px solid #d7d7d7;
            padding: 20px;
            border-radius: 5px;
        }

        .footer h4, .footer .footer-contact p, .footer .copyright p{
            color: #fff;
        }
        .testimonials .testimonial-item{
            border: 1px solid #e3e3e3;
            border-radius: 10px;
            margin: 0 10px;
            box-shadow: 0px 0px 5px 0px rgb(161 163 164 / 29%);
        }
        
        




    @if(isset($land_page->business->theme_color))
        :root{
            --nav-hover-color: {{ $land_page->business->theme_color }};
            --accent-color: {{ $land_page->business->theme_color }};
            --nav-dropdown-hover-color: {{ $land_page->business->theme_color }};
        }
        .top-bar{
            background-color: {{ $land_page->business->theme_color }};
            color: #fff;
            padding: 10px 0;
        }
        .top-bar p {
            color: #fff;
            margin-bottom: 0px;
        }
        .top-bar i {
            color: #fff;
            padding: 0px 7px;
        }
        .navmenu a, .navmenu a:focus{
            color: {{ $land_page->business->theme_color }};
        }
        .buy-btn{
            background-color: {{ $land_page->business->theme_color }};
            color: #fff;
            padding: 15px 40px;
            border: 1px solid {{ $land_page->business->theme_color }};
        }
        .buy-btn:hover{
            background-color: #fff;
            color: {{ $land_page->business->theme_color }};
            border: 1px solid {{ $land_page->business->theme_color }};
        }
        .call-to-action .cta-btn:hover {
                background: #ffffff;
                border: 2px solid #f1f0ef;
                color: {{ $land_page->business->theme_color }};
        }
        .hero:before {
            content: "";
            background:
            color-mix(in srgb, {{ $land_page->banner->overly_color }}, transparent {{  $land_page->banner->overly_opacity }}%);
            position: absolute;
            inset: 0;
            z-index: 2;
        }
        .call-to-action:before {
            content: "";
            background:
            color-mix(in srgb, {{ $land_page->business->theme_color }}, transparent 50%);
            position: absolute;
            inset: 0;
            z-index: 2;
        }
        .accent-background{
            background-color: {{ $land_page->business->theme_color }} ;
        }
                .footer{
            background-color: {{ $land_page->business->theme_color }};
        }
        .footer .footer-links ul a:hover{
            color: #fff;
        }
        .theme-color{
            color:  {{ $land_page->business->theme_color }};
        }
        .footer .social-links a:hover{
            color: #fff;
            border-color: #fff;
        }
        .container.copyright {
    justify-content: center;
}

    @endif
    
    @if( $land_page->banner->subheading_color ==  0)
        .sub-heading{
            color: #fff !important;
        }
    @else
          .sub-heading{
            color: #000 !important;
        }
    @endif

    @media screen and (max-width: 480px) {
      .hero {
          min-height: 75vh;
        }
        .mobile-dnone{
            display: none;
        }
        @if( $land_page->banner->mobile_overly ==  0)
        .hero:before {
            content: "";
            background: color-mix(in srgb, #ffffff00, transparent 100%);
            position: absolute;
            inset: 0;
            z-index: 2;
        }
        else {
            .hero:before {
            content: "";
            background:
            color-mix(in srgb, {{ $land_page->banner->overly_color }}, transparent {{  $land_page->banner->overly_opacity }}%);
            position: absolute;
            inset: 0;
            z-index: 2;
        }
        }
        @endif
      }

  </style>

</head>

<body class="index-pages">
      <div class="top-bar" >
			<div class="container" >
				<div class="row">
				    @if(isset($land_page->address))
					<div class="col-sm-3 d-flex mobile-none">
						<i class="bi bi-geo-alt flex-shrink-0"></i>	&nbsp;	&nbsp;<p>{{$land_page->address}}</p>
					</div>
					@endif
				<div class="col-sm-4 d-flex mobile-none">
                    @if (isset($land_page->email))
						<a href="mailto:{{$land_page->email}}" style="display: flex; color: #fff;"><i class="bi bi-envelope flex-shrink-0" style=""></i>&nbsp;	&nbsp;<p>{{$land_page->email}}</p></a>
                    @else
                    @if(isset($land_page->business->email))
						<a href="mailto:{{$land_page->business->email}}" style="display: flex; color: #fff;"><i class="bi bi-envelope flex-shrink-0" style=""></i>&nbsp;	&nbsp;<p>{{$land_page->business->email}}</p></a>
					@endif
                    @endif
                </div>
     <!--                @if ($land_page->business->phone != "")-->
     <!--               <div class="col-sm-3 d-flex mobile-third">-->
					<!--	<a href="tel:{{$land_page->business->phone}}" style="display: flex; color: #fff;"><i class="bi bi-telephone flex-shrink-0" style=""></i>&nbsp;	&nbsp;<p>{{$land_page->business->phone}}</p></a>-->
					<!--</div>-->
     <!--               @endif-->
                    @if (isset($land_page->phone))
                    <div class="col-sm-2 d-flex mobile-third">
						<a href="tel:{{$land_page->phone}}" style="display: flex; color: #fff;"><i class="bi bi-telephone flex-shrink-0business" style=""></i>&nbsp;	&nbsp;<p>{{$land_page->phone}}</p></a>
					</div>
                    @else
                    <div class="col-sm-2 d-flex mobile-third">
						<a href="tel:{{$land_page->business->phone}}" style="display: flex; color: #fff;"><i class="bi bi-telephone flex-shrink-0business" style=""></i>&nbsp;	&nbsp;<p>{{$land_page->business->phone}}</p></a>
						
					</div>
                    @endif
					<div class="col-sm-3 mobile-onethird text-center mobile-none">
                        @if (isset($land_page->business->website))
                        <a href="{{ $land_page->business->website }}"><i class="bi bi-globe"></i></a>
                        @endif
                        @if (isset($land_page->business->fb))
                        <a href="{{ $land_page->business->fb }}"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if (isset($land_page->business->inst))
                        <a href="{{ $land_page->business->inst }}"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if (isset($land_page->business->youtube))
                        <a href="{{ $land_page->business->youtube }}"><i class="bi bi-youtube"></i></a>
                        @endif
                        @if (isset($land_page->business->whatsapp))
                        <a href="{{ $land_page->business->whatsapp }}"><i class="bi bi-whatsapp"></i></a>
                        @endif
                        @if (isset($land_page->business->yelp))
                        <a href="{{ $land_page->business->yelp }}"><i class="bi bi-yelp"></i></a>
                        @endif
                        @if (isset($land_page->business->gmb))
                        <a href="{{ $land_page->business->gmb }}"><i class="bi bi-google"></i></a>
                        @endif
					</div>
				</div>
			</div>
		</div>
  <header id="header" class="header d-flex align-items-center ">

    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="#hero" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <!--{{ $land_page->logo }}-->
        @if(isset($land_page->logo) && $land_page->logo != NULL)
            <img class="landing_logo" src="{{ asset('landingpage/logo') }}/{{ $land_page->logo }}" alt="">
        @else
            <img class="landing_logo" src="{{ asset('business/logo') }}/{{ $land_page->business->logo }}" alt="">
        @endif
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Gallery</a></li>
          <li><a href="#testimonials">Reveiws</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

        
     <div class="butn">
        @if(isset($land_page->phone))
        <a class="buy-btn mobile-dnone" href="tel:{{ $land_page->phone }}">Call Now</a>
      @else
        <a class="buy-btn mobile-dnone" href="tel:{{ $land_page->business->phone }}">Call Now</a>
      @endif
    </div>
      
      
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">

        <img id="banner-image" src="" width="100%" alt="{{ $land_page->banner->heading }}" data-aos="fade-in" >

      {{-- <img src="{{ asset('landingpage/desk_banner') }}/{{ $land_page->banner->desktop_image }}" width="100%" alt="" data-aos="fade-in"> --}}

      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <h1 @if(isset($land_page->banner->heading_color)) style="color: {{ $land_page->banner->heading_color }}" @else class="theme-color" @endif>{{ $land_page->banner->heading }}</h1>
        <p class="sub-heading">{{ $land_page->banner->subheading }}</p>
        <a href="#about" class="btn-scroll" title="Scroll Down"><i class="bi bi-chevron-down"></i></a>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-5">

        @if($land_page->about_check == true)
          <div class="content @if($land_page->feature_check == true)col-xl-5 @else col-xl-12 @endif  d-flex flex-column" style="justify-content: center;" data-aos="fade-up" data-aos-delay="100">
              <span @if(isset($land_page->business->theme_color)) style="color: {{$land_page->business->theme_color}};"@endif>Who We Are?</span>
            <h3>{{ $about->about_heading}}</h3>
            <!--<p style="text-align: justify;">-->
                {!!  $about->about_description !!}
            <!--</p>-->
            <a href="#" class="about-btn align-self-center align-self-xl-start"><span>About us</span> <i class="bi bi-chevron-right"></i></a>
          </div>
        @endif
          @if($land_page->feature_check == true)
            <div class="@if($land_page->about_check == true)col-xl-7 @else col-xl-12 @endif content" data-aos="fade-up" data-aos-delay="200">
                <h3>Why Choose Us?</h3>
                <div class="row gy-4">
                @if(isset($land_page->features) && count($land_page->features) > 0)
                    @foreach($land_page->features as $feature)
                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-broadcast"></i>
                            <h4>{{ $feature->feature_title }}</h4>
                            <p>{!! $feature->feature_description !!}</p>
                        </div><!-- Icon-Box -->
                    @endforeach
                @endif

                </div>
            </div>
          @endif

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Services Section -->
    @if($land_page->service_check == true)
    <section id="services" class="services ">    <div class="container-fluid fluid-service">
        <section id="services" >
            <!-- Section Title -->
            <div class="container services- section-title" data-aos="fade-up">
                <span @if(isset($land_page->business->theme_color)) style="color: {{$land_page->business->theme_color}};"@endif>What We Offer</span>
                <h2>Services We Offer</h2>
            </div><!-- End Section Title -->

            <div class="container container-service">

                <div class="row gy-4">

                   @if(isset($land_page->service) && count($land_page->service) > 0)
                    @foreach($land_page->service as $service)
                        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                            <div class="service-item position-relative">
                                <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                                <h4><a class="stretched-link">{{ $service->service_title }}</a></h4>
                                <p>{!! $service->service_description !!}</p>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                   @endif

                </div>

            </div>
        </section>
    </div>
    @endif
      <!-- Landing page content -->
      @if ($land_page->content_check == true)
      <div class="container-fluid fluid-content">
        <div class="container container-content">
            <div class="row row-content">
                <div class="col-lg-12 content-col">
                    <h2>{{ $content->content_title }}</h2>
                    {!! $content->content_description !!}
                </div>
            </div>
        </div>
    </div>
      @endif

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section accent-background">

      <!--<img src="assets/img/cta-bg.jpg" alt="">-->

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Call Us Now</h3>
              <p>Have a question or ready to get started? We're just a call away! Reach out today and let us assist you with whatever you need.</p>
                             <div class="d-flex" style="justify-content: center;">
                <div class="call_btn">
              @if(isset($land_page->phone))
                <a class="cta-btn" href="tel:{{ $land_page->phone }}">Call Us</a>
              @else
                <a class="cta-btn" href="tel:{{ $land_page->business->phone }}">Call Us</a>
              @endif
                </div>
                @if(isset($land_page->business->sms))
                    <div class="txt_btn">
                        <a class="cta-btn" href="sms:{{ $land_page->business->sms}}">Text Now</a>
                    </div>
                 @endif

              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span @if(isset($land_page->business->theme_color)) style="color: {{$land_page->business->theme_color}};"@endif>Our Work</span>
        <h2>Gallery</h2>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            {{-- @php
                dd($land_page);
            @endphp --}}

            @if(isset($land_page->gallery) && count($land_page->gallery) > 0)
                @foreach($land_page->gallery as $gallery_item)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="{{ asset('/landingpage/gallery') }}/{{ $gallery_item->image }}" width="416" class="img-fluid" alt="">
                        <div class="portfolio-info">
                        <a href="{{ asset('/landingpage/gallery') }}/{{ $gallery_item->image }}" title="" data-gallery="portfolio-gallery" class="glightbox preview-link">
                            <i class="bi bi-zoom-in"></i>
                        </a>
                        </div>
                    </div><!-- End Portfolio Item -->
                @endforeach
            @endif


          </div><!-- End Portfolio Container -->
        </div>
      </div>



    </section><!-- /Portfolio Section -->

<!-- Testimonials Section -->
    @if ($land_page->testimonial_check == true)
    <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>"See What Our Clients Say!"</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
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
                    },
                    "breakpoints": {
                      "320": {
                        "slidesPerView": 1,
                        "spaceBetween": 40
                      },
                      "1200": {
                        "slidesPerView": 3,
                        "spaceBetween": 1
                      }
                    }
                  }
                </script>
                <div class="swiper-wrapper">

                    @if(isset($land_page->testimonial) && count($land_page->testimonial) > 0)
                    @foreach($land_page->testimonial as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>{{ html_entity_decode(strip_tags($testimonial->testimonial_description)) }}</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <svg id="Layer_1" style="height: 80px; width: 70px;" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500.3 441.3"><defs><style>.cls-1{fill:{{$land_page->business->theme_color}}; }</style></defs><path class="cls-1" d="M500.15,279.5a249.57,249.57,0,0,1-88.79,191.15c-13.5-47-44-67.36-56.19-76.7C340.88,383,306,372.21,306,372.21V340.27c39-28.61,41.92-68.57,41.92-68.57,24.49-10.77,8-34.29,8-34.29l5.68-5.68V209.4c-8.42-96.78-67.2-95-67.2-95L283.08,91.66C260.36,89.5,221,96.16,221,96.16c-62.09,17.64-79.77,85.57-79.77,85.57-3.82,13-3.48,50-3.48,50l6.09,7c-16.09,22,9.52,34.87,9.52,34.87,5.44,45.06,40.57,67.12,40.57,67.12v31.95c-71.44,18.75-96.75,66.83-105.7,97.61A249.52,249.52,0,0,1-.15,279.5c0-138.15,112-250.15,250.16-250.15S500.15,141.35,500.15,279.5Z" transform="translate(0.15 -29.35)"/></svg>
                                <h3>{{ $testimonial->testimonial_title }}</h3>
                                <h4>Customer</h4>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach
                    @endif

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->
    @endif
    
    <!--Write A Review-->
            @if ($land_page->business->g_review_check == true)
    <section id="write_review" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Write A Review</h2>
            <p>"Share Your Feedback"</p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="{{asset('assets/images/google-verified-reviews-1.png')}}" > 
                </div>
                <div class="col-sm-12 text-center pt-5">
                         <a href="{{$land_page->business->g_review_slug}}" class="buy-btn">Write A Review</a>

                </div>
            </div>
        </div>
    </section>
    <!--End Review Section-->
    @endif
    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
         <span @if(isset($land_page->business->theme_color)) style="color: {{$land_page->business->theme_color}};"@endif>Keep In Touch</span>
        <h2>Contact</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class=" @if($land_page->form_check == true)col-lg-5 @else col-lg-12 @endif">

            <div class="info-wrap">

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  @if (isset($land_page->phone))
                    <a href="tel:{{ $land_page->phone }}">{{ $land_page->phone }}</a>
                  @else
                    <a href="tel:{{ $land_page->business->phone }}">{{ $land_page->business->phone }}</a>
                  @endif
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  @if (isset($land_page->email))
                    <a href="mailto:{{ $land_page->email }}">{{ $land_page->email }}</a>
                  @else
                    <a href="mailto:{{ $land_page->business->email }}">{{ $land_page->business->email }}</a>
                  @endif
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Service Area</h3>
                  <a href="#">{{ $land_page->address }}</a>
                </div>
              </div><!-- End Info Item -->
              @if (isset($land_page->business->video_link) && $land_page->video_check == true)
              <iframe width="100%" height="270" src="{{ $land_page->business->video_link }}" title="YouTube video player" frameborder="0" loading="lazy" allowfullscreen></iframe>

              @endif
            </div>
          </div>

          @if($land_page->form_check == true)
          <div class="col-lg-7">
            <form action="{{ route('landingpage.form_submit') }}" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <input type="hidden" name="slug" value="{{ $land_page->slug }}" id="">
                <input type="hidden" name="email_id" value="{{ $land_page->id }}">
                <input type="hidden" name="business_id" id="{{ $land_page->business_id }}">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email"  value="{{$land_page->email}}" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required="">

                  </textarea>
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
          @endif

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-3 col-md-6 footer-about">
          <a href="#" class="logo d-flex align-items-center">
            <span class="sitename">{{ $land_page->banner->heading }}</span>
          </a>
          <div class="footer-contact pt-3">
            <p href="#">{{ $land_page->banner->subheading }} </p>
            <p class="mt-3"><strong style="color: #fff">Phone:</strong>
                @if (isset($land_page->phone))
                    <a href="tel:{{ $land_page->phone }}">{{ $land_page->phone }}</a>
                  @else
                    <a href="tel:{{ $land_page->business->phone }}">{{ $land_page->business->phone }}</a>
                  @endif
            </p>
            <p><strong  style="color: #fff">Email:</strong>
                @if (isset($land_page->email))
                <a href="mailto:{{ $land_page->email }}">{{ $land_page->email }}</a>
              @else
                <a href="mailto:{{ $land_page->business->email }}">{{ $land_page->business->email }}</a>
              @endif
            </p>
          </div>
          <div class="social-links d-flex mt-4">

            @if (isset($land_page->business->website))
            <a href="{{ $land_page->business->website }}"><i class="bi bi-globe"></i></a>
            @endif
            @if (isset($land_page->business->fb))
            <a href="{{ $land_page->business->fb }}"><i class="bi bi-facebook"></i></a>
            @endif
            @if (isset($land_page->business->inst))
            <a href="{{ $land_page->business->inst }}"><i class="bi bi-instagram"></i></a>
            @endif
            @if (isset($land_page->business->youtube))
            <a href="{{ $land_page->business->youtube }}"><i class="bi bi-youtube"></i></a>
            @endif
            @if (isset($land_page->business->whatsapp))
            <a href="{{ $land_page->business->whatsapp }}"><i class="bi bi-whatsapp"></i></a>
            @endif
            @if (isset($land_page->business->yelp))
            <a href="{{ $land_page->business->yelp }}"><i class="bi bi-yelp"></i></a>
            @endif
            @if (isset($land_page->business->gmb))
            <a href="{{ $land_page->business->gmb }}"><i class="bi bi-google"></i></a>
            @endif

          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#hero" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#portfolio">Gallery</a></li>
            <li><a href="#testimonials">Reveiws</a></li>
            <li><a href="#contact">Contact Us</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-3 footer-links" style="max-height: 300px; overflow: auto;">
          <h4>Our Services</h4>
          @if(isset($land_page->business->landingpage) and sizeof($land_page->business->landingpage)>0)
          <ul id="quick-links" class="quick-links">
          @foreach($land_page->business->landingpage as $rp)
          @if($rp->id!=$land_page->id)
              <li><a href="{{route('business.single')}}/{{$rp->slug}}">{{$rp->title}}</a></li>

          @endif
         @endforeach
         </ul>
         @endif
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Address</h4>
          @if(isset($land_page->google_map))
          <iframe src="{{ $land_page->google_map }}" width="100%" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          @endif
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4 d-flex">
      <div><p>© <span>Copyright <script> var CurrentYear = new Date().getFullYear(); document.write(CurrentYear) </script>  | Powered by </span> <a href="https://firmtechservices.com/" style="color: #fff;"><strong class="px-1 sitename">FTS</strong></a> <span>All Rights Reserved</span></p>
      </div>
      <!--<div class="credits">-->
      <!--  Designed by <a href="https://firmtechservices.com/">FTS</a>-->
      <!--</div>-->
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->

  @include('sweetalert::alert')
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script defer src="{{asset('assets/landingpage/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script defer src="{{asset('assets/landingpage/php-email-form/validate.js')}}"></script>
  <script defer src="{{asset('assets/landingpage/aos/aos.js')}}"></script>
  <script defer src="{{asset('assets/landingpage/purecounter/purecounter_vanilla.js')}}"></script>
  <script defer src="{{asset('assets/landingpage/glightbox/js/glightbox.min.js')}}"></script>
  <script defer src="{{asset('assets/landingpage/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script defer src=" {{asset('assets/landingpage/isotope-layout/isotope.pkgd.min.js')}}"></script>
  {{-- <script src="{{asset('assets/landingpage/swiper/swiper-bundle.min.css')}}"></script> --}}
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js" integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Main JS File -->
  <script defer src="{{asset('assets/landingpage/js/main.js')}}"></script>

  <script>
    // Function to change the image based on screen size
    function updateBannerImage() {
        var screenWidth = window.innerWidth;
        var desktopImage = "{{ asset('landingpage/desk_banner') }}/{{ $land_page->banner->desktop_image }}";
        var mobileImage = "{{ asset('landingpage/mob_banner') }}/{{ $land_page->banner->mobile_image }}";

        var imageElement = document.getElementById("banner-image");

        // Check the screen width and set the appropriate image source
        if (screenWidth > 600) {
            imageElement.src = desktopImage;
        } else {
            imageElement.src = mobileImage;
        }
    }

    // Run the function on page load
    window.addEventListener('load', updateBannerImage);

    // Run the function whenever the window is resized
    window.addEventListener('resize', updateBannerImage);
</script>
<!-- The <link> tag is initially not in the HTML -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var link = document.createElement('link');
    link.href = 'https://fonts.gstatic.com';
    link.rel = 'preconnect';
    link.crossOrigin = 'anonymous';
    document.head.appendChild(link);
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var link = document.createElement('link');
    link.href = 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap';
    link.rel = 'stylesheet';
    document.head.appendChild(link);
  });
</script>


<!-- Image element that will be dynamically changed -->


</body>

</html>
