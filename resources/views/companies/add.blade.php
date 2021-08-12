@extends('layouts.master')

@section('custom-head')
<style>
    .center {
        margin: auto;
        width: 75%;
        padding: 10px;
    }
</style>
@endsection

@section('title', 'Add Company Form')

@section('content')
<div class="center">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">{{trans('multilingual.add_company_form')}}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('create.company') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">{{trans('multilingual.company_name')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">{{trans('multilingual.email')}}</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="website" class="col-sm-2 col-form-label">{{trans('multilingual.website')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="website">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="logo" class="col-sm-2 col-form-label">{{trans('multilingual.logo')}}</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="logo">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{trans('multilingual.add')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection