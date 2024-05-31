@extends('layout.erp.app')
@section('title', 'Edit Project')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Projects</a></li>
                    <li><a class="btn btn-light" href="{{ route('projects.create') }}">Edit Project</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('projects.index') }}" class="btn btn-info">Manage Projects</a>
            </div>
        </div>
        <form action="{{ route('projects.update', $project) }}" method ="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="name" value="{{ $project->name }}" id="name"
                        placeholder="Name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="department_id" class="col-sm-2 col-form-label">Department</label>
                <div class="col-sm-10">
                    <select class="form-control" name="department_id" id="department_id">
                        @foreach ($departments as $department)
                            @if ($department->id == $project->department_id)
                                <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                            @else
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="status" value="{{ $project->status }}" id="status"
                        placeholder="Status">
                </div>
            </div>
            <div class="row mb-3">
                <label for="locations" class="col-sm-2 col-form-label">Locations</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="locations" value="{{ $project->locations }}"
                        id="locations" placeholder="Locations">
                </div>
            </div>
            <div class="row mb-3">
                <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type = "file" class="form-control" name="photo" id="photo" placeholder="Photo">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
