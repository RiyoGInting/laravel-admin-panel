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
            <h3 class="text-center">{{trans('multilingual.add_sell_form')}}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('create.sell') }}">
                @csrf
                <div class="mb-3 row">
                    <label for="item_id" class="col-sm-2 col-form-label">{{trans('multilingual.item')}}</label>
                    <div class="col-sm-10">
                        <select name="item_id" id="item_id" required>
                            <option selected="selected" value="">{{trans('multilingual.select_item')}}</option>
                            @foreach ($item as $i)
                            <option value="{{ $i->id}}">{{$i->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="discount" class="col-sm-2 col-form-label">{{trans('multilingual.discount')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="discount" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="employee_id" class="col-sm-2 col-form-label">{{trans('multilingual.employee')}}</label>
                    <div class="col-sm-10">
                        <select name="employee_id" id="employee_id" required>
                            <option selected="selected" value="">{{trans('multilingual.select_employee')}}</option>
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