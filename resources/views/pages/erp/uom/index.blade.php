@extends('layout.erp.app')
@section('title', 'Manage Uom')
@section('style')


@endsection
@section('page')

    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Department</a></li>
                  
                        <li><a class="btn btn-light" href="{{ route('uoms.index') }}">Manage UOM</a></li>
                   
                </ul>
            </div>
            <div>
                

                    <a href="{{ route('uoms.create') }}" class="btn btn-info">New UOM</a>
                
            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($uoms as $uom)
                    <tr>
                        <td>{{ $uom->id }}</td>
                        <td>{{ $uom->name }}</td>
                        <td>{{ $uom->created_at }}</td>
                        <td>{{ $uom->updated_at }}</td>

                        <td>
                            <form action = "{{ route('uoms.destroy', $uom->id) }}" method = "post">
                                <a class= 'btn btn-primary' href = "{{ route('uoms.show', $uom->id) }}">View</a>
                                <a class= 'btn btn-success' href = "{{ route('uoms.edit', $uom->id) }}"> Edit </a>
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
