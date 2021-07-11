@extends('layouts.main')
@section('title', 'Delete Employee')

@section('container')
<h5>Continue the delete process?</h5>
<form method="POST" action="{{ route('delete.employee', $id) }}">
    @csrf
    <div class="col-md-12">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-primary">
            Delete
        </button>
    </div>
</form>
@endsection