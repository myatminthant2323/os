@extends('backendtemplate')

@section('title','Items')

@section('content')

	<div class="container-fluid">
		<h2 class="d-inline-block">Items List</h2>
		<a href="{{route('items.create')}}" class="btn btn-primary float-right btn-sm">Add New</a>
		<table class="table table-border">
			<thead>
				<tr>
					<th>No</th>
					<th>Code No</th>
					<th>Name</th>
					<th>Price</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
				<tr>
					<td>{{$item->id}}</td>
					<td>{{$item->codeno}}
						<a href="{{route('items.show',$item->id)}}">
							<span class="badge badge-primary ml-2"><i class='fas fa-eye'></i></span>
						</a>
						<a href="#" class="detailBtn" data-photo="{{asset($item->photo)}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-description="{{$item->description}}">
							<span class="badge badge-primary ml-2"><i class='fas fa-eye'></i></span>
						</a>
					</td>
					<td>{{$item->name}}</td>
					<td>{{$item->price}}</td>
					<td>
						<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning"><i class='fas fa-edit'></i></a>
						<form method="post" action="{{route('items.destroy',$item->id)}}" class="d-inline-block deleteform">
							@csrf
							@method('DELETE')
							<button type="button" name="btn-submit" class="btn btn-danger btn-delete"><i class='fas fa-trash'></i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				
			</tfoot>
		</table>
	</div>



	<!-- modal -->
	<div class="modal fade" id="detailModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="codeno"></h2>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class='col-md-4 mt-2 animated animatedFadeInUp fadeInUp'>
							<!-- {{ asset('backendtemplate/itemimg/1596261821.jpeg')}} -->
							<p><img src="" class='img-fluid itemImg'></p>
						</div>

						<div class='col-md-8  pt-5 mt-4 animated in-right'>
							<table class="table table bordered">
								<tbody class="tablebody">
									<!-- <tr><td>Product Name:<td>{{$item->name}}</td></tr>
									<tr><td>Product Code:<td>{{$item->codeno}}</td></tr>
									<tr><td>Product Price:<td>{{$item->price}} MMK</td></tr>
									<tr><td>Description:<td>{{$item->description}}</td></tr> -->
								</tbody>
							</table>
							<!-- <p class='text-center'><a class='btn btn-primary px-2 add_to_cart hvr-icon-buzz-out' href='#' role='button' data-id='$id' data-name='$product_name' data-price='$product_price' data-photo='$product_photo'>Add to Cart  <i class='fa fa-shopping-cart hvr-icon' aria-hidden='true'></i></a></p> -->
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" data-dismiss="modal">Close</button>
					</button>
				</div>
			</div>	
		</div>
	</div>



@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.detailBtn').click(function(){
				let photo = $(this).data('photo');
				let name = $(this).data('name');
				let codeno = $(this).data('codeno');
				let price = $(this).data('price');
				let description = $(this).data('description');

				$('.itemImg').attr('src',photo);
				$('.codeno').html(name);
				let html = `
							<tr><td>Product Name:<td>${name}</td></tr>
							<tr><td>Product Code:<td>${codeno}</td></tr>
							<tr><td>Product Price:<td>${price} MMK</td></tr>
							<tr><td>Description:<td>${description}</td></tr>
				`;
				$('.tablebody').html(html);
				$('#detailModal').modal('show');
			})
		})
	</script>
@endsection