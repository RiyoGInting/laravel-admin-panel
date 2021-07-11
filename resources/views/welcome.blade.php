@extends('layouts.master')

@section('title', 'Home page')
@section('content')

<h1>laravel-mini-crm</h1>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>

@endsection