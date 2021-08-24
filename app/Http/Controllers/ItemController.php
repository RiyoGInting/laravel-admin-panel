<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        return view('item');
    }

    public function getAll()
    {
        $items = Item::latest()->get();

        return datatables($items)
            ->addColumn('action', function ($items) {
                return '<a href="edit/items/' . $items->id . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Update</a>
                    <a href="delete/items/' . $items->id . '"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function addIndex()
    {
        return view('items.add');
    }

    public function create(Request $request)
    {
        // validation
        $validator = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        // create new company
        $company = new Item;
        $company->name = $request->name;
        $company->price = $request->price;

        // save to database
        $company->save();

        return redirect('items');
    }

    public function updateIndex($id)
    {

        $item = Item::where('id', $id)->get();


        return view('items.edit')->with([
            'item' => $item,
            'id' => $id
        ]);
    }

    function update($id, Request $request)
    {
        // find data by id to update
        $item = Item::where('id', $id)->first();

        // if data does not exist
        if (!$item) {
            return response()->json(
                [
                    "message" => "Item with id $id not found"
                ],
                404
            );
        }

        // set value to be update
        // give validation incase user does not give some data, so the old value will be use
        $item->name = $request->name ? $request->name : $item->name;
        $item->price = $request->price ? $request->price : $item->price;

        // save updated product to db
        $item->save();

        // send response
        return redirect('items');
    }

    public function deleteIndex($id)
    {
        return view('items.delete')->with([
            'id' => $id
        ]);
    }

    function delete($id)
    {
        // find item
        $item = Item::where('id', $id)->first();

        // if item is not found
        if (!$item) {
            return response()->json(
                [
                    "message" => "Item with id $id not found"
                ],
                404
            );
        }

        // if company exist, delete it
        $item->delete();

        return redirect('items');
    }
}
