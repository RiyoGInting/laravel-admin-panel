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

@section('title', 'Sell Summary List')

@section('custom-nav-li')
<a href="/api/admin/logout">{{trans('multilingual.logout')}}</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <label>Filter Employee</label>
        <select id="filter-employee" class="form-control filter">
            <option value="">Select Employee</option>
            @foreach($sellsummary as $s)
            <option value="{{$s->employee->id}}">{{$s->employee->first_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label>Filter Company</label>
        <select id="filter-company" class="form-control filter">
            <option value="">Select Company</option>
            @foreach($companies as $c)
            <option value="{{$c['id']}}">{{$c['name']}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label>Filter Date</label>
        <div class="row">
            <input id="filter-date-from" class="form-control filter" placeholder="from yyyy-mm-dd">
            <input id="filter-date-to" class="form-control filter" placeholder="to yyyy-mm-dd">
        </div>
    </div>
</div>
<div class="container mt-5">
    <table id="sellsummary" class="table table-bordered table-striped" style="width:100%">
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
        let employee = $("#filter-employee").val();
        let company = $("#filter-company").val();
        let from = $("#filter-date-from").val();
        let to = $("#filter-date-to").val();

        const table = $('#sellsummary').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('sellsummary/list') }}",
                data: function(d) {
                    d.employee = employee;
                    d.company = company;
                    d.from = from;
                    d.to = to;

                    return d
                },
                type: "GET"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    "visible": false,
                    "searchable": false
                },
                {
                    data: 'date',
                    name: 'date',
                    render: function(data, type, row) {
                        return "<a href='detail/" + row.date + "'>" + row.date + "</a>"
                    }
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
        $(".filter").on('change', function() {
            employee = $("#filter-employee").val()
            company = $("#filter-company").val()
            from = $("#filter-date-from").val()
            to = $("#filter-date-to").val()

            table.ajax.reload(null, false)
        })
    });
</script>
@endsection