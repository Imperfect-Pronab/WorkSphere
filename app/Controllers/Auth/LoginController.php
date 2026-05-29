<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function process()
    {
        $session = session();
        $UserModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $UserModel->where('email', $email)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'user_id'    => $user['id'],
                    'user_name'  => $user['name'],
                    'user_role'  => $user['role'],
                    'isLoggedIn' => true
                ];
                session()->set($sessionData);
                $session->setFlashdata('success', "You have logged in successfully.");
                if ($user['role'] == 'super_admin') {
                    return redirect()->to('/admin/dashboard');
                } elseif ($user['role'] == 'hr') {
                    return redirect()->to('/hr/dashboard');
                } else {
                    return redirect()->to('/employee');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        session()->remove([
            'user_id',
            'user_name',
            'user_role',
            'isLoggedIn'
        ]);
        return redirect()->to('/login')->with('success', 'You have logged out successfully.');
    }

    public function getHashedPassword()
    {
        return view('admin/hashedpassword/hashedpassword');
    }

    public function getHashedPasswordByAdmin()
    {
        $password = $this->request->getPost('password');
        $data = array();
        $data['hashed_password'] = password_hash($password, PASSWORD_DEFAULT);
        return view('admin/hashedpassword/hashedpassword', $data);
    }
}
