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

@section('title', 'Edit Company')

@section('content')
<div class="center">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">{{trans('multilingual.edit_company')}}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('update.company', $id) }}">
                @csrf
                @foreach($company as $c)

                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">{{trans('multilingual.name')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ $c->name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">{{trans('multilingual.email')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{ $c->email }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="logo" class="col-sm-2 col-form-label">{{trans('multilingual.logo')}}</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="logo" value="{{ $c->logo }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="website" class="col-sm-2 col-form-label">{{trans('multilingual.website')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="website" value="{{ $c->website }}">
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