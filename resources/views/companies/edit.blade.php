@extends('layouts.master')
@section('title', 'Edit Company')

@section('content')
<h3>Edit Company</h3>
<form method="POST" action="{{ route('update.company', $id) }}">
    @csrf
    @foreach($company as $c)

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value="{{ $c->name }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" value="{{ $c->email }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="logo" value="{{ $c->logo }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="website" class="col-sm-2 col-form-label">Website</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="website" value="{{ $c->website }}">
        </div>
    </div>
    @endforeach
    <div class="col-md-12">
        <input type="hidden" name="_method" value="PUT">
        <button type="submit" class="btn btn-primary">
            Edit
        </button>
    </div>
</form>
@endsection