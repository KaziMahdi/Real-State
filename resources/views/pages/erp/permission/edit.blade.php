
@extends('layout.erp.app')
@section('title', 'Edit Permission')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>
                    <li><a class="btn btn-light" href="{{ route('permissions.create') }}">Create Permission</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('permissions.index') }}" class="btn btn-info">Manage Permissions</a>
            </div>
        </div>

        <form action="{{ route('permissions.update', $permission) }}" method ="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="name" value="{{ $permission->name }}" id="name"
                        placeholder="Name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="description" value="{{ $permission->description }}"
                        id="description" placeholder="Description">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
