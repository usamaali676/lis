@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://itsjavi.com/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
@endsection
@section('content')
<!-- Container -->


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container" style="width: 100%">
		<div class="row">
			<div class="col-md-12">

				<h2><i class="sl sl-icon-plus"></i> Add BusinessCategory</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('home')}}">Home</a></li>
						<li>Add BusinessCategory</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->


<!-- Container -->
<div class="container" style="width: 100%">

		<div class="row">
			<div class="col-lg-12">

				<div id="add-listing" class="separated-form">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
                        <form action="{{route('bc.update')}}" method="POST" enctype="multipart/form-data">
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
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>BusinessCategory Name <i class="tip" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" type="text" name="name" value="{{ $category->name}}"/>
                                <input type="hidden" name="id" value="{{ $category->id}}">
							</div>
                            <div class="col-md-6">
                                <h5>Slug</h5>
                                <input class="search-field" type="text" name="slug" value="{{$category->slug}}"/>
                            </div>
						</div>
                        <div class="row with-forms">
                            <div class="col-md-6">
                                <h5>Icon </h5>
                                <input class="form-control icp icp-auto" name="icon" value="{{$category->icon}}" type="text"/>

                            </div>

                            </div>


					</div>
					<!-- Section / End -->
					<button class="button preview">Submit <i class="fa fa-arrow-circle-right"></i></button>
                </form>

				</div>
			</div>

		</div>

	</div>
	<!-- Content / End -->
<!-- Container / End -->

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://itsjavi.com/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
<script>
    $('.icp-auto').iconpicker();
</script>
@endsection
