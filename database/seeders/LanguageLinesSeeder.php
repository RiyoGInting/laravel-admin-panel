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
            'text' => ['en' => 'Employee List', 'id' => 'Daftar Karyawan'],
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
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'add_company_form',
            'text' => ['en' => 'Add Company Form', 'id' => 'Formulir Pendaftaran Perusahaan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'add_employee_form',
            'text' => ['en' => 'Add Employee Form', 'id' => 'Formulir Pendaftaran Karyawan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'company_name',
            'text' => ['en' => 'Company Name', 'id' => 'Nama Perusahaan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'choose_company',
            'text' => ['en' => 'Choose Company', 'id' => 'Pilih Perusahaan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'edit',
            'text' => ['en' => 'Edit', 'id' => 'Edit'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'edit_company',
            'text' => ['en' => 'Edit Company', 'id' => 'Edit Perusahaan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'edit_employee',
            'text' => ['en' => 'Edit Employee', 'id' => 'Edit Karyawan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'continue_delete',
            'text' => ['en' => 'Are you sure want to delete this data?', 'id' => 'Anda yakin ingin menghapus data ini?'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'delete',
            'text' => ['en' => 'Delete', 'id' => 'Hapus'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'add_company',
            'text' => ['en' => 'Add Company', 'id' => 'Tambah Perusahaan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'add_employee',
            'text' => ['en' => 'Add Employee', 'id' => 'Tambah Karyawan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'forms',
            'text' => ['en' => 'Forms', 'id' => 'Formulir'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'datatables',
            'text' => ['en' => 'Data Tables', 'id' => 'Tabel Data'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'item',
            'text' => ['en' => 'Item', 'id' => 'Barang'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'sell',
            'text' => ['en' => 'Sell', 'id' => 'Penjualan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'sell_summary',
            'text' => ['en' => 'Sell Summary', 'id' => 'Ringkasan Penjualan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'add_item',
            'text' => ['en' => 'Add Item', 'id' => 'Tambah Barang'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'add_sell',
            'text' => ['en' => 'Add Sell', 'id' => 'Tambah Penjualan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'add_item_form',
            'text' => ['en' => 'Add Item Form', 'id' => 'Formulir Tambah Barang'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'price',
            'text' => ['en' => 'Price', 'id' => 'Harga'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'add_sell_form',
            'text' => ['en' => 'Add Sell Form', 'id' => 'Formulir Tambah Penjualan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'select_item',
            'text' => ['en' => 'Select Item', 'id' => 'Pilih Barang'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'discount',
            'text' => ['en' => 'Discount', 'id' => 'Potongan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'select_employee',
            'text' => ['en' => 'Select Employee', 'id' => 'Pilih Karyawan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'edit_item',
            'text' => ['en' => 'Edit Item', 'id' => 'Edit Barang'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'created_date',
            'text' => ['en' => 'Created Date', 'id' => 'Tanggal Dibuat'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'edit_sell',
            'text' => ['en' => 'Edit Sell', 'id' => 'Ubah Penjualan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'filter_employee',
            'text' => ['en' => 'Filter Employee', 'id' => 'Filter Karyawan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'filter_company',
            'text' => ['en' => 'Filter Company', 'id' => 'Filter Perusahaan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'filter_date',
            'text' => ['en' => 'Filter Date', 'id' => 'Filter Tanggal'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'select_company',
            'text' => ['en' => 'Select Company', 'id' => 'Pilih Perusahaan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'date',
            'text' => ['en' => 'Date', 'id' => 'Tanggal'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'last_update',
            'text' => ['en' => 'Last Update', 'id' => 'Terakhir Diupdate'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'price_total',
            'text' => ['en' => 'Total Price', 'id' => 'Jumlah Harga'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'discount_total',
            'text' => ['en' => 'Total Discount', 'id' => 'Jumlah Potongan'],
        ]);
        LanguageLine::create([
            'group' => 'multilingual',
            'key' => 'total',
            'text' => ['en' => 'Total', 'id' => 'Jumlah'],
        ]);
    }
}
