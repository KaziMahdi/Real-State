<?php

?>
@extends('layout.erp.app')
@section('title', 'Create Supplier')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Supplier</a></li>
                    <li><a class="btn btn-light" href="{{ route('suppliers.create') }}">Create Supplier</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('suppliers.index') }}" class="btn btn-info">Manage Suppliers</a>
            </div>
        </div>

        <form action="{{ route('suppliers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>
            </div>
            <div class="row mb-3">
                <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_name" id="company_name"
                        placeholder="Company Name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
