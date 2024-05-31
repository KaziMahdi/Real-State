@extends('layout.erp.app')
@section('title', 'Create Uom')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>
                    <li><a class="btn btn-light" href="{{ route('uoms.create') }}">Create UOM</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('uoms.index') }}" class="btn btn-info">Manage UOM</a>
            </div>
        </div>

        <form action="{{ route('uoms.store') }}" method ="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
