<?php

?>
@extends('layout.erp.app')
@section('title','Manage Status')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Status</a></li>


				<li><a class="btn btn-light" href="{{ route('status.index') }}">Manage Status</a></li>

			</ul>
		</div>
		<div>


			<a href="{{ route('status.create') }}" class="btn btn-info">New Status</a>

		</div>
	</div>
	<table class="table table-hover text-nowrap">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
				

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($status as $st)
			<tr>
				<td>{{$st->id}}</td>
				<td>{{$st->name}}</td>
				<td>{{$st->descriptions}}</td>
				

				<td>
					<form action="{{route('status.destroy',$st->id)}}" method="post">
						<a class='btn btn-primary' href="{{route('status.show',$st->id)}}">View</a>
						<a class='btn btn-success' href="{{route('status.edit',$st->id)}}"> Edit </a>
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