<?php

?>
@extends('layout.erp.app')
@section('title','Show Status')
@section('style')


@endsection
@section('page')
<main>
    <div style="justify-content:space-between; display:flex; padding:4px">
        <div>
            <ul class="breadcrumbs">
                <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                <li><a class="btn btn-light" href="#">Status</a></li>
                <li><a class="btn btn-light" href="{{ route('status.create') }}">Details Status</a></li>
            </ul>
        </div>
        <div>
            <a href="{{ route('status.index') }}" class="btn btn-info">Manage Status</a>
        </div>
    </div>
    <a class='btn btn-success' href="{{route('status.index')}}">Manage</a>
    <table class='table table-striped text-nowrap'>
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{$status->id}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$status->name}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$status->descriptions}}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{$status->created_at}}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{$status->updated_at}}</td>
            </tr>

        </tbody>
    </table>
</main>
@endsection
@section('script')


@endsection