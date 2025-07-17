
@extends('layouts.app')
@section('content')

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Landing Pages</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="{{route('home')}}">Home</a></li>
							<li><a href="{{route('home')}}">Dashboard</a></li>
							<li>Landing Pages</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>



        {{-- Model --}}



        {{-- End-Model --}}



		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
                    <!--<form id="my-listings-search-form" action="javascript:void(0);">-->
                    <!--    <input type="text" name="search" id="my-listings-search" placeholder="Search listing">-->
                    <!--</form>-->
					<h4>{{$business->name}} LandingPages</h4>

					<ul  id="business-list">
                       @foreach($landingPage as $item)
                        <a href="https://localbeings.com/{{$item}}"><li>https://localbeings.com/{{$item}}</li></a>
                       @endforeach
					</ul>
				</div>

			</div>
            <div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 clearfix text-center py-md-5 pagination" style="padding: 15px 0; margin-top: 30px;">
					<!-- Pagination -->

                   


				</div>
			</div>


		</div>


@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#my-listings-search').on('keyup', function() {
            let query = $(this).val();

            $.ajax({
                url: '{{ route("business.search") }}',
                method: 'GET',
                data: { search: query },
                success: function(response) {
                    $('#business-list').html(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endsection