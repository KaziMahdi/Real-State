<?php

?>
@extends('layout.erp.app')
@section('title','Show Supplier')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Suppliers</a></li>
				<li><a class="btn btn-light" href="{{ route('suppliers.create') }}">Details Suppliers</a></li>
			</ul>
		</div>
		<div>
			<a href="{{ route('suppliers.index') }}" class="btn btn-info">Manage Suppliers</a>
		</div>
	</div>

	<table class='table table-striped text-nowrap'>
		<tbody>
			<tr>
				<th>Id</th>
				<td>{{$supplier->id}}</td>
			</tr>
			<tr>
				<th>Name</th>
				<td>{{$supplier->name}}</td>
			</tr>
			<tr>
				<th>Phone</th>
				<td>{{$supplier->phone}}</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>{{$supplier->email}}</td>
			</tr>
			<tr>
				<th>Company Name</th>
				<td>{{$supplier->company_name}}</td>
			</tr>
			<tr>
				<th>Address</th>
				<td>{{$supplier->address}}</td>
			</tr>
			<tr>
				<th>Created At</th>
				<td>{{$supplier->created_at}}</td>
			</tr>
			<tr>
				<th>Updated At</th>
				<td>{{$supplier->updated_at}}</td>
			</tr>

		</tbody>
	</table>
</main>
@endsection
@section('script')


@endsection