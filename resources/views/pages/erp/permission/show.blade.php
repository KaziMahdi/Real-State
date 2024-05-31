@extends('layout.erp.app')
@section('title', 'Show Permission')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>
                    <li><a class="btn btn-light" href="{{ route('permissions.create') }}">Create Permissions</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('permissions.index') }}" class="btn btn-info">Manage Permissions</a>
            </div>
        </div>

        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $permission->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $permission->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $permission->description }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $permission->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $permission->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
