<?php

namespace App\Http\Controllers;

use App\Models\SellSummary;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SellSummaryController extends Controller
{
    public function index()
    {
        $sellsummary = SellSummary::with('employee')->groupBy('employee_id')->get();

        $companies = [];
        foreach ($sellsummary as $s) {
            $company_id = $s->employee->company_id;
            $company = Company::where('id', $company_id)->first()->toArray();
            array_push($companies, $company);
        }

        return view('sell_summary')->with(array(
            'sellsummary' => $sellsummary,
            'companies' => $companies,
        ));
    }

    public function getAll(Request $request)
    {
        $from = '2000/01/01';
        $to = Carbon::now();

        if ($request->input('from') != null) {
            $from = $request->input('from');
        }

        if ($request->input('to') != null) {
            $to = $request->input('to');
        }

        $sellsummary = SellSummary::latest()
            ->with('employee')
            ->whereBetween('date', [$from, $to])
            ->get();

        if ($request->input('company') != null && $request->input('employee') != null) {
            $sellsummary = SellSummary::latest()
                ->select(array(
                    'sell_summaries.*',
                    "employees.company_id as company_id"
                ))
                ->with('employee')
                ->whereBetween('date', [$from, $to])
                ->where('employee_id', $request->input('employee'))
                ->join('employees', 'employees.id', '=', 'sell_summaries.employee_id')
                ->get()
                ->where("company_id", $request->input('company'))->values();
        } else if ($request->input('employee') != null) {
            $sellsummary = SellSummary::latest()
                ->with('employee')
                ->whereBetween('date', [$from, $to])
                ->where('employee_id', $request->input('employee'))
                ->get();
        } else if ($request->input('company') != null) {
            $sellsummary = SellSummary::latest()
                ->select(array(
                    'sell_summaries.*',
                    "employees.company_id as company_id"
                ))
                ->with('employee')
                ->whereBetween('date', [$from, $to])
                ->join('employees', 'employees.id', '=', 'sell_summaries.employee_id')
                ->get()
                ->where("company_id", $request->input('company'))->values();
        }

        return datatables($sellsummary)
            ->addIndexColumn()
            ->make(true);
    }
}
