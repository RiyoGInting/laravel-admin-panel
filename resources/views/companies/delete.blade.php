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

@section('title', 'Delete Company')

@section('content')
<div class="center">
    <div class="card">
        <div class="card-header">
            <h5>{{trans('multilingual.continue_delete')}}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('delete.company', $id) }}">
                @csrf
                <div class="col-md-12">
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">
                        {{trans('multilingual.delete')}}
                    </button>
                    <a href="/companies" class="btn btn-primary">cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection