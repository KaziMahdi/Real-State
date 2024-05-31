@extends('layout.erp.app')
@section('title', 'Create Role')
@section('style')
    <style>
        main {
            padding: 20px;
        }

        .breadcrumbs {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .breadcrumbs li {
            display: inline-block;
            margin-right: 5px;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .save-button {
            margin-top: 20px;
        }

        #check-all {
            margin-right: 10px;
        }
    </style>
@endsection
@section('page')

<main>
    <div style="justify-content: space-between; display:flex; padding:4px">
        <div>
            <ul class="breadcrumbs">
                <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                <li><a class="btn btn-light" href="#">Roles</a></li>
                <li><a class="btn btn-light" href="{{ route('roles.create') }}" >Create Role</a></li>
            </ul>
        </div>
        <div>
            <a href="{{ route('roles.index') }}" class="btn btn-info">Manage Role</a>
        </div>
    </div>
    <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Role Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter role name">
            </div>
        </div>

        <div class="form-group row" id="permissions">
            <label class="col-sm-2 col-form-label">Permissions:</label>
            <div class="col-sm-10">
                <div class="custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkAll">
                    <label class="custom-control-label" for="checkAll" id="check-all">Check All</label>
                </div>
                @foreach($permissions as $permission)
                    <div class="custom-checkbox">
                        <input type="checkbox" class="custom-control-input permission-checkbox" id="permission{{ $permission->id }}" value="{{ $permission->id }}" name="permissions[]">
                        <label class="custom-control-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group row save-button">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</main>
@endsection
@section('script')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Check All functionality
        var checkAll = document.getElementById('checkAll');
        var permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

        if (checkAll) {
            checkAll.addEventListener('click', function () {
                permissionCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = checkAll.checked;
                });
            });
        }
    });
</script>
@endsection
