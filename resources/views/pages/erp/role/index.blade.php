@extends('layout.erp.app')
@section('title', 'Manage Role')
@section('style')
    <style>
        main {
            padding: 20px;
        }

        .breadcrumbs {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .breadcrumbs li {
            display: inline-block;
            margin-right: 5px;
        }

        .permissions-container {
            display: flex;
            flex-wrap: wrap;
        }

        .permissions-container span {
            margin-right: 10px;
            margin-bottom: 5px;
            display: inline-block;
            padding: 5px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }
    </style>
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
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home  </a></li>
                    <li><a class="btn btn-light" href="#">Roles</a></li>
                    @if(in_array($user_role_id, [1, 2])) <!-- Check if user role is Super-Admin, Admin, or User -->

                        <li><a class="btn btn-light" href="{{ route('roles.index') }}" >Manage Role</a></li>
                    @endif
                </ul>
            </div>
            <div>
                @if(in_array($user_role_id, [1, 2])) <!-- Check if user role is Super-Admin or Admin -->
                    <a href="{{ route('roles.create') }}" class="btn btn-info">Create Role</a>
                @endif
            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td class="permissions-container">
                            @foreach($role->permissions as $permission)
                                <span>{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                @if(in_array($user_role_id, [1, 2])) <!-- Check if user role is Super-Admin, Admin, or User -->

                                    <a class='btn btn-primary' href="{{ route('roles.show', $role->id) }}">View</a>
                                @endif
                                @if(in_array($user_role_id, [1, 2])) <!-- Check if user role is Super-Admin or Admin -->
                                    <a class='btn btn-success' href="{{ route('roles.edit', $role->id) }}"> Edit </a>
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
    </main>
@endsection

@section('script')

@endsection
