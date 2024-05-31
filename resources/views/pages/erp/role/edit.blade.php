@extends('layout.erp.app')
@section('title', 'Edit Role')
@section('style')


@endsection
@section('page')


<main>    
    <div style="justify-content:space-between; display:flex; padding:4px">
        <div>            
            <ul class="breadcrumbs">
                <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home  </a></li>             
                <li><a class="btn btn-light" href="#">Roles</a></li>            
                <li><a class="btn btn-light" href="#" >Edit Role</a></li>
            </ul>
        </div>
        <div>    
            <a href="{{ route('roles.index') }}" class="btn btn-info">Manage Role</a>
        </div>
    </div>
    <form action="{{ route('roles.update', $role) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $role->name }}" id="name" placeholder="Name">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Permissions</label>
            <div class="col-sm-10" id="permissions">
                @foreach($permissions as $permission)
                    <div class="custom-checkbox">
                        <input type="checkbox" class="custom-control-input permission-checkbox" id="permission{{ $permission->id }}" value="{{ $permission->id }}" name="permissions[]" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Change</button>
    </form>
</main>
@endsection
@section('script')


@endsection
