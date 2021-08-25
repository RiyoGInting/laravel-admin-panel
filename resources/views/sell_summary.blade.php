@extends('layouts.master')
@section('custom-head')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
@endsection

@section('title', 'Sell List')

@section('custom-nav-li')
<a href="/api/admin/logout">{{trans('multilingual.logout')}}</a>
@endsection

@section('content')
<div class="container mt-5">
    <table class="table table-bordered table-striped sellsummary" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Employee</th>
                <th>Created Date</th>
                <th>Last Update</th>
                <th>Price Total</th>
                <th>Discount Total</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Employee</th>
                <th>Created Date</th>
                <th>Last Update</th>
                <th>Price Total</th>
                <th>Discount Total</th>
                <th>Total</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('datatable')
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.sellsummary').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('sellsummary.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    "visible": false,
                    "searchable": false
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'employee.first_name',
                    name: 'employee'
                },
                {
                    data: 'created_date',
                    name: 'created_date'
                },
                {
                    data: 'last_update',
                    name: 'last_update'
                },
                {
                    data: 'price_total',
                    name: 'price_total'
                },
                {
                    data: 'discount_total',
                    name: 'discount_total'
                },
                {
                    data: 'total',
                    name: 'total'
                },
            ],
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var input = document.createElement("input");
                    input.placeholder = "type here & hit enter";
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function() {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            },
            order: [
                [0, 'desc']
            ]
        });
    });
</script>
@endsection