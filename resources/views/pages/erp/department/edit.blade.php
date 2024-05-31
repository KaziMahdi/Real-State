@extends('layout.erp.app')
@section('title', 'Edit Department')
@section('style')


@endsection
@section('page')

    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Department</a></li>
                    <li><a class="btn btn-light" href="{{ route('departments.create') }}">Edit Department</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('departments.index') }}" class="btn btn-info">Manage Department</a>
            </div>
        </div>
        <form action="{{ route('departments.update', $department) }}" method ="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="name" value="{{ $department->name }}" id="name"
                        placeholder="Name">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
