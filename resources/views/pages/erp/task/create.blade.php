@extends('layout.erp.app')
@section('title', 'Create Task')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Task</a></li>
                    <li><a class="btn btn-light" href="{{ route('tasks.create') }}">Create Task</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('tasks.index') }}" class="btn btn-info">Manage Task</a>
            </div>
        </div>
        <form action="{{ route('tasks.store') }}" method ="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="project_id" class="col-sm-2 col-form-label">Project</label>
                <div class="col-sm-10">
                    <select class="form-control" name="project_id" id="project_id">
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="locations" class="col-sm-2 col-form-label">Locations</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="locations" id="locations" placeholder="Locations"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="status" id="status" placeholder="Status"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="user_id" class="col-sm-2 col-form-label">Task Assignee</label>
                <div class="col-sm-10">
                    <select class="form-control" name="user_id" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="start_time" class="col-sm-2 col-form-label">Start Time</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="start_time" id="start_time" placeholder="Start Time">
                </div>
            </div>
            <div class="row mb-3">
                <label for="end_time" class="col-sm-2 col-form-label">End Time</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="end_time" id="end_time" placeholder="End Time">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
