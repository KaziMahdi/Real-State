@extends('layout.erp.app')
@section('title', 'Show Stock')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Stocks</a></li>
                    <li><a class="btn btn-light" href="{{ route('stocks.create') }}">Details Stocks</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('stocks.index') }}" class="btn btn-info">Manage Stocks</a>
            </div>
        </div>
        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $stock->id }}</td>
                </tr>
                <tr>
                    <th>Product Id</th>
                    <td>{{ $stock->product_id }}</td>
                </tr>
                <tr>
                    <th>Qty</th>
                    <td>{{ $stock->qty }}</td>
                </tr>
                <tr>
                    <th>Transaction Type Id</th>
                    <td>{{ $stock->transaction_type_id }}</td>
                </tr>
                <tr>
                    <th>Remark</th>
                    <td>{{ $stock->remark }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $stock->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $stock->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
