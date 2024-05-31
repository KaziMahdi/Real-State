@extends('layout.erp.app')
@section('title', 'Show Project')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Project</a></li>
                    <li><a class="btn btn-light" href="{{ route('projects.create') }}">Details Project</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('projects.index') }}" class="btn btn-info">Manage Projects</a>
            </div>
        </div>
        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $project->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $project->name }}</td>
                </tr>
                <tr>
                    <th>Department </th>
                    <td>{{ $project->department_id }}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>{{ $project->start_date }}</td>
                </tr>
                <tr>
                    <th>End Date</th>
                    <td>{{ $project->end_date }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $project->status }}</td>
                </tr>
                <tr>
                    <th>Locations</th>
                    <td>{{ $project->locations }}</td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><img src="{{ asset('img/' . $project->photo) }}" width="100" /></td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $project->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $project->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
