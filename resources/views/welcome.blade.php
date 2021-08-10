@extends('layouts.master')

@section('title', 'Home page')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>laravel-mini-crm</h1>
    </div>
    <div class="card-body">
        <div class="hold-transition login-page">
            <div class="login-box">
                <!-- /.login-logo -->

                <h1>{{ Session::get('message') }}</h1>
                <div class="card card-outline card-primary">
                    <div class="card-header text-center h1"><b>{{trans('multilingual.login')}}</b></div>

                    <div class="card-body">
                        <p class="login-box-msg">{{trans('multilingual.login_message')}}</p>
                        <form method="POST" action="{{ url('api/admin/login') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input id="email" type="email" placeholder={{trans('multilingual.email')}} class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input id="password" type="password" placeholder={{trans('multilingual.password')}} class="form-control" name="password" required autocomplete="current-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- /.col -->
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">{{trans('multilingual.login')}}</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->


        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
    </div>
</div>
</div>
@endsection