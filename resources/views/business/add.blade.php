@php
$user = Auth::user();
@endphp
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">
    <style>
        .swal2-container.swal2-top-end.swal2-backdrop-show{
            z-index: 9999;
        }
        .swal2-popup.swal2-toast .swal2-title{
                font-size: 2em;
        }
        .alert.alert-danger {
            font-size: 15px;
        }
    </style>

@endsection
@section('content')

<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2>Add Listing</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('home')}}">Dashboard</a></li>
                    <li>Add Listing</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form  id="detail_form" action="{{route('business.store')}}" method="POST" enctype="multipart/form-data">
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
            <div id="add-listing">

                <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                    </div>
                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-6">
                            <h5>Listing Title <i class="tip" data-tip-content="Name of your business"></i></h5>
                            <input class="search-field" type="text" name="name" required />
                        </div>
                        <div class="col-md-6">
                            <h5>Listing Slug</h5>
                            <input class="search-field" type="text" name="slug" required />
                        </div>
                    </div>


                    <!-- Row -->
                    <div class="row with-forms">

                        <!-- Status -->
                        <div class="col-md-6 ">
                            <h5>Business Category</h5>
                            <select name="cat_id[]" class="form-control selectpicker chosen-select-no-single"
                                data-style="btn btn-success btn-round" data-live-search="true" multiple required>
                                <option label="blank">Select Category</option>
                                @foreach ($bcat as $item)
                                <option value="{{$item->id}}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h5>Logo</h5>
                            <div class="uploadButton margin-top-15 text-center">
                                <input type="file" name="logo" accept="image/*" id="upload" required>
                            </div>
                        </div>


                    </div>
                    <!-- Row / End -->
                    <!-- Row -->
                    <div class="row with-forms">

                        <!-- Status -->
                        <div class="col-md-6">
                            <h5>Meta Title</h5>
                            <input class="search-field" type="text" name="meta_title" />
                        </div>
                        <div class="col-md-6">
                            <h5>Meta Keyword</h5>
                            <input class="search-field" type="text" name="meta_keyword" />
                        </div>


                    </div>
                    <!-- Row / End -->
                    <!-- Row -->
                    <div class="row with-forms">

                        <!-- Status -->
                        <div class="col-md-12">
                            <h5>Meta Description</h5>
                            <input class="search-field" type="text" name="meta_description" />
                        </div>


                    </div>
                    <!-- Row / End -->

                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-location"></i> Location</h3>
                    </div>

                    <div class="submit-section">

                        <!-- Row -->
                        <div class="row with-forms">



                            <!-- Address -->
                            <div class="col-md-12">
                                <h5>Address</h5>
                                <input type="text" placeholder="" name="address">
                            </div>
                            @if ($user->status == 1)
                            <div class="col-md-12">
                                <h5>Map</h5>
                                <input type="text" placeholder="" name="map">
                            </div>
                            @endif




                        </div>
                        <!-- Row / End -->

                    </div>
                </div>
                <!-- Section / End -->


                <!-- Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-picture"></i> Gallery</h3>
                    </div>

                    <!-- Dropzone -->
                    <div class="submit-section">
                        <input type="file" name="images[]" accept="image/*" multiple required>
                    </div>

                </div>
                <!-- Section / End -->


                <!-- Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-docs"></i> Details</h3>
                    </div>

                    <!-- Description -->
                    <div class="form">
                        <h5>Description</h5>
                        <textarea class="ckeditor WYSIWYG" name="description" cols="40" rows="3" id="summary"
                            spellcheck="true" required></textarea>
                    </div>

                    <!-- Row -->
                    <div class="row with-forms">

                        <!-- Phone -->
                        <div class="col-md-4">
                            <h5>Phone </h5>
                            <input type="text" name="phone">
                        </div>

                        <!-- Website -->
                        <div class="col-md-4">
                            <h5>Website <span>(optional)</span></h5>
                            <input type="text" name="website">
                        </div>

                        <!-- Email Address -->
                        <div class="col-md-4">
                            <h5>E-mail </h5>
                            <input type="text" name="email">
                        </div>

                    </div>
                    <!-- Row / End -->
                    <!-- Row -->
                    <div class="row with-forms">
                        @if ($user->status == 1)
                        <!-- Phone -->
                        <div class="col-md-4">
                            <h5>SMS No. <span>(optional)</span></h5>
                            <input type="text" name="sms">
                        </div>
                        @endif
                        <!-- Website -->
                        <div class="col-md-4">
                            <h5>Gmb Link <span>(optional)</span></h5>
                            <input type="text" name="gmb">
                        </div>

                        @if ($user->status == 1)
                        <!-- Email Address -->
                        <div class="col-md-4">
                            <h5>Whatsapp <span>(optional)</span></h5>
                            <input type="text" name="whatsapp">
                        </div>
                        @endif

                    </div>
                    <!-- Row / End -->


                    <!-- Row -->
                    <div class="row with-forms">

                        @if ($user->status == 1)
                        <!-- Phone -->
                        <div class="col-md-4">
                            <h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span>
                            </h5>
                            <input type="text" placeholder="https://www.facebook.com/" name="fb">
                        </div>
                        @endif

                        @if ($user->status == 1)
                        <!-- Website -->
                        <div class="col-md-4">
                            <h5 class="insta-input" style="color: #E1306C"><i class="fa fa-instagram"
                                    aria-hidden="true"></i>Insta <span>(optional)</span></h5>
                            <input type="text" placeholder="https://www.instagram.com/" name="inst">
                        </div>
                        @endif

                        @if ($user->status == 1)
                        <!-- Email Address -->
                        <div class="col-md-4">
                            <h5 class="gplus-input"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube
                                <span>(optional)</span></h5>
                            <input type="text" placeholder="https://youtube.com" name="youtube">
                        </div>
                        @endif

                        @if ($user->status == 1)
                        <!-- Email Address -->
                        <div class="col-md-4">
                            <h5 class="gplus-input"><i class="fa fa-yelp" aria-hidden="true"></i> Yelp
                                <span>(optional)</span></h5>
                            <input type="text" placeholder="https://yelp.com" name="yelp">
                        </div>
                        @endif
                        <div class="col-md-4">
                            <h5>Feature Image</h5>
                            <div class="uploadButton margin-top-15 text-center">
                                <input type="file" name="feature" accept="image/*, application/pdf" id="upload">
                            </div>
                        </div>

                        @if ($user->status == 1)
                        <!-- Email Address -->
                        <div class="col-md-4">
                            <h5 class="gplus-input"><i class="fa fa-eyedropper" aria-hidden="true"></i> Theme Color
                                <span>(Requierd)</span></h5>
                            <input type="text" placeholder="#ff0000" name="theme_color">
                        </div>
                        @endif

                        @if ($user->status == 1)
                        <!-- Email Address -->
                        <div class="col-md-12">
                            <h5 class="gplus-input"><i class="fa fa-video-camera" aria-hidden="true"></i> Video
                                <span>(Optional)</span></h5>
                            <input type="text" placeholder="Embed Video URL" name="video_link">
                        </div>

                        <div class="col-md-4">
                            <h5 class="gplus-input"><i class="fa fa-google" aria-hidden="true"></i> Google Review Check
                                <span>(Optional)</span></h5>
                            <div class="check-input">
                              <input type="checkbox" name="g_review_check" checked>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5 class="gplus-input"><i class="fa fa-google" aria-hidden="true"></i> Google Review Link
                                <span>(Optional)</span></h5>
                            <div class="check-input">
                              <input type="text" name="g_review_slug" placeholder="Google Review Link">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5 class="fb-input"><i class="fa-solid fa-page" aria-hidden="true"></i>Landing Page ID
                                <span>(Requierd)</span></h5>
                            <div class="check-input">
                              <input type="number" name="lp_id" value="{{ $lp_id +1 }}" min="{{ $lp_id +1 }}">
                            </div>
                        </div>

                        @endif

                    </div>
                    <!-- Row / End -->



                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
                        <!-- Switcher -->
                        <label class="switch"><input type="checkbox" name="timing_status" checked><span
                                class="slider round"></span></label>
                    </div>

                    <!-- Switcher ON-OFF Content -->
                    <div class="switcher-content">

                        <!-- Day -->
                        <div class="row opening-day">
                            <div class="col-md-2">
                                <h5>Monday <input type="hidden" name="day[]" value="Monday"></h5>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                    <option label="Opening Time"></option>
                                    <option>&nbsp;</option>
                                    <option>Closed</option>
                                    <option>Open 24 Hours</option>
                                    <option>1 AM</option>
                                    <option>2 AM</option>
                                    <option>3 AM</option>
                                    <option>4 AM</option>
                                    <option>5 AM</option>
                                    <option>6 AM</option>
                                    <option>7 AM</option>
                                    <option>8 AM</option>
                                    <option>9 AM</option>
                                    <option>10 AM</option>
                                    <option>11 AM</option>
                                    <option>12 AM</option>
                                    <option>1 PM</option>
                                    <option>2 PM</option>
                                    <option>3 PM</option>
                                    <option>4 PM</option>
                                    <option>5 PM</option>
                                    <option>6 PM</option>
                                    <option>7 PM</option>
                                    <option>8 PM</option>
                                    <option>9 PM</option>
                                    <option>10 PM</option>
                                    <option>11 PM</option>
                                    <option>12 PM</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                    <option label="Closing Time"></option>
                                    <option>&nbsp;</option>
                                    <option>Closed</option>
                                    <option>Open 24 Hours</option>
                                    <option>1 AM</option>
                                    <option>2 AM</option>
                                    <option>3 AM</option>
                                    <option>4 AM</option>
                                    <option>5 AM</option>
                                    <option>6 AM</option>
                                    <option>7 AM</option>
                                    <option>8 AM</option>
                                    <option>9 AM</option>
                                    <option>10 AM</option>
                                    <option>11 AM</option>
                                    <option>12 AM</option>
                                    <option>1 PM</option>
                                    <option>2 PM</option>
                                    <option>3 PM</option>
                                    <option>4 PM</option>
                                    <option>5 PM</option>
                                    <option>6 PM</option>
                                    <option>7 PM</option>
                                    <option>8 PM</option>
                                    <option>9 PM</option>
                                    <option>10 PM</option>
                                    <option>11 PM</option>
                                    <option>12 PM</option>
                                </select>
                            </div>
                        </div>
                        <!-- Day / End -->

                        <!-- Day -->
                        <div class="row opening-day js-demo-hours">
                            <div class="col-md-2">
                                <h5>Tuesday <input type="hidden" name="day[]" value="Tuesday"></h5>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                        </div>
                        <!-- Day / End -->

                        <!-- Day -->
                        <div class="row opening-day js-demo-hours">
                            <div class="col-md-2">
                                <h5>Wednesday <input type="hidden" name="day[]" value="Wednesday"></h5>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                        </div>
                        <!-- Day / End -->

                        <!-- Day -->
                        <div class="row opening-day js-demo-hours">
                            <div class="col-md-2">
                                <h5>Thursday <input type="hidden" name="day[]" value="Thursday"></h5>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                        </div>
                        <!-- Day / End -->

                        <!-- Day -->
                        <div class="row opening-day js-demo-hours">
                            <div class="col-md-2">
                                <h5>Friday <input type="hidden" name="day[]" value="Friday"></h5>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                        </div>
                        <!-- Day / End -->

                        <!-- Day -->
                        <div class="row opening-day js-demo-hours">
                            <div class="col-md-2">
                                <h5>Saturday <input type="hidden" name="day[]" value="Saturday"></h5>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                        </div>
                        <!-- Day / End -->

                        <!-- Day -->
                        <div class="row opening-day js-demo-hours">
                            <div class="col-md-2">
                                <h5>Sunday <input type="hidden" name="day[]" value="Sunday"></h5>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                    <!-- Hours added via JS (this is only for demo purpose) -->
                                </select>
                            </div>
                        </div>
                        <!-- Day / End -->

                    </div>
                    <!-- Switcher ON-OFF Content / End -->

                </div>
                <!-- Section / End -->

                @if ($user->status == 1)
                <!-- Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-book-open"></i> Areas We Serve</h3>
                        <!-- Switcher -->
                        <label class="switch"><input type="checkbox" name="area_status" @if ($user->status == 1) checked
                            @endif><span class="slider round"></span></label>
                    </div>

                    <!-- Switcher ON-OFF Content -->
                    <div class="switcher-content">

                        <div class="row">
                            <div class="col-md-12">
                                <table id="pricing-list-container">
                                    <tr class="pricing-list-item pattern">
                                        <td>
                                            <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                            <div class="fm-input"><input type="text" placeholder="Area Name"
                                                    name="areaserve[]" /></div>
                                            <div class="fm-input"><input type="text" placeholder="Slug"
                                                    name="area_slug[]" /></div>
                                            <div class="fm-input state-name">
                                                <select name="state_id[]" id="state">
                                                    <option value="">Please Select</option>
                                                    @foreach ($state as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <div class="fm-input pricing-ingredients"><input type="text"
                                                    placeholder="Description" /></div>
                                            <div class="fm-input pricing-price"><input type="text" placeholder="Price"
                                                    data-unit="USD" /></div> --}}
                                            <div class="fm-close"><a class="delete" href="#"><i
                                                        class="fa fa-remove"></i></a></div>
                                        </td>
                                    </tr>
                                </table>
                                <a href="#" class="button add-pricing-submenu">Add Area</a>
                            </div>
                        </div>

                    </div>
                    <!-- Switcher ON-OFF Content / End -->

                </div>
                <!-- Section / End -->
                @endif
                <!-- Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-book-open"></i>Tags</h3>
                        <!-- Switcher -->
                        <label class="switch"><input type="checkbox" name="tags_check" ><span
                                class="slider round"></span></label> 
                    </div>

                    <!-- Switcher ON-OFF Content -->

                    <div class="row">
                        <div class="col-md-12">
                            <table id="tag-list-container">
                                <tr class="tag-list-item pattern">
                                    <td>
                                        <div class="ft-move"><i class="sl sl-icon-cursor-move"></i></div>
                                        <div class="ft-input"><input type="text" placeholder="Tag Name" name="tag[]" />
                                        </div>
                                        <div class="ft-close"><a class="delete" href="#"><i
                                                    class="fa fa-remove"></i></a></div>
                                    </td>
                                </tr>
                            </table>
                            <a href="#" class="button add-tag-submenu">Add Tag</a>
                        </div>
                    </div>

                    <!-- Switcher ON-OFF Content / End -->

                </div>
                <!-- Section / End -->



                <button class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></button>
            </div>
        </form>
    </div>


