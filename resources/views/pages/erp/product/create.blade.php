
@extends('layout.erp.app')
@section('title', 'Create Product')
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
        <form action="{{ route('products.store') }}" method ="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="offer_price" class="col-sm-2 col-form-label">Offer Price</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="offer_price" id="offer_price"
                        placeholder="Offer Price">
                </div>
            </div>
            <div class="row mb-3">
                <label for="supplier_id" class="col-sm-2 col-form-label">Supplier</label>
                <div class="col-sm-10">
                    <select class="form-control" name="supplier_id" id="supplier_id">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="regular_price" class="col-sm-2 col-form-label">Regular Price</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="regular_price" id="regular_price"
                        placeholder="Regular Price">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
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
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="uom_id" class="col-sm-2 col-form-label">Uom</label>
                <div class="col-sm-10">
                    <select class="form-control" name="uom_id" id="uom_id">
                        @foreach ($uom as $uom)
                            <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="star" class="col-sm-2 col-form-label">Star</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="star" id="star" placeholder="Star">
                </div>
            </div>
            <div class="row mb-3">
                <label for="offer_discount" class="col-sm-2 col-form-label">Offer Discount</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="offer_discount" id="offer_discount"
                        placeholder="Offer Discount">
                </div>
            </div>
            <div class="row mb-3">
                <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="weight" id="weight" placeholder="Weight">
                </div>
            </div>
            <div class="row mb-3">
                <label for="barcode" class="col-sm-2 col-form-label">Barcode</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="barcode" id="barcode" placeholder="Barcode">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </main>

@endsection
@section('script')


@endsection
