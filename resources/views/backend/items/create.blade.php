@extends('backendtemplate')

@section('title','Items')

@section('content')


	<div class="container">
		<h2 class="pb-4">Item Create Form</h2>

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
		<form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group row {{ $errors->has('codeno') ? 'has-error' : '' }}">
				<label for="inputCodeno" class="col-sm-2 col-form-label">Code No</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputCodeno" name="codeno">
					<span class="text-danger">{{ $errors->first('codeno') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="name">
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('photo') ? 'has-error' : '' }}">
				<label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
				<div class="col-sm-5">
					<input type="file" id="inputPhoto" name="photo" class="d-block">
					<span class="text-danger">{{ $errors->first('photo') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('price') ? 'has-error' : '' }}">
				<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="inputPrice" name="price">
					<span class="text-danger">{{ $errors->first('price') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('discount') ? 'has-error' : '' }}">
				<label for="inputDiscount" class="col-sm-2 col-form-label">Discount</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="inputDiscount" name="discount" value="0">
					<span class="text-danger">{{ $errors->first('discount') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
				<label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-5">
					<textarea id="inputDescription" class="form-control" name="description"></textarea>
					<span class="text-danger">{{ $errors->first('description') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('brand') ? 'has-error' : '' }}">
				<label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
				<div class="col-sm-5">
					<select class="form-control form-control-md" id="inputBrand" name="brand">
						<optgroup label="Choose Brand">
							@foreach($brands as $brand)
								<option value="{{$brand->id}}">{{$brand->name}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('brand') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('subcategory') ? 'has-error' : '' }}">
				<label for="inputSubcategory" class="col-sm-2 col-form-label">Subcategory</label>
				<div class="col-sm-5">
					<select class="form-control form-control-md" id="inputSubcategory" name="subcategory">
						<optgroup label="Choose Subcategory">
							@foreach($subcategories as $subcategory)
								<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('subcategory') }}</span>
				</div>
			</div>
			
			
			<div class="form-group row">
				<div class="col-sm-5">
					<input type="submit" class="btn btn-primary" name="btnsubmit" value="Create">
				</div>
			</div>
		</form>
	</div>

@endsection