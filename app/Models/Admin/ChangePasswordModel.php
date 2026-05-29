<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ChangePasswordModel extends Model
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
    public function checkOldPassword($adminId, $oldpassword, $newpassword)
    {
        $response = false;
        $admin = $this->find($adminId);
        if (password_verify($oldpassword, $admin['password'])) {
            $newHash = password_hash($newpassword, PASSWORD_DEFAULT);
            $this->update($adminId, [
                'password' => $newHash
            ]);
            $response = true;
        }
        return $response;
    }
}
