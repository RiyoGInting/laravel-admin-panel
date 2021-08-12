<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompaniesExport;
use App\Imports\CompaniesImport;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\Config;

class CompanyController extends Controller
{
    public function index()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }

        return view('company');
    }

    public function getAll(Request $request)
    {
        $data = Company::latest()->get();

        return datatables($data)
            ->addColumn('action', function ($data) {
                return '<a href="edit/companies/' . $data->id . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="delete/companies/' . $data->id . '"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }


    public function addIndex()
    {
        return view('companies.add');
    }

    public function create(Request $request)
    {
        // validation
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'unique:companies|nullable',
            'logo' => 'image|mimes:png,jpg,jpeg|max:10000',
        ]);

        // get logged id set in middleware
        $createdById = $request->get('id');

        // create new company
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->created_by_id = $createdById;

        // upload logo
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $filename = Str::random(32) . '.' . $request->logo->extension();
            $request->logo->move(storage_path('app/public/logo'), $filename);

            $company->logo = $filename;
        } else {
            $company->logo = $request->logo;
        }

        // save to database
        $company->save();

        if ($request->email) {
            // send email notification after create to queue
            $email = $company->email;
            $job = (new SendEmailJob($email))
                ->delay(Carbon::now()->addSeconds(5));

            dispatch($job);
        }


        return redirect('companies');
    }


    public function updateIndex($id)
    {

        $companies = Company::where('id', $id)->get();


        return view('companies.edit')->with([
            'company' => $companies,
            'id' => $id
        ]);
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

        // get logged id set in middleware
        $updatedById = $request->get('id');

        // set value to be update
        // give validation incase user does not give some data, so the old value will be use
        $company->name = $request->name ? $request->name : $company->name;
        $company->email = $request->email ? $request->email : $company->email;
        $company->logo = $request->logo ? $request->logo : $company->logo;
        $company->website = $request->website ? $request->website : $company->website;
        $company->updated_by_id = $updatedById;

        // save updated product to db
        $company->save();

        // send response
        return redirect('companies');
    }


    public function deleteIndex($id)
    {
        // $companies = Company::where('id', $id)->get();

        return view('companies.delete')->with([
            'id' => $id
        ]);
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

        return redirect('companies');
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

    public function export()
    {
        return Excel::download(new CompaniesExport, 'companies.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new CompaniesImport, $file);

        return redirect('/companies');
    }
}
