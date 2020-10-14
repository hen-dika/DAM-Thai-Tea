<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
// use Codeigniter\Controller;

class Login extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);


        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        else if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[3]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'We couldn’t find an account matching the email and password you entered. Please check your email and password and try again.'
                ]
            ];

            if (! $this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserSession($user);
                //$session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/admin/dashboard');

            }
        }
        return view('admin/login'); 
    }

    private function setUserSession($user){
        $data = [
            'id' => $user['id'],
            'firstname' => $user['first_name'],
            'lastname' => $user['last_name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}