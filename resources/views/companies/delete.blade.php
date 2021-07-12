@extends('layouts.master')
@section('title', 'Delete Company')

@section('content')
<h5>{{__('Continue the delete process?')}}</h5>
<form method="POST" action="{{ route('delete.company', $id) }}">
    @csrf
    <div class="col-md-12">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-primary">
            {{__('Delete')}}
        </button>
    </div>
</form>
@endsection