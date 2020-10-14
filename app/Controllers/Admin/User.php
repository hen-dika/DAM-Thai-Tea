<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\UserModel;


class User extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dam|User',
            'validation' => \Config\Services::validation(),
        ];   
        return view('admin/pages/user/index', $data);
    }

    public function read()
    {
        $model = new UserModel();
        echo json_encode($model->get());
    }

    public function create()
    {
        $session = session();
        helper(['form']);
        $data = [
            'title' => 'Dam|Add user',
            'uri' => new \CodeIgniter\HTTP\URI(),
            'validation' => \Config\Services::validation()
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'role' => 'required',
                'password' => 'required|min_length[8]|max_length[255]',
                're-password' => 'matches[password]',
            ];

            if (! $this->validate($rules)) {
                $session->setFlashdata('warning', 'Some input is wrong');
                return redirect()->to('/admin/user/create')->withInput();
            } else {
                $model = new UserModel();
                $newData = [
                    'first_name' => $this->request->getVar('firstname'),
                    'last_name' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'role' => $this->request->getVar('role'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session->setFlashdata('success', 'New user added successfully');
                return redirect()->to('/admin/user');
            }      
        }   
        return view('admin/pages/user/create', $data);
    }    
    public function profile()
    {
        $model = new UserModel();
        $session = session();
        helper(['form']);
        $data = [
            'title' => 'Dam|Edit profile',
            'uri' => new \CodeIgniter\HTTP\URI(),
            'validation' => \Config\Services::validation()
        ];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
            ];

            if($this->request->getPost('password') != ''){
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['re-password'] = 'matches[password]';
            }else if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $newData = [
                    'id' => session()->get('id'),
                    'first_name' => $this->request->getPost('firstname'),
                    'last_name' => $this->request->getPost('lastname'),
                    ];
                    if($this->request->getPost('password') != ''){
                        $newData['password'] = $this->request->getPost('password');
                    }
                $model->save($newData);
                $session->setFlashdata('success', 'Your profile has been successfully updated');
                return redirect()->to('/admin/dashboard');
            }
        }
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('admin/pages/user/profile', $data);
    }

    public function delete()
    {
        $model = new UserModel();
        $session = session();
        $id = $this->request->getVar('id-delete');
        $model->delete($id);
        $session->setFlashdata('danger', 'Data has been successfully deleted');
        return redirect()->to('/admin/user');
    }
}