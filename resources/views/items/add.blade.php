@extends('layouts.master')

@section('custom-head')
<style>
    .center {
        margin: auto;
        width: 50%;
        padding: 10px;
    }
</style>
@endsection

@section('title', 'Add Item')

@section('content')
<div class="center">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Add Item Form</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('create.item') }}">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="price" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{trans('multilingual.add')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection