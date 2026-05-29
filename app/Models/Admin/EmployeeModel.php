<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $protectFields    = true;
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'role',
        'status'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'object';
    public function getAllEmployee()
    {
        return $this->where('role', 'employee')->findAll();
    }
}
