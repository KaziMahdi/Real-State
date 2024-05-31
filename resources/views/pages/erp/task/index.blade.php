@extends('layout.erp.app')
@section('title', 'Manage Task')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Task</a></li>

                    <li><a class="btn btn-light" href="{{ route('tasks.index') }}">Manage Tasks</a></li>

                </ul>
            </div>
            <div>

                <a href="{{ route('tasks.create') }}" class="btn btn-info">Create Task</a>

            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Project</th>
                    <th>Locations</th>
                    <th>Task Assignee</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->project_id }}</td>
                        <td>{{ $task->locations }}</td>
                        <td>{{ $task->user_id }}</td>
                        <td>{{ $task->start_time }}</td>
                        <td>{{ $task->end_time }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <form action = "{{ route('tasks.destroy', $task->id) }}" method = "post">
                                <a class= 'btn btn-primary' href = "{{ route('tasks.show', $task->id) }}">View</a>
                                <a class= 'btn btn-success' href = "{{ route('tasks.edit', $task->id) }}"> Edit </a>
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
