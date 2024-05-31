@extends('layout.erp.app')
@section('title', 'Show Task')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Tasks</a></li>
                    <li><a class="btn btn-light" href="{{ route('tasks.create') }}">Details Task</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('tasks.index') }}" class="btn btn-info">Manage Tasks</a>
            </div>
        </div>
        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $task->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $task->name }}</td>
                </tr>
                <tr>
                    <th>Project</th>
                    <td>{{ $task->project_id }}</td>
                </tr>
                <tr>
                    <th>Locations</th>
                    <td>{{ $task->locations }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $task->status }}</td>
                </tr>
                <tr>
                    <th>Task Assignee</th>
                    <td>{{ $task->user_id }}</td>
                </tr>
                <tr>
                    <th>Start Time</th>
                    <td>{{ $task->start_time }}</td>
                </tr>
                <tr>
                    <th>End Time</th>
                    <td>{{ $task->end_time }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $task->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $task->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
