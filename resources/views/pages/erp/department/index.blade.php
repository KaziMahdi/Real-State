@extends('layout.erp.app')
@section('title', 'Manage Department')
@section('style')


@endsection
@section('page')
    <?php
    
    $sessions = session()->all();
    
    $user_id = session('sess_user_id');
    $user_role_id = session('sess_user_role_id');
    ?>
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Department</a></li>
                    @if (in_array($user_role_id, [1, 2]))
                        <!-- Check if user role is Super-Admin, Admin -->

                        <li><a class="btn btn-light" href="{{ route('departments.index') }}">Manage Department</a></li>
                    @endif
                </ul>
            </div>
            <div>
                @if (in_array($user_role_id, [1, 2]))
                    <!-- Check if user role is Super-Admin or Admin -->

                    <a href="{{ route('departments.create') }}" class="btn btn-info">New Department</a>
                @endif
            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>


                        <td>
                            <form action = "{{ route('departments.destroy', $department->id) }}" method = "post">
                                @if (in_array($user_role_id, [1, 2]))
                                    <!-- Check if user role is Super-Admin or Admin -->
                                    <a class= 'btn btn-primary'
                                        href = "{{ route('departments.show', $department->id) }}">View</a>
                                    <a class= 'btn btn-success' href = "{{ route('departments.edit', $department->id) }}">
                                        Edit </a>
                                @endif
                                @if ($user_role_id == 1)
                                    <!-- Check if user role is Super-Admin -->
                                    @method('DELETE')
                                    @csrf
                                    <input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
                                @endif
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
