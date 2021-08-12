@extends('layouts.master')

@section('custom-head')
<style>
    .center {
        margin: auto;
        width: 60%;
        padding: 10px;
    }
</style>
@endsection

@section('title', 'Add Employee')

@section('content')
<div class="center">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">{{trans('multilingual.add_employee_form')}}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('create.employee') }}">
                @csrf
                <div class="mb-3 row">
                    <label for="first_name" class="col-sm-2 col-form-label">{{trans('multilingual.first_name')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="last_name" class="col-sm-2 col-form-label">{{trans('multilingual.last_name')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="company_id" class="col-sm-2 col-form-label">{{trans('multilingual.company')}}</label>
                    <div class="col-sm-10">
                        <select name="company_id" id="company_id" required>
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
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">{{trans('multilingual.password')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="phone" class="col-sm-2 col-form-label">{{__('Phone')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{trans('multilingual.add')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection