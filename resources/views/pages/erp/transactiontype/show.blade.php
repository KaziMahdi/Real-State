@extends('layout.erp.app')
@section('title', 'Show Transaction Type')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Transaction Types</a></li>
                    <li><a class="btn btn-light" href="{{ route('transaction-types.create') }}">Details Transaction Types</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('transaction-types.index') }}" class="btn btn-info">Manage Transaction Types</a>
            </div>
        </div>
        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $transactiontype->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $transactiontype->name }}</td>
                </tr>
                <tr>
                    <th>Descriptions</th>
                    <td>{{ $transactiontype->descriptions }}</td>
                </tr>


            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
