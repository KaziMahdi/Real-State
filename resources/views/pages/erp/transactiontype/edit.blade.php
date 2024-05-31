@extends('layout.erp.app')
@section('title', 'Edit Transaction Type')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Transaction Types</a></li>
                    <li><a class="btn btn-light" href="{{ route('transaction-types.create') }}">Edit Transaction Types</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('transaction-types.index') }}" class="btn btn-info">Manage Transaction Types</a>
            </div>
        </div>

        <form action="{{ route('transaction-types.update', $transactiontype) }}" method ="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="name" value="{{ $transactiontype->name }}"
                        id="name" placeholder="Name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="descriptions" class="col-sm-2 col-form-label">Descriptions</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="descriptions"
                        value="{{ $transactiontype->descriptions }}" id="descriptions" placeholder="Descriptions">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
