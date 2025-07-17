@extends('layouts.master')
@section('meta')
<title>Get in Touch with Local Beings | Contact Us Today!</title>
<meta name="title" content="Get in Touch with Local Beings | Contact Us Today!">
 <meta content="Have questions or suggestions? Contact Local Beings today! We're here to help you connect with local businesses and strengthen communities. Reach out now!" name="description">
  <link rel="canonical" href="https://localbeings.com/contact"/>
@endsection
@section('front')
    <!-- ======================= Top Breadcrubms ======================== -->
			<div class="bg-dark py-3">
				<div class="container">
					<div class="row">
						<div class="colxl-12 col-lg-12 col-md-12">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('front')}}" class="text-light">Home</a></li>
									<li class="breadcrumb-item"><a href="#" class="text-light">Pages</a></li>
									<li class="breadcrumb-item active theme-cl" aria-current="page">Contact Us</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Top Breadcrubms ======================== -->

			<!-- ======================= Contact Page Detail ======================== -->
			<section class="gray">
				<div class="container">

					<div class="row justify-content-center mb-5">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center">
								<h1 class="off_title">Contact Us</h1>
							</div>
						</div>
					</div>

					<div class="row align-items-start justify-content-center">

						<div class="col-xl-10 col-lg-11 col-md-12 col-sm-12">
							<form action="{{route('sendmail')}}"  class="row submit-form py-4 px-3 rounded bg-white mb-4">
							    @csrf
							    @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif

								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="small text-dark ft-medium">Your Name *</label>
										<input type="text" class="form-control" name="name" placeholder="Your Name" required="required">
									</div>
								</div>

								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="small text-dark ft-medium">Your Email *</label>
										<input type="text" class="form-control" name="email" placeholder="Your Email" required="required">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="small text-dark ft-medium">Mobile</label>
										<input type="text" class="form-control" name="phone" placeholder="+111 111 111 1111" required="required">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="small text-dark ft-medium">Subject</label>
										<input type="text" class="form-control" name="subject" placeholder="Type Your Subject" >
									</div>
								</div>

								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="small text-dark ft-medium">Message</label>
										<textarea name="messages" class="form-control ht-80" required="required"></textarea>
									</div>
								</div>

								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<button type="submit" class="btn theme-bg text-light">Send Message</button>
									</div>
								</div>

							</form>
						</div>

						<div class="col-xl-10 col-lg-11 col-md-12 col-sm-12">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-12">
									<div class="bg-white rounded p-3 mb-2">
										<h4 class="ft-medium mb-3 theme-cl">Address info:</h4>
										<!--<h6 class="ft-medium mb-1">We Serve In:</h6>-->
										<p>13832 Belmont Trail Rosemount,<br> MN 55068 USA</p>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-12">
									<div class="bg-white rounded p-3 mb-2">
										<h4 class="ft-medium mb-3 theme-cl">Call Us:</h4>
										<h6 class="ft-medium mb-1">Customer Care:</h6>
										<a href="tel:5343563741"><p class="mb-2">(534) 356 3741</p></a>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-12">
									<div class="bg-white rounded p-3 mb-2">
										<h4 class="ft-medium mb-3 theme-cl">Drop A Mail:</h4>
										<p>Drop mail we will contact you within 24 hours.</p>
										<!--<a href="mailto:support@localbeings.com"><p class="lh-1 text-dark">support@localbeings.com</p></a>-->
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ======================= Contact Page End ======================== -->

			<!-- ======================= Newsletter Start ============================ -->
			<section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
				<div class="container py-5">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-light mb-0">Subscribe Now</h6>
								<h2 class="ft-bold text-light">Get All Updates & Advance Offers</h2>
							</div>
						</div>
					</div>

					<div class="row align-items-center justify-content-center">
						<div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
							<form class="bg-white rounded p-1">
								<div class="row no-gutters">
									<div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
										<div class="form-group mb-0 position-relative">
											<input type="text" class="form-control b-0" placeholder="Enter Your Email Address">
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
										<div class="form-group mb-0 position-relative">
											<button class="btn full-width btn-height theme-bg text-light fs-md" type="button">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
			</section>
			<!-- ======================= Newsletter Start ============================ -->
@endsection
