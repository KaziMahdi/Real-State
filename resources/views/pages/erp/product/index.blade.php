
@extends('layout.erp.app')
@section('title', 'Manage Product')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>

                    <li><a class="btn btn-light" href="{{ route('products.index') }}">Manage Products</a></li>

                </ul>
            </div>
            <div>

                <a href="{{ route('products.create') }}" class="btn btn-info">Create Products</a>

            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Offer Price</th>
                    <th>Supplier</th>
                    <th>Regular Price</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Category</th>
                    
                    
                   
                    
                    <th>Weight</th>
                    <th>UOM</th>
                   

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->offer_price }}</td>
                        <td>{{ $product->supplier_id }}</td>
                        <td>{{ $product->regular_price }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img src="{{ asset('img/products/' . $product->photo) }}" width="100" /></td>
                        <td>{{ $product->category_id }}</td>
                        
                        
                        <td>{{ $product->weight }}</td>
                        <td>{{ $product->uom_id }}</td>
                        
                        

                        <td>
                            <form action = "{{ route('products.destroy', $product->id) }}" method = "post">
                                <a class= 'btn btn-primary' href = "{{ route('products.show', $product->id) }}">View</a>
                                <a class= 'btn btn-success' href = "{{ route('products.edit', $product->id) }}"> Edit </a>
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
