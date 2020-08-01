@extends('backendtemplate')

@section('title','Brands')

@section('content')


	<div class="container">
		<h2 class="pb-4">Brand Create Form</h2>

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
		<form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
			@csrf
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
			
			
			
			<div class="form-group row">
				<div class="col-sm-5">
					<input type="submit" class="btn btn-primary" name="btnsubmit" value="Create">
				</div>
			</div>
		</form>
	</div>

@endsection