@extends('layouts.master')

@section('custom-head')
<style>
    .center {
        margin: auto;
        width: 65%;
        padding: 10px;
    }
</style>
@endsection

@section('title', 'Add Sell')

@section('content')
<div class="center">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Add Sell Form</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('create.sell') }}">
                @csrf
                <div class="mb-3 row">
                    <label for="item_id" class="col-sm-2 col-form-label">Item</label>
                    <div class="col-sm-10">
                        <select name="item_id" id="item_id" required>
                            <option selected="selected" value="">Select Item</option>
                            @foreach ($item as $i)
                            <option value="{{ $i->id}}">{{$i->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="discount" class="col-sm-2 col-form-label">discount</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="discount" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="employee_id" class="col-sm-2 col-form-label">Employee</label>
                    <div class="col-sm-10">
                        <select name="employee_id" id="employee_id" required>
                            <option selected="selected" value="">Select Employee</option>
                            @foreach ($employee as $e)
                            <option value="{{ $e->id}}">{{$e->first_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{trans('multilingual.add')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection