<?php

?>
@extends('layout.erp.app')
@section('title','Manage Supplier')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Suppliers</a></li>
			

				<li><a class="btn btn-light" href="{{ route('suppliers.index') }}">Manage Suppliers</a></li>
				
			</ul>
		</div>
		<div>
			
			<a href="{{ route('suppliers.create') }}" class="btn btn-info">New Supplier</a>
			
		</div>
	</div>

	<table class="table table-hover text-nowrap">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Company Name</th>
				<th>Address</th>
				

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($suppliers as $supplier)
			<tr>
				<td>{{$supplier->id}}</td>
				<td>{{$supplier->name}}</td>
				<td>{{$supplier->phone}}</td>
				<td>{{$supplier->email}}</td>
				<td>{{$supplier->company_name}}</td>
				<td>{{$supplier->address}}</td>
				

				<td>
					<form action="{{route('suppliers.destroy',$supplier->id)}}" method="post">
						<a class='btn btn-primary' href="{{route('suppliers.show',$supplier->id)}}">View</a>
						<a class='btn btn-success' href="{{route('suppliers.edit',$supplier->id)}}"> Edit </a>
						@method('DELETE')
						@csrf
						<input type="submit" class="btn btn-danger" name="delete" value="Delete" />
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</main>
@endsection
@section('script')


@endsection