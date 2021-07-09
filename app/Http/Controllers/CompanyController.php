<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use DataTables;

class CompanyController extends Controller
{
    function create(Request $request)
    {
        // create new company
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->website = $request->website;

        // save to database
        $company->save();

        // send response
        return redirect('companies');
    }

    // function getAll()
    // {
    //     // get all data from db
    //     $data = Company::all();

    //     return DataTables::collection(Company::all())->make(true);
    // }

    public function index()
    {
        return view('welcome');
    }


    public function getAll(Request $request)
    {
        $data = Company::latest()->get();

        return datatables($data)
            ->addColumn('action', function ($data) {
                return '<a href="#edit-company-' . $data->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    function getOne($id)
    {
        // get one data from db
        $data = Company::where('id', $id)->get();

        // if data is not found
        if (count($data) == 0) {
            return response()->json(
                [
                    "message" => "Company with id $id not found"
                ],
                404
            );
        }

        // if success
        return response()->json(
            [
                "message" => "Success",
                "data" => $data
            ]
        );
    }

    function update($id, Request $request)
    {
        // find data by id to update
        $company = Company::where('id', $id)->first();

        // if data does not exist
        if (!$company) {
            return response()->json(
                [
                    "message" => "Company with id $id not found"
                ],
                404
            );
        }

        // set value to be update
        // give validation incase user does not give some data, so the old value will be use
        $company->name = $request->name ? $request->name : $company->name;
        $company->email = $request->email ? $request->email : $company->email;
        $company->logo = $request->logo ? $request->logo : $company->logo;
        $company->website = $request->website ? $request->website : $company->website;

        // save updated product to db
        $company->save();

        // send response
        return response()->json(
            [
                "message" => "Success ",
                "data" => $company
            ]
        );
    }

    function delete($id)
    {
        // find company
        $company = Company::where('id', $id)->first();

        // if company is not found
        if (!$company) {
            return response()->json(
                [
                    "message" => "Company with id $id not found"
                ],
                404
            );
        }

        // if company exist, delete it
        $company->delete();

        return response()->json(
            [
                "message" => "Company with id $id successfully deleted"
            ]
        );
    }

    public function addIndex()
    {
        return view('companies.add');
    }
}
