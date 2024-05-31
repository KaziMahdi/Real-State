@extends('layout.erp.app')
@section('title', 'Manage Category')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Categories</a></li>


                    <li><a class="btn btn-light" href="{{ route('categories.index') }}">Manage Category</a></li>

                </ul>
            </div>
            <div>


                <a href="{{ route('categories.create') }}" class="btn btn-info">New Category</a>

            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Department</th>


                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorys as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->department_id }}</td>


                        <td>
                            <form action = "{{ route('categories.destroy', $category->id) }}" method = "post">
                                <a class= 'btn btn-primary' href = "{{ route('categories.show', $category->id) }}">View</a>
                                <a class= 'btn btn-success' href = "{{ route('categories.edit', $category->id) }}"> Edit </a>
                                @method('DELETE')
                                @csrf
                                <input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
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
