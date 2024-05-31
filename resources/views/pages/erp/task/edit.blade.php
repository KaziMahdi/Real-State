@extends('layout.erp.app')
@section('title', 'Edit Task')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Tasks</a></li>
                    <li><a class="btn btn-light" href="{{ route('tasks.create') }}">Edit Task</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('tasks.index') }}" class="btn btn-info">Manage Tasks</a>
            </div>
        </div>
        <form action="{{ route('tasks.update', $task) }}" method ="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="name" value="{{ $task->name }}" id="name"
                        placeholder="Name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="project_id" class="col-sm-2 col-form-label">Project</label>
                <div class="col-sm-10">
                    <select class="form-control" name="project_id" id="project_id">
                        @foreach ($projects as $project)
                            @if ($project->id == $task->project_id)
                                <option value="{{ $project->id }}" selected>{{ $project->name }}</option>
                            @else
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="locations" class="col-sm-2 col-form-label">Locations</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="locations" value="{{ $task->locations }}"
                        id="locations" placeholder="Locations">
                </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="status" value="{{ $task->status }}" id="status"
                        placeholder="Status">
                </div>
            </div>
            <div class="row mb-3">
                <label for="user_id" class="col-sm-2 col-form-label">Task Assignee</label>
                <div class="col-sm-10">
                    <select class="form-control" name="user_id" id="user_id">
                        @foreach ($users as $user)
                            @if ($user->id == $task->user_id)
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="start_time" class="col-sm-2 col-form-label">Start Time</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="start_time" value="{{ $task->start_time }}"
                        id="start_time" placeholder="Start Time">
                </div>
            </div>
            <div class="row mb-3">
                <label for="end_time" class="col-sm-2 col-form-label">End Time</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="end_time" value="{{ $task->end_time }}" id="end_time"
                        placeholder="End Time">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
