@extends('backendtemplate')

@section('title','Subcategories')

@section('content')


	<div class="container">
		<h2 class="pb-4">Subcategory Edit Form</h2>

		{{-- Must show related input errors --}}

		<!-- @if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif -->
		<form action="{{route('subcategories.update',$subcategory->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group row {{ $errors->has('category') ? 'has-error' : '' }}">
				<label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
				<div class="col-sm-5">
					<select class="form-control form-control-md" id="inputCategory" name="category">
						<optgroup label="Choose Category">
							@foreach($categories as $category)
								<option value="{{$category->id}}" @if($subcategory->category_id == $category->id){{'selected'}} @endif>{{$category->name}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('category') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="name" value="{{$subcategory->name}}">
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-sm-5">
					<input type="submit" class="btn btn-primary" name="btnsubmit" value="Update">
				</div>
			</div>
		</form>
	</div>

@endsection