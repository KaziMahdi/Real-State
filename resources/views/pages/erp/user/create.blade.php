
@extends('layout.erp.app')
@section('title','Create User')
@section('style')


@endsection
@section('page')
<?php

$sessions=session()->all();
$user_id = session('sess_user_id'); 
$user_role_id = session('sess_user_role_id'); 
?>
<main>	
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>			
			<ul class="breadcrumbs">
			<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home  </a></li> 			
			<li><a class="btn btn-light" href="#">Users</a></li>			
			<li><a class="btn btn-light" href="{{route('users.create')}}" >Create Users</a></li>
			</ul>
		</div>
		<div>	
			<a href="{{route('users.index')}}" class="btn btn-info">Manage User</a>
		</div>
	</div>
<form action="{{route('users.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Full Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
	</div>
</div>
<div class="row mb-3">
	<label for="username" class="col-sm-2 col-form-label">User Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="username" id="username" placeholder="User Name" value="{{ old('username') }}">
		@error('username') <!-- Display error message for username -->
		<span class="text-danger">{{ $message }}</span>
		@enderror
	</div>
</div>
<div class="row mb-3">
	<label for="email" class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
		@error('email') <!-- Display error message for email -->
                <span class="text-danger">{{ $message }}</span>
        @enderror
	</div>
</div>
<div class="row mb-3">
	<label for="phone" class="col-sm-2 col-form-label">Phone</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') }}">
	</div>
</div>
<div class="row mb-3">
	<label for="address" class="col-sm-2 col-form-label">Address</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="address" id="address" placeholder="Address" value="{{ old('address') }}">
	</div>
</div>
<div class="row mb-3">
	<label for="status" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<input type = "number" class="form-control" name="status" id="status" placeholder="Status" value="{{ old('status') }}">
	</div>
</div>
<div class="row mb-3">
	<label for="password" class="col-sm-2 col-form-label">Password</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="password" id="password" placeholder="Password">
		@error('password') <!-- Display error message for psssword -->
                <span class="text-danger">{{ $message }}</span>
        @enderror
	</div>
</div>
<div class="row mb-3">
	<label for="role_id" class="col-sm-2 col-form-label">Role</label>
	<div class="col-sm-10">
		<select class="form-control" name="role_id" id="role_id">
			@foreach($roles as $role)
				<option value="{{$role->id}}">{{$role->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="department_id" class="col-sm-2 col-form-label">Department</label>
	<div class="col-sm-10">
		<select class="form-control" name="department_id" id="department_id">
			@foreach($departments as $department)
				<option value="{{$department->id}}">{{$department->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo" id="photo" placeholder="Photo">
	</div>
</div>
<button type="submit" class="btn btn-primary">Save</button>
</form>
</main>
@endsection
@section('script')


@endsection
