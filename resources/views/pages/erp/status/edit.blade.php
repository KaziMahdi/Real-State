<?php

?>
@extends('layout.erp.app')
@section('title','Edit Status')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Status</a></li>
				<li><a class="btn btn-light" href="{{ route('status.create') }}">Edit Status</a></li>
			</ul>
		</div>
		<div>
			<a href="{{ route('status.index') }}" class="btn btn-info">Manage Status</a>
		</div>
	</div>
	<form action="{{route('status.update',$status)}}" method="post" enctype="multipart/form-data">
		@csrf
		@method("PUT")
		<div class="row mb-3">
			<label for="name" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name" value="{{$status->name}}" id="name" placeholder="Name">
			</div>
		</div>
		<div class="row mb-3">
			<label for="descriptions" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="descriptions" value="{{$status->descriptions}}" id="descriptions" placeholder="descriptions">
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Save Change</button>
	</form>
</main>
@endsection
@section('script')


@endsection