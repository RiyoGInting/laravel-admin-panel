<?php

namespace App\Http\Controllers;

use App\Models\SellSummary;
use Illuminate\Http\Request;

class SellSummaryController extends Controller
{
    public function index()
    {
        return view('sell_summary');
    }

    public function getAll()
    {
        $sellsummary = SellSummary::latest()
            ->with('employee')
            ->get();

        return datatables($sellsummary)
            ->addIndexColumn()
            ->make(true);
    }
}
