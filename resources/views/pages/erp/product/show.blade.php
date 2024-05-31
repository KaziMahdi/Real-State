
@extends('layout.erp.app')
@section('title', 'Show Product')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>
                    <li><a class="btn btn-light" href="{{ route('products.create') }}">Create Products</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-info">Manage Products</a>
            </div>
        </div>

        <table class='table table-striped text-nowrap'>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Offer Price</th>
                    <td>{{ $product->offer_price }}</td>
                </tr>
                <tr>
                    <th>Supplier Id</th>
                    <td>{{ $product->supplier_id }}</td>
                </tr>
                <tr>
                    <th>Regular Price</th>
                    <td>{{ $product->regular_price }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $product->description }}</td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><img src="{{ asset('img/products/' . $product->photo) }}" width="100" /></td>
                </tr>
                <tr>
                    <th>Category Id</th>
                    <td>{{ $product->category_id }}</td>
                </tr>
                <tr>
                    <th>Uom Id</th>
                    <td>{{ $product->uom_id }}</td>
                </tr>
                <tr>
                    <th>Is Featured</th>
                    <td>{{ $product->is_featured }}</td>
                </tr>
                <tr>
                    <th>Star</th>
                    <td>{{ $product->star }}</td>
                </tr>
                <tr>
                    <th>Is Brand</th>
                    <td>{{ $product->is_brand }}</td>
                </tr>
                <tr>
                    <th>Offer Discount</th>
                    <td>{{ $product->offer_discount }}</td>
                </tr>
                <tr>
                    <th>Weight</th>
                    <td>{{ $product->weight }}</td>
                </tr>
                <tr>
                    <th>Barcode</th>
                    <td>{{ $product->barcode }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $product->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $product->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </main>
@endsection
@section('script')


@endsection
