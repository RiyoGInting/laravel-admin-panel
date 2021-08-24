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

@section('title', 'Edit Item')

@section('content')
<div class="center">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Edit Item</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('update.item', $id) }}">
                @csrf
                @foreach($item as $i)

                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">{{trans('multilingual.name')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ $i->name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{ $i->price }}">
                    </div>
                </div>
                @endforeach
                <div class="col-md-12">
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-primary">
                        {{trans('multilingual.edit')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection