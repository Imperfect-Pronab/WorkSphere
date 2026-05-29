<?php

namespace App\Controllers\HR;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\ChangePasswordModel;

class ChangePasswordController extends BaseController
{
    public function changePassword()
    {
        return view('hr/changepassword/changepassword');
    }

    public function changePasswordByAdmin()
    {
        $newpassword = $this->request->getPost('newpassword');
        $confirmpassword = $this->request->getPost('confirmpassword');
        $session = session();
        if ($newpassword === $confirmpassword) {
            $oldpassword = $this->request->getPost('oldpassword');
            $adminId = $session->get('user_id');
            $ChangePasswordModel = new ChangePasswordModel();
            $response = $ChangePasswordModel->checkOldPassword($adminId, $oldpassword, $newpassword);
            if ($response) {
                return redirect()->back()->with('success', 'Password updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Old password does not matched.');
            }
        } else {
            $session->setFlashdata('error', "New password and confirm password does not matched.");
            return redirect()->to(base_url('hr/changePassword'));
        }
    }
}
