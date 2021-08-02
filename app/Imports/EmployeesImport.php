<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Employee([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'company_id' => $row['company_id'],
            'email' => $row['email'],
            'phone' => $row['phone'],
        ]);
    }
}
