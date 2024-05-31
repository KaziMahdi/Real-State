@extends('layout.erp.app')
@section('title', 'Manage Transaction Type')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Transaction Type</a></li>


                    <li><a class="btn btn-light" href="{{ route('transaction-types.index') }}">Manage Transaction Type</a>
                    </li>

                </ul>
            </div>
            <div>

                <a href="{{ route('transaction-types.create') }}" class="btn btn-info">Create Transaction Type</a>

            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Descriptions</th>


                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactiontypes as $transactiontype)
                    <tr>
                        <td>{{ $transactiontype->id }}</td>
                        <td>{{ $transactiontype->name }}</td>
                        <td>{{ $transactiontype->descriptions }}</td>


                        <td>
                            <form action = "{{ route('transaction-types.destroy', $transactiontype->id) }}" method = "post">
                                <a class= 'btn btn-primary'
                                    href = "{{ route('transaction-types.show', $transactiontype->id) }}">View</a>
                                <a class= 'btn btn-success'
                                    href = "{{ route('transaction-types.edit', $transactiontype->id) }}"> Edit </a>
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
