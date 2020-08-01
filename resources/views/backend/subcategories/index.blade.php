@extends('backendtemplate')

@section('title','Subcategories')

@section('content')

	<div class="container-fluid">
		<h2 class="d-inline-block">Subcategory List</h2>
		<a href="{{route('subcategories.create')}}" class="btn btn-primary float-right btn-sm">Add New</a>
		<table class="table table-border">
			<thead>
				<tr>
					<th>No</th>
					<th>Category Name</th>
					<th>Name</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($subcategories as $subcategory)
				<tr>
					<td>{{$subcategory->id}}</td>
					@foreach($categories as $category)
						@if ($subcategory->category_id == $category->id)
							<td>{{$category->name}}</td>
						@endif 
					@endforeach
					
					<td>{{$subcategory->name}}</td>
					<td>
						<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning"><i class='fas fa-edit'></i></a>
						<form method="post" action="{{route('subcategories.destroy',$subcategory->id)}}" class="d-inline-block deleteform">
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