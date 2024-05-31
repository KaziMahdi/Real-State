@extends('layout.erp.app')
@section('title', 'Show Category')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Categories</a></li>
                    <li><a class="btn btn-light" href="{{ route('categories.create') }}">Details Categories</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('categories.index') }}" class="btn btn-info">Manage Categories</a>
            </div>
        </div>
       
        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>Department </th>
                    <td>{{ $category->department_id }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $category->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $category->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
