@extends('layouts.main')
@section('title', 'Edit Employee')

@section('container')
<h3>Edit Employee</h3>
<form method="POST" action="{{ route('update.employee', $id) }}">
    @csrf
    @foreach($employee as $e)

    <div class="mb-3 row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="first_name" placeholder={{$e->first_name}}>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="last_name" placeholder={{$e->last_name}}>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="company_id" class="col-sm-2 col-form-label">Company</label>
        <div class="col-sm-10">
            <select name="company_id" id="company_id">
                <option selected="selected" value="">Choose one</option>
                @foreach ($company as $c)
                <option value="{{ $c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" placeholder={{$e->email}}>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="phone" placeholder={{$e->phone}}>
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