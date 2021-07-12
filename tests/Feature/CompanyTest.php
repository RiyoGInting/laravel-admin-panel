<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use App\Models\Company;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_add_companies_without_login()
    {
        $response = $this->post('/addCompanies', [
            'name' => 'PT Sumber Jaya',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_add_company()
    {
        $admin = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $response = $this->post('/addCompanies', [
            'name' => 'PT Sumber Jaya',
        ]);

        $response->assertRedirect('/companies');
    }

    public function test_get_companies()
    {
        $response = $this->get('/companies/list');

        $response->assertStatus(200);
    }

    public function test_delete_company()
    {
        $admin = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $companyId = Company::select('id')->where('name', 'PT Sumber Jaya')->first();
        $id = (string)$companyId->id;

        $response = $this->delete('/delete/companies/' . $id);

        $response->assertRedirect('/companies');
    }
}
