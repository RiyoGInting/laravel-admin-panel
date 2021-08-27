<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sell;
use App\Models\Item;
use App\Models\Employee;
use App\Models\SellSummary;
use Carbon\Carbon;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

    public function getAll()
    {
        $sells = Sell::latest()
            ->with('item')
            ->with('employee')
            ->get();

        return datatables($sells)
            ->addColumn('action', function ($sells) {
                return '<a href="edit/sells/' . $sells->id . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Update</a>
                    <a href="delete/sells/' . $sells->id . '"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function addIndex()
    {
        $items = Item::select('name', 'id')->get();
        $employees = Employee::select('first_name', 'id')->get();

        return view('sells.add')->with([
            'item' => $items,
            'employee' => $employees,
        ]);
    }

    public function create(Request $request)
    {
        // validation
        $validator = $request->validate([
            'item_id' => 'required',
            'discount' => 'required',
            'employee_id' => 'required',
        ]);

        // create new sell
        $sell = new Sell;
        $sell->created_date = Carbon::now();
        $sell->item_id = $request->item_id;
        $sell->discount = $request->discount;
        $sell->employee_id = $request->employee_id;

        // save to database
        $sell->save();

        // find sell that was just created
        $createdSell = Sell::where('id', $sell->id)
            ->with('item')
            ->with('employee')
            ->first();

        $discount = ($createdSell->item->price * $createdSell->discount) / 100;
        $date = explode(" ", $createdSell->created_date);

        // check if sell summary of employee based on request date exists
        $record = SellSummary::where('employee_id', $request->employee_id)
            ->where('date', $date[0])
            ->first();

        // if no record found then create new sell summary
        if (!$record) {
            // create sell summary
            $sellSummary = new SellSummary;
            $sellSummary->date = $createdSell->created_date;
            $sellSummary->employee_id = $createdSell->employee_id;
            $sellSummary->created_date = Carbon::now();
            $sellSummary->price_total = $createdSell->item->price;
            $sellSummary->discount_total = $createdSell->discount;
            $sellSummary->total = $createdSell->item->price - $discount;

            $sellSummary->save();
        } else {
            // new sell total
            $total = $createdSell->item->price - $discount;

            // if record found then update it
            $record->last_update = Carbon::now();
            $record->price_total = $record->price_total + $createdSell->item->price;
            $record->discount_total = $record->discount_total + $createdSell->discount;
            $record->total = $record->total + $total;

            //save updated sell summary to db
            $record->save();
        }

        return redirect('sells');
    }

    public function updateIndex($id)
    {

        $sell = Sell::where('id', $id)->get();
        $items = Item::select('name', 'id')->get();
        $employees = Employee::select('first_name', 'id')->get();

        return view('sells.edit')->with([
            'sell' => $sell,
            'id' => $id,
            'item' => $items,
            'employee' => $employees,
        ]);
    }

    function update($id, Request $request)
    {
        // find data by id to update
        $sell = Sell::where('id', $id)->first();

        // if data does not exist
        if (!$sell) {
            return response()->json(
                [
                    "message" => "Sell with id $id not found"
                ],
                404
            );
        }

        // set value to be update
        // give validation incase user does not give some data, so the old value will be use
        $sell->item_id = $request->item_id ? $request->item_id : $sell->item_id;
        $sell->discount = $request->discount ? $request->discount : $sell->discount;
        $sell->employee_id = $request->employee_id ? $request->employee_id : $sell->employee_id;

        // save updated product to db
        $sell->save();

        // send response
        return redirect('sells');
    }

    public function deleteIndex($id)
    {
        return view('sells.delete')->with([
            'id' => $id
        ]);
    }

    function delete($id)
    {
        // find data
        $sell = Sell::where('id', $id)->first();

        // if sell is not found
        if (!$sell) {
            return response()->json(
                [
                    "message" => "Sell with id $id not found"
                ],
                404
            );
        }

        // if company exist, delete it
        $sell->delete();

        return redirect('sells');
    }

    public function detailIndex($date)
    {
        return view('sells.detail')->with([
            'date' => $date
        ]);
    }

    public function getDetail($date)
    {
        $sells = Sell::latest()
            ->with('item')
            ->with('employee')
            ->orWhere('created_date', 'like', '%' . $date . '%')
            ->get();

        return datatables($sells)
            ->addIndexColumn()
            ->make(true);
    }
}
