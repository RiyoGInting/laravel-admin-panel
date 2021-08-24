@extends('layouts.master')

@section('custom-head')
<style>
    .center {
        margin: auto;
        width: 55%;
        padding: 10px;
    }
</style>
@endsection

@section('title', 'Edit Sell')

@section('content')
<div class="center">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Edit Sell</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('update.sell', $id) }}">
                @csrf
                @foreach($sell as $s)
                <div class="mb-3 row">
                    <label for="item_id" class="col-sm-2 col-form-label">Item</label>
                    <div class="col-sm-10">
                        <select name="item_id" id="item_id">
                            <option selected="selected" value="">{{$s->item->name}}</option>
                            @foreach ($item as $i)
                            <option value="{{ $i->id}}">{{$i->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="discount" class="col-sm-2 col-form-label">Discount</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="discount" value="{{ $s->discount }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="employee_id" class="col-sm-2 col-form-label">Employee</label>
                    <div class="col-sm-10">
                        <select name="employee_id" id="employee_id">
                            <option selected="selected" value="">{{$s->employee->first_name}}</option>
                            @foreach ($employee as $e)
                            <option value="{{ $e->id}}">{{$e->first_name}}</option>
                            @endforeach
                        </select>
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