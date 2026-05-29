<?php

namespace App\Controllers\HR;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EmployeeController extends BaseController
{
    public function index()
    {
        return view('hr/employee/employeelist');
    }
}
