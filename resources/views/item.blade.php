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

@section('title', 'Item List')

@section('custom-nav-li')
<a href="/api/admin/logout">{{trans('multilingual.logout')}}</a>
@endsection

@section('content')
<div class="container mt-5">
    <table class="table table-bordered table-striped companies" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>{{trans('multilingual.name')}}</th>
                <th>{{trans('multilingual.price')}}</th>
                <th>{{trans('multilingual.created_at')}}</th>
                <th>{{trans('multilingual.action')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Created At</th>
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
        $('.companies').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('items.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    "visible": false,
                    "searchable": false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
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