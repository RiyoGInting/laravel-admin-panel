<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'company',
            'text' => ['en' => 'Company', 'id' => 'Perusahaan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'company_list',
            'text' => ['en' => 'Company List', 'id' => 'Daftar Perusahaan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'logout',
            'text' => ['en' => 'Logout', 'id' => 'Keluar'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'logout',
            'text' => ['en' => 'Logout', 'id' => 'Keluar'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'import_excel',
            'text' => ['en' => 'Import Excel', 'id' => 'Impor Excel'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'name',
            'text' => ['en' => 'Name', 'id' => 'Nama'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'email',
            'text' => ['en' => 'Email', 'id' => 'Email'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'logo',
            'text' => ['en' => 'Logo', 'id' => 'Logo'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'website',
            'text' => ['en' => 'Website', 'id' => 'Situs Web'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'created_at',
            'text' => ['en' => 'Created At', 'id' => 'Tanggal Dibuat'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'created_by',
            'text' => ['en' => 'Created by', 'id' => 'Dibuat Oleh'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'updated_by',
            'text' => ['en' => 'Updated by', 'id' => 'Diubah Oleh'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'action',
            'text' => ['en' => 'Action', 'id' => 'Tindakan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'add',
            'text' => ['en' => 'Add', 'id' => 'Tambah'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'download',
            'text' => ['en' => 'Download', 'id' => 'Unduh'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'home',
            'text' => ['en' => 'Home', 'id' => 'Beranda'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'login',
            'text' => ['en' => 'Login', 'id' => 'Masuk'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'login_message',
            'text' => ['en' => 'Sign in to start your session', 'id' => 'Masuk untuk memulai sesi anda'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'employee',
            'text' => ['en' => 'Employee', 'id' => 'Karyawan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'password',
            'text' => ['en' => 'Password', 'id' => 'Sandi'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'employee_list',
            'text' => ['en' => 'Employee List', 'id' => 'List Karyawan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'first_name',
            'text' => ['en' => 'First Name', 'id' => 'Nama Depan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'last_name',
            'text' => ['en' => 'Last Name', 'id' => 'Nama Belakang'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'phone',
            'text' => ['en' => 'Phone', 'id' => 'Telepon'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'company_id',
            'text' => ['en' => 'Company ID', 'id' => 'ID Perusahaan'],
        ]);
    }
}
