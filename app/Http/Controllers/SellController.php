<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sell;
use App\Models\Item;
use App\Models\Employee;
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

        return redirect('sells');
    }

    public function updateIndex($id)
    {

        $sell = Sell::where('id', $id)
            // ->with('item')
            // ->with('employee')
            ->get();
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
}
