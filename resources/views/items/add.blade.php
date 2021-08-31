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
            <h3 class="text-center">{{trans('multilingual.add_item_form')}}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('create.item') }}">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">{{trans('multilingual.name')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">{{trans('multilingual.price')}}</label>
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