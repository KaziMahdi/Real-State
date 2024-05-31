@extends('layout.erp.app')
@section('title', 'Show Uom')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>
                    <li><a class="btn btn-light" href="{{ route('uoms.create') }}">Show UOM</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('uoms.index') }}" class="btn btn-info">Manage UOM</a>
            </div>
        </div>
        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $uom->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $uom->name }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $uom->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $uom->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
