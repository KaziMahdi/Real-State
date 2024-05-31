@extends('layout.erp.app')
@section('title', 'Manage Permission')
@section('style')


@endsection
@section('page')
<?php

$sessions = session()->all();

$user_id = session('sess_user_id');
$user_role_id = session('sess_user_role_id');
?>
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>
                    @if(in_array($user_role_id, [1, 2, 3])) <!-- Check if user role is Super-Admin, Admin, or User -->

                        <li><a class="btn btn-light" href="{{ route('permissions.index') }}">Manage Permissions</a></li>
                    @endif
                </ul>
            </div>
            <div>
                @if(in_array($user_role_id, [1, 2])) <!-- Check if user role is Super-Admin or Admin -->

                    <a href="{{ route('permissions.create') }}" class="btn btn-info">Create Permissions</a>
                @endif
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
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>


                        <td>
                            <form action = "{{ route('permissions.destroy', $permission->id) }}" method = "post">
                                @if(in_array($user_role_id, [1, 2])) <!-- Check if user role is Super-Admin, Admin -->
                                    <a class= 'btn btn-primary'
                                        href = "{{ route('permissions.show', $permission->id) }}">View</a>
                                    <a class= 'btn btn-success' href = "{{ route('permissions.edit', $permission->id) }}"> Edit
                                    </a>
                                @endif
                                @if($user_role_id == 1) <!-- Check if user role is Super-Admin -->
                                    @method('DELETE')
                                    @csrf
                                    <input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
                                @endif
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
