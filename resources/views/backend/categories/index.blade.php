@extends('backendtemplate')

@section('title','Categories')

@section('content')

	<div class="container-fluid">
		<h2 class="d-inline-block">Categories List</h2>
		<a href="{{route('items.create')}}" class="btn btn-primary float-right btn-sm">Add New</a>
		<table class="table table-border">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Photo</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td><img src="{{$category->photo}}" width="100"></td>
					<td>
						<a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning"><i class='fas fa-edit'></i></a>
						<form method="post" action="{{route('categories.destroy',$category->id)}}" class="d-inline-block deleteform">
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