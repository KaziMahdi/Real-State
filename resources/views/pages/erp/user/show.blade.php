@extends('layout.erp.app')
@section('title', 'Show User')
@section('style')

@endsection
@section('page')
<?php

$sessions=session()->all();

$user_id = session('sess_user_id'); 
$user_role_id = session('sess_user_role_id'); 

//echo($user_role_id);
// print_r($sessions);

?>
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>
                    <li><a class="btn btn-light" href="{{ route('users.show', session('sess_user_id')) }}">Details Users</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('users.index') }}" class="btn btn-info">Manage User</a>
            </div>
        </div>
        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>User Name</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $user->status }}</td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td> <a href="{{ route('forget.password.get') }}" class="btn btn-primary"> Reset Password</a></td>
                </tr>
                <tr>
                    <th>Role </th>
                    <td>{{ $user->role->name}}</td>
                </tr>
                <tr>
                    <th>Department </th>
                    <td>{{ $user->department->name }}</td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><img src="{{ asset('img/' . $user->photo) }}" width="100" /></td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
