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
    <table class="table table-bordered table-striped sells" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Item</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Employee</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Item</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Employee Name</th>
                <th>Created Date</th>
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
        $('.sells').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get.detail', $date) }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    "visible": false,
                    "searchable": false
                },
                {
                    data: 'item.name',
                    name: 'item'
                },
                {
                    data: 'item.price',
                    name: 'price'
                },
                {
                    data: 'discount',
                    name: 'discount'
                },
                {
                    data: 'employee.first_name',
                    name: 'employee'
                },
                {
                    data: 'created_date',
                    name: 'created_date'
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