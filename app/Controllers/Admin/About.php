<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\AboutModel;

class About extends Controller
{
    public function index()
    {
        $session = session();
        helper(['form']);
        $about = new AboutModel();
        $id = 1;
        $data = [
            'title' => 'Dam|About Us',
            'uri' => new \CodeIgniter\HTTP\URI(),
            'validation' => \Config\Services::validation()
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
            ];
            if (! $this->validate($rules)) {
                $session->setFlashdata('warning', 'Data you entered is wrong, please check again');
                return redirect()->to('/admin/menu/about')->withInput();
            } else {
                $newData = [
                    'id' => $id,
                    'meta_title' => $this->request->getVar('meta_title-name'),
                    'meta_description' => $this->request->getVar('meta_description'), 
                    'meta_keyword' => $this->request->getVar('meta_keyword'),
                    'phone' => $this->request->getVar('phone'), 
                    'email' => $this->request->getVar('email'),
                    'facebook' => $this->request->getVar('facebook'),
                    'twitter' => $this->request->getVar('twitter'),
                    'instagram' => $this->request->getVar('instagram')
                ];
                $about->save($newData);
                $session->setFlashdata('success', 'Abour us updated successfully');
                return redirect()->to('/admin/about');
            }
        }
        $data['about'] = $about->where('id', $id)->first();
        return view('admin/pages/about/index', $data);
    }
}