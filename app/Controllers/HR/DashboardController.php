<?php

namespace App\Controllers\HR;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('hr/dashboard');
    }
}
