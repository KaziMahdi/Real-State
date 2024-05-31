@extends('layout.erp.app')
@section('title', 'Manage User')
@section('style')


@endsection
@section('page')
<?php

$sessions = session()->all();

$user_id = session('sess_user_id');
$user_role_id = session('sess_user_role_id');

//echo($user_role_id);
// print_r($sessions);

?>
<main style="padding: 4px">
    <div style="justify-content:space-between; display:flex; padding:1px">
        <div>

            <ul class="breadcrumbs">
                <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                <li><a class="btn btn-light" href="#">Users</a></li>
                @if(in_array($user_role_id, [1, 2, 3])) <!-- Check if user role is Super-Admin, Admin, or User -->
                    <li><a class="btn btn-light" href="{{ route('users.index') }}">Manage Users</a></li>
                @endif
            </ul>
        </div>

        <div>
            @if(in_array($user_role_id, [1, 2])) <!-- Check if user role is Super-Admin or Admin -->
                <a href="{{ route('users.create') }}" class="btn btn-info">New User</a>
            @endif
        </div>
    </div>


    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role </th>
                <th>Department</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->role_id }}</td>
                    <td>{{ $user->department_id }}</td>
                    <td><img src="{{ asset('img/'.$user->photo) }}" style="border-radius: 50%" width="40px" height="40px" /></td>
                    <td>
                        <a class='btn btn-primary btn-{{ $user->status ? 'success' : 'danger' }}' href="{{ route('users.toggle-status', $user->id) }}">
                            {{ $user->status ? 'Enable' : 'Disable' }}
                        </a>
                    </td>
                    
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
							@if(in_array($user_role_id, [1, 2, 3])) <!-- Check if user role is Super-Admin, Admin, or User -->
                            	<a class='btn btn-primary' href="{{ route('users.show', $user->id) }}">View</a>
							@endif
                            @if(in_array($user_role_id, [1, 2])) <!-- Check if user role is Super-Admin or Admin -->
                                <a class='btn btn-success' href="{{ route('users.edit', $user->id) }}"> Edit </a>
                            @endif
							@if($user_role_id == 1) <!-- Check if user role is Super-Admin -->
								@method('DELETE')
								@csrf
								
								<input type="submit" class="btn btn-danger" name="delete" value="Delete" />
							@endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Display pagination links -->
    <div>{{ $users->links() }}</div>

</main>
@endsection
@section('script')


@endsection
