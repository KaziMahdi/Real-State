@extends('layout.erp.app')
@section('title', 'Manage Project')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Project</a></li>

                    <li><a class="btn btn-light" href="{{ route('projects.index') }}">Manage Projects</a></li>

                </ul>
            </div>
            <div>

                <a href="{{ route('projects.create') }}" class="btn btn-info">Create Project</a>

            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Locations</th>
                    <th>Photo</th>
                   

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->department_id }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->locations }}</td>
                        <td><img src="{{ asset('img/' . $project->photo) }}" width="100" /></td>
                       

                        <td>
                            <form action = "{{ route('projects.destroy', $project->id) }}" method = "post">
                                <a class= 'btn btn-primary' href = "{{ route('projects.show', $project->id) }}">View</a>
                                <a class= 'btn btn-success' href = "{{ route('projects.edit', $project->id) }}"> Edit </a>
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
