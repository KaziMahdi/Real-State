@extends('layout.erp.app')
@section('title', 'Show Role')
@section('style')
@endsection
@section('page')
<main>
    <div style="justify-content:space-between; display:flex; padding:4px">
        <div>
            <ul class="breadcrumbs">
                <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home  </a></li>
                <li><a class="btn btn-light" href="#">Roles</a></li>
                <li><a class="btn btn-light" href="#" >Details Role</a></li>
            </ul>
        </div>
        <div>
            <a href="{{ route('roles.index') }}" class="btn btn-info">Manage Role</a>
        </div>
    </div>
    <table class='table table-striped text-nowrap'>
        <tbody>
            <tr><th>Id</th><td>{{ $role->id }}</td></tr>
            <tr><th>Name</th><td>{{ $role->name }}</td></tr>
            
            
            <tr>
                <th>Permissions</th>
                <td>
                    @forelse($role->permissions as $permission)
                        {{ $permission->name }}
                        @if(!$loop->last)
                            ,
                        @endif
                        @empty
                            No permissions assigned.
                    @endforelse
                </td>
            </tr>
			<tr><th>Created At</th><td>{{ $role->created_at }}</td></tr>
            <tr><th>Updated At</th><td>{{ $role->updated_at }}</td></tr>
        </tbody>
    </table>
</main>
@endsection
@section('script')
@endsection
