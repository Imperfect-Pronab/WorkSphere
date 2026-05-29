<?php

namespace App\Controllers\Admin;

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
        return view('admin/employee/employeelist', $data);
    }
}
