@extends('layouts.master')
@section('custom-head')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">{{__('Employee List')}}</h2>
        </div>
        <div class="card-body">
            <form action="/employees/import" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="file">

                    <button type="submit" class="btn btn-primary">{{__('Import Excel')}}</button>
                </div>
            </form>

            <div class="container mt-5">
                <table class="table table-bordered employees">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>{{__('First Name')}}</th>
                            <th>{{__('Last Name')}}</th>
                            <th>{{__('Company ID')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <a href="/addEmployees" class="btn btn-primary">{{__('ADD')}}</a>
                <a href="/employees/export" class="btn btn-primary">{{__('DOWNLOAD')}}</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('datatable')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.employees').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('employees.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'last_name',
                    name: 'last_name'
                },
                {
                    data: 'company_id',
                    name: 'company_id'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });
</script>
@endsection