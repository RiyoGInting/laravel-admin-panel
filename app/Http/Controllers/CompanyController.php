<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use DataTables;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company');
    }

    public function updateIndex($id)
    {

        $companies = Company::where('id', $id)->get();


        return view('companies.edit')->with([
            'company' => $companies,
            'id' => $id
        ]);
    }

    public function create(Request $request)
    {
        // create new company
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        Log::info($request->hasfile($request->logo));
        // upload image
        // if ($request->hasfile('logo')) {
        //     $file = $request->file('logo');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extention;
        //     $file->move('uploads/companies', $filename);
        //     $company->logo = $filename;
        // }
        $image = $request->logo;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $company['logo'] = $imageName;
        }

        // save to database
        $company->save();

        // send email notification after create
        Mail::raw('Thank you for joining mini-crm ' . $company->name, function ($message) use ($company) {
            $message->to($company->email, $company->name);
            $message->subject("Notification");
        });

        return redirect('companies');
    }

    public function getAll(Request $request)
    {
        $data = Company::latest()->get();

        return datatables($data)
            ->addColumn('action', function ($data) {
                $edit = '<a href="edit/companies/' . $data->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $delete = '<a href="edit/companies/' . $data->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
                return $edit;
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
        return redirect('companies');
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
