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

@section('title', 'Edit Employee')

@section('content')
<div class="center">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">{{trans('multilingual.edit_employee')}}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('update.employee', $id) }}">
                @csrf
                @foreach($employee as $e)

                <div class="mb-3 row">
                    <label for="first_name" class="col-sm-2 col-form-label">{{trans('multilingual.first_name')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" value="{{ $e->first_name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="last_name" class="col-sm-2 col-form-label">{{trans('multilingual.last_name')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="last_name" value="{{ $e->last_name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="company_id" class="col-sm-2 col-form-label">{{trans('multilingual.company')}}</label>
                    <div class="col-sm-10">
                        <select name="company_id" id="company_id">
                            <option selected="selected" value="">{{trans('multilingual.choose_company')}}</option>
                            @foreach ($company as $c)
                            <option value="{{ $c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">{{trans('multilingual.email')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{$e->email}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="phone" class="col-sm-2 col-form-label">{{trans('multilingual.phone')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" value="{{$e->phone}}">
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