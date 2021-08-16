<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\Feature\CompanyTest;
use App\Models\Company;
use App\Models\Employee;

use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function _construct(CompanyTest $companyTest)
    {
        $this->companyTest = $companyTest;
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_add_employee_without_login()
    {
        $response = $this->post('/addEmployees', [
            'first_name' => 'user',
            'last_name' => 'test'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_get_employees()
    {
        $this->withoutMiddleware();
        $response = $this->get('/employees');

        $response->assertStatus(200);
    }

    public function test_add_company_for_employee()
    {
        $this->withoutMiddleware();

        $response = $this->post('/addCompanies', [
            'name' => 'Maju Jaya',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/companies');
    }

    public function test_add_employee()
    {
        $this->withoutMiddleware();

        $company = Company::select('id')->where('name', 'Maju Jaya')->first();
        $id = (string)$company->id;

        $response = $this->post('/addEmployees', [
            'first_name' => 'user',
            'last_name' => 'test',
            'company_id' => $id,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/employees');
    }

    public function test_update_employee()
    {
        $this->withoutMiddleware();

        $employee = Employee::select('id')->where('first_name', 'user')->first();
        $id = (string)$employee->id;

        $response = $this->put("/employees/$id", [
            'last_name' => 'user update',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/employees');
    }

    public function test_delete_employee()
    {
        $this->withoutMiddleware();

        $employeeId = Employee::select('id')->where('first_name', 'user')->first();
        $id = (string)$employeeId->id;

        $response = $this->delete('/delete/employees/' . $id);

        $response->assertStatus(302);
        $response->assertRedirect('/employees');
    }

    public function test_delete_company_for_employee()
    {
        $this->withoutMiddleware();

        $companyId = Company::select('id')->where('name', 'Maju Jaya')->first();
        $id = (string)$companyId->id;

        $response = $this->delete('/delete/companies/' . $id);

        $response->assertStatus(302);
        $response->assertRedirect('/companies');
    }
}
