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
						<a href="">
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

@endsection