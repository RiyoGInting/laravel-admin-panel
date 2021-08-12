<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }

        return view('welcome');
    }

    public function switch($locale)
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }

    public function timezone($tz)
    {
        Session::put('timezone', $tz);

        return redirect()->back();
    }
}
