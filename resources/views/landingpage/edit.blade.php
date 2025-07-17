@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/css/landingPage.css')}}">
@endsection

<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2>Add Landing Page</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('home')}}">Dashboard</a></li>
                    <li>Edit Landing Page</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="{{route('landingpage.update', $land_page->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" style="color: red">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div id="add-landingPage">

                <!-- Section -->
                <div class="landingpage-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a>
                        </li>
                        <li role="presentation">
                            <a href="#services" aria-controls="services" role="tab" data-toggle="tab">Services</a>
                        </li>
                        <li role="presentation">
                            <a href="#content" aria-controls="content" role="tab" data-toggle="tab">Content</a>
                        </li>
                        <li role="presentation">
                            <a href="#testimonials" aria-controls="testimonials" role="tab" data-toggle="tab">Testimonials</a>
                        </li>
                        <li role="presentation">
                            <a href="#slider" aria-controls="slider" role="tab" data-toggle="tab">Slider</a>
                        </li>
                        <li role="presentation">
                            <a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">Gallery</a>
                        </li>
                        <li role="presentation">
                            <a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a>
                        </li>
                        <li role="presentation" class="last-li">
                            <a href="#feature" aria-controls="feature" role="tab" data-toggle="tab">Features</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <!-- Section -->
                            <div class="add-listing-section">
                                <input type="hidden" id="landingPage_id" name="landingPage_id" value="{{ $land_page->id }}">
                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                                </div>
                                {{-- <input type="hidden" name="lp_id" id=""> --}}

                                <!-- Title -->
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <h5>Business</h5>
                                        <select name="business_id" class="selectpicker chosen-select-no-single"
                                            data-style="btn btn-success btn-round" data-live-search="true" required>
                                            @if (isset($land_page->business_id))
                                                <option value="{{$land_page->business_id}}" selected>{{ $land_page->business->name }}</option>
                                            @else
                                                <option label="blank">Select Business</option>
                                            @endif
                                            @foreach ($business as $item)
                                            <option value="{{$item->id}}">{{ $item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>Title <i class="title" data-tip-content="Name of your business"></i></h5>
                                        <input class="search-field" type="text" value="{{ $land_page->title }}" name="title"  required />
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">
                                    <!-- Slug -->
                                    <div class="col-md-6">
                                        <h5>Slug</h5>
                                        <input class="search-field" type="text" value="{{ $land_page->slug }}" name="slug"  required />
                                    </div>
                                    <!-- Logo -->
                                    <div class="col-md-6">
                                        <h5>Meta Title</h5>
                                        <input class="search-field" type="text" value="{{ $land_page->meta_title }}" name="meta_title" />
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <h5>Meta Keyword</h5>
                                        <input class="search-field" type="text" value="{{$land_page->meta_keywords}}" name="meta_keyword" />
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Meta Description</h5>
                                        <input class="search-field" type="text" value="{{$land_page->meta_description}}" name="meta_description" />
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">


                                    <div class="col-md-6">
                                        <h5>Google Map</h5>
                                        <input class="search-field" value="{{$land_page->google_map}}" type="text" name="google_map" required />
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Address</h5>
                                        <input class="address" type="text" value="{{$land_page->address}}" name="address" required />
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Phone</h5>
                                        <input class="phone" type="text" value="{{$land_page->phone}}" name="phone" />
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Email</h5>
                                        <input class="email" type="text" value="{{$land_page->email}}" name="email" />
                                    </div>
                                     <div class="col-md-6">
                                        <h5>Logo</h5>
                                        <div class="uploadButton margin-top-15 text-center" style="position: relative">
                                            @if ($land_page->logo != "")
                                            <div id="logo_input">
                                                <img  src="{{ asset('landingpage/logo/'. $land_page->logo)}}" id="output" alt="Logo" width="180px" height="80px" class="img-responsive">
                                                <span id="logo_del" style="position: absolute;top: 0;left: 22%;text-align: left; background: #f41b3b; padding: 10px; color: #fff; font-weight: 700; border-radius: 5px; cursor: pointer">X</span>
                                            </div>
                                            @else
                                                <img  src="" id="output" style="display: none" alt="Logo" width="180px" height="80px" class="img-responsive">
                                            @endif

                                            <input type="file" name="logo" accept="image/*" id="upload"  onchange="loadFile(event)">
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Options -->
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <div class="heading-checkbox" ><h3>Status</h3></div>
                                        <!-- Switcher -->
                                        <label class="switch">
                                            <input type="checkbox" name="status" @if ( $land_page->status == true ) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="heading-checkbox"><h3>Contact Form</h3></div>
                                        <!-- Switcher -->
                                        <label class="switch">
                                            <input type="checkbox" name="form_check" @if($land_page->form_check == true) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>


                                </div>

                            </div>
                            <!-- Section / End -->
                        </div>

                            <!-- Additional Tab Panes -->
                        <div role="tabpanel" class="tab-pane" id="services">
                                <!-- Section -->
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-grid"></i> Services</h3>
                                    <!-- Switcher -->
                                    <label class="switch"><input type="checkbox" name="service_check" @if ($land_page->service_check == true) checked  @endif ><span
                                            class="slider round"></span></label>
                                </div>

                                <!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                                                    <!-- Row -->
                                            <div class="row with-forms">
                                                @php
                                                    $services = $land_page->service;
                                                @endphp
                                                @for( $i = 1; $i <=4; $i++)
                                                <input type="hidden" name="service_ids[]" value="@if(isset($services[$i-1]->id)){{$services[$i-1]->id}}@endif">
                                                     <!-- Slug -->
                                                <div class="col-md-12">
                                                    <h5>Title {{ $i }}</h5>
                                                    <input class="search-field" type="text" value="@if(isset($services[$i-1]->service_title)) {{ $services[$i-1]->service_title }} @endif" name="service_title[]"   />

                                                </div>
                                                <div class="col-md-12">
                                                    <h5>Description</h5>
                                                    <textarea class="ckeditor" id="editor1" rows="5" name="service_description[]"  cols="80">
                                                        @if (isset( $services[$i-1]->service_description ))
                                                            {{ $services[$i-1]->service_description }}
                                                        @endif

                                                    </textarea>
                                                </div>
                                                @endfor

                                            </div>
                                </div>
                                <!-- Switcher ON-OFF Content / End -->

                            </div>
                                <!-- Section / End -->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="content">
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-card-checklist"></i> Content</h3>
                                    <!-- Switcher -->
                                    <label class="switch"><input type="checkbox" name="content_check" @if ($land_page->content_check == true) checked @endif ><span
                                            class="slider round"></span></label>
                                </div>

                                <!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                                                    <!-- Row -->
                                            <div class="row with-forms">
                                                <!-- Slug -->
                                                <div class="col-md-12">
                                                    <h5>Title 1</h5>
                                                    <input class="search-field" type="text" name="content_title" value="{{$content->content_title}}"   />
                                                </div>
                                                <div class="col-md-12">
                                                    <h5>Description</h5>
                                                    <textarea class="ckeditor" id="editor1" rows="5" name="content_description" cols="80">
                                                        {!! $content->content_description !!}
                                                    </textarea>
                                                </div>

                                            </div>
                                </div>
                                <!-- Switcher ON-OFF Content / End -->

                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="testimonials">
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-grid"></i>Testimonials</h3>
                                    <!-- Switcher -->
                                    <label class="switch"><input type="checkbox" name="testimonial_check" @if ($land_page->testimonial_check == true)
                                        checked   @endif ><span
                                            class="slider round"></span></label>
                                </div>

                                <!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                                                    <!-- Row -->
                                            <div class="row with-forms">
                                                <!-- Slug -->
                                                @php
                                                    $testimonial = $land_page->testimonial;
                                                @endphp
                                                @for ($i =1 ; $i <=3 ; $i++)
                                                <input type="hidden" name="testimonial_ids[]" value="@if(isset($testimonial[$i-1]->id)){{$testimonial[$i-1]->id}}@endif">
                                                    <div class="col-md-12">
                                                        <h5>Client Name</h5>
                                                        <input class="search-field" type="text" value="@if(isset($testimonial[$i-1]->testimonial_title)) {{ $testimonial[$i-1]->testimonial_title }} @endif" name="testimonial_title[]"   />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h5>Description</h5>
                                                        <textarea class="ckeditor" id="editor1" name="testimonial_description[]" rows="5" cols="80">
                                                            @if(isset($testimonial[$i-1]->testimonial_description)) {{ $testimonial[$i-1]->testimonial_description }} @endif
                                                        </textarea>
                                                    </div>
                                                @endfor




                                            </div>
                                            {{-- <div class="row with-forms">
                                                <!-- Slug -->
                                                @for ($i = 1 ; $i <= 3 ; $i++)
                                                <div class="col-md-12">
                                                    <h5>Client Name</h5>
                                                    <input class="search-field" type="text" name="testimonial_title[]"  />
                                                </div>
                                                <div class="col-md-12">
                                                    <h5>Description</h5>
                                                    <textarea  id="editor1" name="testimonial_description[]" rows="5" cols="80">
                                                    </textarea>
                                                </div>
                                                @endfor

                                            </div> --}}
                                </div>
                                <!-- Switcher ON-OFF Content / End -->

                            </div>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="slider">
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-grid"></i>Slider</h3>
                                    <!-- Switcher -->

                                </div>
                                                                    <!-- Row -->
                                                <input type="hidden" name="banner_id" value="{{ $land_page->banner->id }}" id="">
                                            <div class="row with-forms">
                                                <!-- Slug -->
                                                <div class="col-md-6">
                                                    <h5>Heading</h5>
                                                    <input class="search-field" type="text" name="banner_heading" value="{{ $land_page->banner->heading }}" required  />
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Sub Heading</h5>
                                                    <input class="search-field" type="text" name="banner_subheading" value="{{ $land_page->banner->subheading }}"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Slider Heading Color</h5>
                                                    <input class="search-field" type="text" name="banner_heading_color" value="{{ $land_page->banner->heading_color }}"  placeholder="#eee"/>
                                                </div>

                                                <div class="col-md-6 ">
                                                    <h5>Slider Text Color</h5>
                                                   <div class="slider-radio" style="display: block">
                                                    <label class="custom-control custom-radio" style="display: flex; gap: 10px;">
                                                        <input class="form-check-input" type="radio" name="banner_subheading_color" id="slider_text_color" value="1" @if ($land_page->banner->subheading_color == 1) checked @endif>
                                                        <span class="custom-control-description">Black</span>
                                                    </label>
                                                    <label class="custom-control custom-radio" style="display: flex; gap: 10px;">
                                                        <input class="form-check-input" type="radio" name="banner_subheading_color" id="slider_text_color1" value="0"  @if ($land_page->banner->subheading_color == 0) checked @endif>
                                                        <span class="custom-control-description">White</span>
                                                    </label>
                                                   </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <h5>Desktop Banner</h5>
                                                    <div class="">
                                                        <div style="position: relative">
                                                            @if ($land_page->banner->desktop_image)
                                                            <img  src="{{ asset('landingpage/desk_banner/'.  $land_page->banner->desktop_image ) }}"  id="banner"  width="180px" height="80px" class="img-responsive">
                                                            <span id="banner_del" style="position: absolute;top: 0;left: 22%;text-align: left; background: #f41b3b; padding: 10px; color: #fff; font-weight: 700; border-radius: 5px; cursor: pointer">X</span>
                                                            @else
                                                                <img  src=""  id="banner" style="display: none"  width="180px" height="80px" class="img-responsive">
                                                            @endif

                                                        </div>
                                                        <input type="file" name="desktop_image"  accept="image/*" id="upload"  onchange="banner_desk(event)">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Mobile Banner</h5>
                                                    <div class="">
                                                        <div style="position: relative">
                                                            @if ($land_page->banner->mobile_image)
                                                            <img  src="{{ asset('landingpage/mob_banner/'.  $land_page->banner->mobile_image ) }}"  id="mob_banner"  width="180px" height="80px" class="img-responsive">
                                                            <span id="mob_banner_del" style="position: absolute;top: 0;left: 22%;text-align: left; background: #f41b3b; padding: 10px; color: #fff; font-weight: 700; border-radius: 5px; cursor: pointer">X</span>
                                                            @else
                                                                <img  src=""  id="mob_banner" style="display: none"  width="180px" height="80px" class="img-responsive">
                                                            @endif

                                                        </div>
                                                        <input type="file" name="mobile_image" accept="image/*" id="upload"onchange="banner_mob(event)">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Overly Color</h5>
                                                    <input class="search-field" type="text" name="overly_color" value="{{ $land_page->banner->overly_color }}"   placeholder="#eee"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Overly Transparency</h5>
                                                    <input class="search-field " type="number" name="overly_opacity" value="{{ $land_page->banner->overly_opacity }}"   min="0" max="100" step="10"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="heading-checkbox" ><h3>Overly Mobile</h3></div>
                                                    <!-- Switcher -->
                                                    <label class="switch">
                                                        <input type="hidden" name="overly_mobile" value="0">
                                                        <input type="checkbox" name="overly_mobile" value="1" @if(isset($land_page->banner->mobile_overly) && $land_page->banner->mobile_overly == 1) checked @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="heading-checkbox" ><h3>Video</h3></div>
                                                    <!-- Switcher -->
                                                    <label class="switch">
                                                        <input type="checkbox" name="video_check" value="{{$land_page->video_check}}" checked>
                                                        <span class="slider round"></span>  
                                                    </label>
                                                </div>
                                            </div>
                                <!-- Switcher ON-OFF Content / End -->

                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="gallery">
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-doc"></i> Gallery</h3>
                                    <label class="switch"><input type="checkbox" name="gallery_check" value="{{$land_page->gallery_check}}" checked><span
                                        class="slider round"></span></label>
                                </div>

                                 <!-- Switcher ON-OFF Content --><!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                                                    <!-- Row -->
                                            @php
                                            $gallery = $land_page->gallery;
                                            
                                            @endphp
                                            <div class="row with-forms">
                                                @for ($i = 1; $i <= 12; $i++)
                                                     <!-- Button 1 -->
                                                     
                                                     <!--@if(isset($gallery->image))-->
                                                     <!--   <img src="{{ asset('landingpage/gallery/' . $gallery->image ) }}"  id="gallery_{{ $i }}" width="180px" height="80px" class="img-responsive"> -->
                                                     <!--@endif-->

                                                       
                                                <div class="col-lg-4  img-gallery-div">
                                                     @if(isset($gallery[$i-1]->image))
                                                            <img src="{{asset('landingpage/gallery')}}/<?=$gallery[$i-1]->image?>" style="height: 180px;width: 240px;">
                                                            <span class="gallery_del" data-image-id="{{$gallery[$i-1]->id}}"  id="{{$gallery[$i-1]->id}}" style="position: absolute;top: 0;left: 22%;text-align: left; background: #f41b3b; padding: 10px; color: #fff; font-weight: 700; border-radius: 5px; cursor: pointer">X</span>
                                                      @else
                                                             <img src="" style="display: none" id="gallery_{{ $i }}" width="180px" height="80px" class="img-responsive">
                                                             <p id="file_name_{{ $i }}" style="font-weight: bold; margin-top: 10px;"></p>     
                                                      @endif
                                                    <label class="btn-upload" for="fileInput_{{$i}}">
                                                        <span>Select Image</span>
                                                    </label>
                                                    <input type="file" id="fileInput_{{$i}}" name="gallery_image[]"  onchange="gallery(event, {{ $i }})" style="display: none">
                                                    <!--<input type="file" id="fileInput" name="gallery_image[]">-->
                                                </div>
                                                @endfor


                                            </div>
                                </div>

                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane " id="about">
                                <!-- Section -->
                                <div class="add-listing-section">

                                    <!-- Headline -->
                                    <div class="add-listing-headline">
                                        <h3><i class="sl sl-icon-doc"></i> About</h3>

                                        <label class="switch"><input type="checkbox" name="about_check" @if($land_page->about_check == 1 ) checked @endif value="{{ $land_page->about_check }}"><span
                                            class="slider round"></span></label>
                                    </div>




                                    <div class="switcher-content">
                                        <!-- Row -->
                                        <div class="row with-forms">
                                            <!-- Slug -->
                                            <div class="col-md-12">
                                                <h5>Title 1</h5>
                                                <input class="search-field" type="text" name="about_heading" value="{{ $about->about_heading}}"  />
                                            </div>
                                            <div class="col-md-12">
                                                <h5>Description</h5>
                                                <textarea class="ckeditor"  id="editor1" rows="5" name="about_description" cols="80">
                                                    {{$about->about_description}}
                                                                            </textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Section / End -->
                                </div>



                        </div>

                        <div role="tabpanel" class="tab-pane " id="feature">
                                <!-- Section -->
                                <div class="add-listing-section">

                                    <!-- Headline -->
                                    <div class="add-listing-headline">
                                        <h3><i class="sl sl-icon-doc"></i> Features</h3>
                                        <label class="switch"><input type="checkbox" name="feature_check" value="{{$land_page->feature_check}}" checked><span
                                            class="slider round"></span></label>
                                    </div>


                                <!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                    <!-- Row -->
                                            <div class="row with-forms">

                                                @php
                                                    $features = $land_page->features;
                                                @endphp

                                                @for ($i = 1; $i <= 4; $i++)
                                                <input type="hidden" name="feature_ids[]" value="@if(isset($features[$i-1]->id)){{$features[$i-1]->id}}@endif">

                                                                                                   <!-- Slug -->
                                                    <div class="col-md-12">
                                                        <h5>Title {{ $i }}</h5>

                                                        <input class="search-field" type="text" name="feature_title[]" value="@if (isset($features[$i-1]->feature_title)) {{ $features[$i-1]->feature_title }} @endif"  />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h5>Description</h5>
                                                        <textarea  class="ckeditor" id="editor1" rows="5" name="feature_description[]" cols="80">
                                                            @if (isset($features[$i-1]->feature_description)) {{ $features[$i-1]->feature_description }} @endif
                                                        </textarea>
                                                    </div>
                                                @endfor






                                            </div>
                                </div>
                                <!-- Switcher ON-OFF Content / End -->

                                </div>



                        </div>
                </div>
            </div>

            <button class="button preview">Submit <i class="fa fa-arrow-circle-right"></i></button>
    </div>
    </form>
</div>

@endsection

@section('js')
<!-- jQuery -->
<!-- Bootstrap JS for Bootstrap 3 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.0/ckeditor.js" integrity="sha512-x9cTrtvYtEBMlCpiMPiN66HsNQ0Rf2l9eeFeExYmOWdPFjPrT5a9UPdLTZ+tdxtmE5eeKIril3xXFJGSYKXTYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
<script>
    $(document).ready(function() {
        $('#logo_del').click(function (e) {
            e.preventDefault();

            // Show a confirmation dialog
            if (confirm("Are you sure you want to delete?")) {
                // User clicked "OK"
                var landingPage_id = $("input[name='landingPage_id']").val();
                // Proceed with deletion logic, e.g., making an AJAX call
                console.log("Deleting landing page with ID:", landingPage_id);
                // Add your deletion logic here
            } else {
                // User clicked "Cancel"
                console.log("Deletion canceled");
            }

            $.ajax({
                url: "{{ route('landingpage.logo-del') }}",
                type: "GET",
                data: {'landingPage_id': landingPage_id},
                success: function (response) {
                    data = response;
                    $('#output').hide();
                    $('#logo_del').hide();
                    alert("Image Deleted Successfully!");

                }
            });
        });
    });
</script>
<script type="text/javascript">
    var loadFile = function(event) {
        // alert("File Loading Success");
        var output = document.getElementById('output');
        // alert(output.src);
        var button = document.getElementById('logo_del');
        if(button){
        button.style = 'display:none;';
        }
        if(output){
        output.src = '';
        }
        if(output.src){
            output.style = 'display:block;';
        }
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    </script>

<script type="text/javascript">
    var banner_desk = function(event) {
        var output = document.getElementById('banner');
        var button = document.getElementById('banner_del');
        if(button){
        button.style = 'display:none;';
        }
        if(output){
        output.src = '';
        }
        if(output.src){
            output.style = 'display:block;';
        }
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    </script>
    <script>
        $(document).ready(function() {
            $('#banner_del').click(function (e) {
                e.preventDefault();

                // Show a confirmation dialog
                if (confirm("Are you sure you want to delete?")) {
                    // User clicked "OK"
                    var landingPage_id = $("input[name='landingPage_id']").val();
                    // Proceed with deletion logic, e.g., making an AJAX call
                    console.log("Deleting landing page with ID:", landingPage_id);
                    // Add your deletion logic here
                } else {
                    // User clicked "Cancel"
                    console.log("Deletion canceled");
                }

                $.ajax({
                    url: "{{ route('landingpage.deletebanner') }}",
                    type: "GET",
                    data: {'landingPage_id': landingPage_id},
                    success: function (response) {
                        data = response;
                        $('#banner').hide();
                        $('#banner_del').hide();
                        alert("Image Deleted Successfully!");

                    }
                });
            });
        });
    </script>
<script type="text/javascript">
    var banner_mob = function(event) {
        var output = document.getElementById('mob_banner');
        var button = document.getElementById('mob_banner_del');
        if(button){
        button.style = 'display:none;';
        }
        if(output){
        output.src = '';
        }
        if(output.src){
            output.style = 'display:block;';
        }
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    </script>
    <script>
        $(document).ready(function() {
            $('#mob_banner_del').click(function (e) {
                e.preventDefault();

                // Show a confirmation dialog
                if (confirm("Are you sure you want to delete?")) {
                    // User clicked "OK"
                    var landingPage_id = $("input[name='landingPage_id']").val();
                    // Proceed with deletion logic, e.g., making an AJAX call
                    console.log("Deleting landing page with ID:", landingPage_id);
                    // Add your deletion logic here
                } else {
                    // User clicked "Cancel"
                    console.log("Deletion canceled");
                }

                $.ajax({
                    url: "{{ route('landingpage.bannermob') }}",
                    type: "GET",
                    data: {'landingPage_id': landingPage_id},
                    success: function (response) {
                        data = response;
                        $('#mob_banner').hide();
                        $('#mob_banner_del').hide();
                        alert("Image Deleted Successfully!");

                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        var gallery = function(event, index) {
            var output = document.querySelector('#gallery_' + index);
            var fileNameDisplay = document.querySelector('#file_name_' + index);
        
            if (event.target.files.length > 0) {
                var file = event.target.files[0];
        
                // Display image
                if (output) {
                    output.style.display = 'block';
                    output.src = URL.createObjectURL(file);
                    output.onload = function() {
                        URL.revokeObjectURL(output.src); // Free memory
                    };
                } else {
                    console.error('Element not found with id: gallery_' + index);
                }
        
                // Display file name
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = 'File Name: ' + file.name;
                } else {
                    console.error('Element not found with id: file_name_' + index);
                }
            } else {
                console.error('No file selected.');
            }
        };

    </script>
       <script>
        $(document).ready(function() {
            $('.gallery_del').click(function (e) {
                e.preventDefault();
        
                if (confirm("Are you sure you want to delete?")) {
                    var landingPage_id = $("input[name='landingPage_id']").val();
                    var image_id = $(this).data('image-id'); // Get image ID
                    var parentDiv = $(this).closest('.img-gallery-div'); // Ensure correct parent div is selected
        
                    console.log("Deleting image with ID:", image_id);
                    console.log("Parent div found:", parentDiv.length > 0);
        
                    $.ajax({
                        url: "{{ route('landingpage.galleryrem') }}",
                        type: "GET",
                        data: {'landingPage_id': landingPage_id, 'image_id': image_id},
                        success: function (response) {
                            alert("Image Deleted Successfully!");
        
                            // Ensure the parent div is correctly targeted before removing it
                            if (parentDiv.length) {
                                parentDiv.fadeOut(300, function() {
                                    $(this).remove();
                                });
                            } else {
                                console.error("Parent div not found!");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error deleting image:", error);
                        }
                    });
                } else {
                    console.log("Deletion canceled");
                }
            });
        });


    </script>
@endsection


