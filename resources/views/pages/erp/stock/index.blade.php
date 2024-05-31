@extends('layout.erp.app')
@section('title', 'Manage Stock')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Status</a></li>
                    <li><a class="btn btn-light" href="{{ route('stocks.index') }}">Manage Stocks</a></li>
                </ul>
            </div>
            <div>
                <a href="{{route('stockadjustments.index')}}" class="btn btn-info">Stock Adjustment</a>
            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Uom</th>
                    <th>Transaction Type</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($stocks as $stock)
                    <tr>
                        <td>{{ $stock->id }}</td>
                        <td>{{ $stock->product->name }}</td>
                        <td>{{ $stock->qty }}</td>
                        <td>{{ $stock->uom->name }}</td>
                        <td>{{ $stock->transaction_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer">
            <nav>
                <ul class="pagination mb-0 d-flex justify-content-between align-items-center">
                    <ul class="pagination mb-0">
                        {{ $stocks->withQueryString()->links() }}
                    </ul>
                    <ul class="pagination mb-0">
                                        <span style="font-weight: bold" class="text-end">Total:
                                            {{ $stocks->total() }}</span>
                    </ul>

                </ul>
            </nav>
        </div>
    </main>
@endsection
@section('script')


@endsection