</div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.0/ckeditor.js" integrity="sha512-x9cTrtvYtEBMlCpiMPiN66HsNQ0Rf2l9eeFeExYmOWdPFjPrT5a9UPdLTZ+tdxtmE5eeKIril3xXFJGSYKXTYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('description', {
    filebrowserUploadUrl: "{{route('blog.ckeditor', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
    });
</script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script>
        $(document).ready(function () {
        $('#detail_form').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Store current form values before submission, particularly time and select elements


            // Create a FormData object to handle form data
            let formData = new FormData(this);

            // Clear previous error messages

            $.ajax({
                url: $(this).attr('action'), // Form action URL
                type: $(this).attr('method'), // POST method
                data: formData,
                processData: false, // Important: do not process the data
                contentType: false, // Important: content type is false
                success: function (response) {


                    // Handle success response (display success message using SweetAlert2)
                    Swal.fire({
                       position: 'top-end', // Position the toast at the top-right corner
                        icon: 'success', // Change this to 'error', 'warning', etc., based on your requirement
                        title: 'Sale Info Saved Successfully', //
                        showConfirmButton: false, // Remove the confirm button
                        timer: 350000, // Duration in milliseconds before the toast disappears
                        toast: true, // Enable the toast feature

                    });



                    // Optionally reset the form only on success
                    // $('#saleForm')[0].reset();
                    // This will reset the form fields
                },
                error: function (xhr) {
                    // Handle validation errors
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        console.log(errors);
                        let errorHtml = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function (key, value) {
                            errorHtml += '<li>' + value + '</li>';
                        });
                        errorHtml += '</ul></div>';
                        $('#detail_form').prepend(errorHtml); // Add errors to the form

                        // Display SweetAlert2 for validation errors
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Validation Error',
                            html: errorHtml, // Use the generated error HTML
                            showConfirmButton: false, // Remove the confirm button
                            timer: 1500, // Duration in milliseconds before the toast disappears
                            toast: true,
                        });
                    }
                    else if (xhr.responseJSON.error) {
                        // Show custom error message with SweetAlert2
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON.error, // Show the custom error message
                            showConfirmButton: false, // Remove the confirm button
                            timer: 1500, // Duration in milliseconds before the toast disappears
                            toast: true,
                        });
                    }

                    // Restore time input and select values after error
                }
            });
        });
    });
    </script>

@endsection
