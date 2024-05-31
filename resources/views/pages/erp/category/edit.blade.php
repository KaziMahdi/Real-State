
@extends('layout.erp.app')
@section('title','Edit Category')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Categories</a></li>
				<li><a class="btn btn-light" href="{{ route('categories.create') }}">Edit Categories</a></li>
			</ul>
		</div>
		<div>
			<a href="{{ route('categories.index') }}" class="btn btn-info">Manage Categories</a>
		</div>
	</div>

<form action="{{route('categories.update',$category)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$category->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="department_id" class="col-sm-2 col-form-label">Department</label>
	<div class="col-sm-10">
		<select class="form-control" name="department_id" id="department_id">
			@foreach($departments as $department)
				@if($department->id==$category->department_id)
					<option value="{{$department->id}}" selected>{{$department->name}}</option>
				@else
					<option value="{{$department->id}}">{{$department->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
