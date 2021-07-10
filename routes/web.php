<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index']);

Route::get('companies', [CompanyController::class, 'index']);
Route::get('companies/list', [CompanyController::class, 'getAll'])->name('companies.list');
Route::get('addCompanies', [CompanyController::class, 'addIndex']);
Route::post('addCompanies', [CompanyController::class, 'create'])->name('create.company');
Route::get('edit/companies/{id}', [CompanyController::class, 'updateIndex']);
Route::put('companies/{id}', [CompanyController::class, 'update'])->name('update.company');

Route::get('employees', [EmployeeController::class, 'index']);
Route::get('employees/list', [EmployeeController::class, 'getAll'])->name('employees.list');
Route::get('addEmployees', [EmployeeController::class, 'addIndex']);
Route::post('addEmployees', [EmployeeController::class, 'create'])->name('create.employee');
Route::get('edit/employees/{id}', [EmployeeController::class, 'updateIndex']);
Route::put('employees/{id}', [EmployeeController::class, 'update'])->name('update.employee');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
