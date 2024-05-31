@extends('layout.erp.app')
@section('title', 'Show Department')
@section('style')


@endsection
@section('page')

    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Department</a></li>
                    <li><a class="btn btn-light" href="{{ route('departments.create') }}">Details Department</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('departments.index') }}" class="btn btn-info">Manage Department</a>
            </div>
        </div>
        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $department->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $department->name }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $department->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $department->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
