<?php

namespace App\Controllers\HR;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\EmployeeModel;

class EmployeeController extends BaseController
{
    public function index()
    {
        $data = array();
        $EmployeeModel = new EmployeeModel();
        $data['employeelist'] = $EmployeeModel->getAllEmployee();
        return view('hr/employee/employeelist', $data);
    }
}
