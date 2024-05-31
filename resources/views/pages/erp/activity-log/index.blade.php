@extends('layout.erp.app')
@section('title', 'Manage Activity Log')
@section('style')

@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Activity Log</a></li>
                    <li><a class="btn btn-light" href="{{ route('users.index') }}">Activity Log</a></li>
                </ul>
            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Activity Type</th>
                    <th>IP Address</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activitylogs as $activitylog)
                    <tr>
                        <td>{{ $activitylog->id }}</td>
                        <td>{{ $activitylog->user_id }}</td>
                        <td>{{ $activitylog->activity_type }}</td>
                        <td>{{ $activitylog->ip_address }}</td>
                        <td>{{ $activitylog->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>

        </table>
        <div class="card-footer">
            <nav>
                <ul class="pagination mb-0 d-flex justify-content-between align-items-center">
                    <ul class="pagination mb-0">
                        {{ $activitylogs->withQueryString()->links() }}
                    </ul>
                    <ul class="pagination mb-0">
                                        <span style="font-weight: bold" class="text-end">Total:
                                            {{ $activitylogs->total() }}</span>
                    </ul>

                </ul>
            </nav>
        </div>


    </main>
@endsection
@section('script')

@endsection
