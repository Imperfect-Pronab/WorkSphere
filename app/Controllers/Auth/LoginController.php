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
                if ($user['role'] == 'super_admin') {
                    return redirect()->to('/admin');
                } elseif ($user['role'] == 'hr') {
                    return redirect()->to('/hr');
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
        session()->destroy();
        return redirect()->to('/login');
    }
}
