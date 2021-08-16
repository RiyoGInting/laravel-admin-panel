<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use App\Models\Company;
use Tests\TestCase;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_login()
    {
        $response = $this->post('/api/admin/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/companies');
    }

    public function test_add_companies_without_login()
    {
        $response = $this->post('/addCompanies', [
            'name' => 'PT Sumber Jaya',
            'website' => 'http://www.sumberjaya.com',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_add_company()
    {
        $this->withoutMiddleware();

        $response = $this->post('/addCompanies', [
            'name' => 'Sumber Jaya',
            'website' => 'www.sumberjaya.com',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/companies');
    }

    public function test_update_company()
    {
        $this->withoutMiddleware();

        $company = Company::select('id')->where('name', 'Sumber Jaya')->first();
        $id = (string)$company->id;

        $response = $this->put("/companies/$id", [
            'website' => 'http://www.sumberjaya.com',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/companies');
    }

    public function test_get_companies()
    {
        $this->withoutMiddleware();
        $response = $this->get('/companies');

        $response->assertStatus(200);
    }

    public function test_delete_company()
    {
        $this->withoutMiddleware();

        $company = Company::select('id')->where('name', 'Sumber Jaya')->first();
        $id = (string)$company->id;

        $response = $this->delete('/delete/companies/' . $id);

        $response->assertStatus(302);
        $response->assertRedirect('/companies');
    }
}
