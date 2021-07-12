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

        $response->assertRedirect('/login');
    }

    public function test_add_company_for_employee()
    {
        $admin = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $response = $this->post('/addCompanies', [
            'name' => 'PT Sumber Jaya 2',
        ]);

        $response->assertRedirect('/companies');
    }

    public function test_add_employee()
    {
        $admin = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $companyId = Company::select('id')->where('name', 'PT Sumber Jaya')->first();
        $id = (string)$companyId->id;

        $response = $this->post('/addEmployees', [
            'first_name' => 'user',
            'last_name' => 'test',
            'company_id' => $id,
        ]);

        $response->assertRedirect('/employees');
    }

    public function test_delete_employee()
    {
        $admin = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $employeeId = Employee::select('id')->where('first_name', 'user')->first();
        $id = (string)$employeeId->id;

        $response = $this->delete('/delete/employees/' . $id);

        $response->assertRedirect('/employees');
    }

    public function test_delete_company_for_employee()
    {
        $admin = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $companyId = Company::select('id')->where('name', 'PT Sumber Jaya 2')->first();
        $id = (string)$companyId->id;

        $response = $this->delete('/delete/companies/' . $id);

        $response->assertRedirect('/companies');
    }
}
