@extends('frontendtemplate')

@section('title' , 'Item Detail')

@section('content')
	<!-- <div class="container">
		<h4>Detail Page</h4>
	</div> -->

	<div class="container pb-4 animated animatedFadeInUp fadeInUp">
	<h1 class="text-center mt-5 mb-4">Product Detail</h1>
	<div class="row">
		<div class='col-md-4 mt-2 animated in-left'>
			<!-- {{ asset('backendtemplate/itemimg/1596261821.jpeg')}} -->
			<p><img src="{{asset($item->photo)}}" class='img-fluid'></p>
		</div>

		<div class='col-md-8  pt-5 mt-4 animated in-right'>
			<table class="table table bordered">
				<tbody>
					<tr><td>Product Name:<td>{{$item->name}}</td></tr>
					<tr><td>Product Code:<td>{{$item->codeno}}</td></tr>
					<tr><td>Product Price:<td>{{$item->price}} MMK</td></tr>
					<tr><td>Description:<td>{{$item->description}}</td></tr>
				</tbody>
			</table>
			<p class='text-center'><a class='btn btn-primary px-2 add_to_cart hvr-icon-buzz-out' href='#' role='button' data-id='{{$item->id}}' data-photo='{{asset($item->photo)}}' data-name='{{$item->name}}'data-codeno='{{$item->codeno}}' data-price='{{$item->price}}' data-description='{{$item->description}}'>Add to Cart  <i class='fa fa-shopping-cart hvr-icon' aria-hidden='true'></i></a></p>
		</div>
	</div>


</div>

@endsection

@section('script')
	<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}"></script>
@endsection