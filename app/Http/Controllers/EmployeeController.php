<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use DataTables;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee');
    }

    public function addIndex()
    {
        $companies = Company::select('name', 'id')->get();

        return view('employees.add')->with([
            'company'   => $companies,
        ]);
    }

    public function updateIndex($id)
    {
        $employee = Employee::where('id', $id)->get();
        $companies = Company::select('name', 'id')->get();

        return view('employees.edit')->with([
            'employee' => $employee,
            'company' => $companies,
            'id' => $id
        ]);
    }

    function create(Request $request)
    {
        Log::info($request->all());
        // check whether the company exists or not
        $company = Company::where('id', $request->company_id)->get();

        // if the company is does not exist
        if (count($company) == 0) {
            return response()->json(
                [
                    "message" => "Company_id $request->company_id not valid"
                ],
                400
            );
        }

        // create new employee
        $employee = new Employee;
        $employee->company_id = $request->company_id;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        // save to database
        $employee->save();

        // send email notification after create
        Mail::raw('Thank you for joining mini-crm ' . $employee->first_name, function ($message) use ($employee) {
            $message->to($employee->email, $employee->first_name);
            $message->subject("Notification");
        });

        // send response
        return redirect('employees');
    }

    public function getAll(Request $request)
    {
        $data = Employee::latest()->get();

        return datatables($data)
            ->addColumn('action', function ($data) {
                return '<a href="edit/employees/' . $data->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    function getOne($id)
    {
        // get one data from db
        $data = Employee::where('id', $id)->get();

        // if data is not found
        if (count($data) == 0) {
            return response()->json(
                [
                    "message" => "Employee with id $id not found"
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
        $employee = Employee::where('id', $id)->first();

        // if data does not exist
        if (!$employee) {
            return response()->json(
                [
                    "message" => "employee with id $id not found"
                ],
                404
            );
        }

        // set value to be update
        // give validation incase user does not give some data, so the old value will be use
        $employee->company_id = $request->company_id ?
            $request->company_id : $employee->company_id;
        $employee->first_name = $request->first_name ?
            $request->first_name : $employee->first_name;
        $employee->last_name = $request->last_name ?
            $request->last_name : $employee->last_name;
        $employee->email = $request->email ? $request->email : $employee->email;
        $employee->phone = $request->phone ? $request->phone : $employee->phone;

        // save updated product to db
        $employee->save();

        // send response
        return redirect('employees');
    }

    function delete($id)
    {
        // find employee
        $employee = Employee::where('id', $id)->first();

        // if employee is not found
        if (!$employee) {
            return response()->json(
                [
                    "message" => "employee with id $id not found"
                ],
                404
            );
        }

        // if employee exist, delete it
        $employee->delete();

        return response()->json(
            [
                "message" => "employee with id $id successfully deleted"
            ]
        );
    }
}
