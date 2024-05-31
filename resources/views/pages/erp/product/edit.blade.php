
@extends('layout.erp.app')
@section('title', 'Edit Product')
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

        <form action="{{ route('products.update', $product) }}" method ="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="name" value="{{ $product->name }}" id="name"
                        placeholder="Name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="offer_price" class="col-sm-2 col-form-label">Offer Price</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="offer_price" value="{{ $product->offer_price }}"
                        id="offer_price" placeholder="Offer Price">
                </div>
            </div>
            <div class="row mb-3">
                <label for="supplier_id" class="col-sm-2 col-form-label">Supplier</label>
                <div class="col-sm-10">
                    <select class="form-control" name="supplier_id" id="supplier_id">
                        @foreach ($suppliers as $supplier)
                            @if ($supplier->id == $product->supplier_id)
                                <option value="{{ $supplier->id }}" selected>{{ $supplier->name }}</option>
                            @else
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="regular_price" class="col-sm-2 col-form-label">Regular Price</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="regular_price" value="{{ $product->regular_price }}"
                        id="regular_price" placeholder="Regular Price">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="description" value="{{ $product->description }}"
                        id="description" placeholder="Description">
                </div>
            </div>
            <div class="row mb-3">
                <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type = "file" class="form-control" name="photo" id="photo" placeholder="Photo">
                </div>
            </div>
            <div class="row mb-3">
                <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            @if ($category->id == $product->category_id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="uom_id" class="col-sm-2 col-form-label">Uom</label>
                <div class="col-sm-10">
                    <select class="form-control" name="uom_id" id="uom_id">
                        @foreach ($uom as $uom)
                            @if ($uom->id == $product->uom_id)
                                <option value="{{ $uom->id }}" selected>{{ $uom->name }}</option>
                            @else
                                <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="star" class="col-sm-2 col-form-label">Star</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="star" value="{{ $product->star }}" id="star"
                        placeholder="Star">
                </div>
            </div>
            <div class="row mb-3">
                <label for="offer_discount" class="col-sm-2 col-form-label">Offer Discount</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="offer_discount"
                        value="{{ $product->offer_discount }}" id="offer_discount" placeholder="Offer Discount">
                </div>
            </div>
            <div class="row mb-3">
                <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="weight" value="{{ $product->weight }}"
                        id="weight" placeholder="Weight">
                </div>
            </div>
            <div class="row mb-3">
                <label for="barcode" class="col-sm-2 col-form-label">Barcode</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="barcode" value="{{ $product->barcode }}"
                        id="barcode" placeholder="Barcode">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
    </main>

@endsection
@section('script')


@endsection
