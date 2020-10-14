<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\TestimonialModel;

class Testimonial extends Controller {

	public function __construct()
	{
		session();
	}

	public function index()
	{
		$data = [
			'title' => 'Dam|Testimonial',
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/testimonial/index', $data);			
	}

	public function read()
	{
		$testimonial = new TestimonialModel();
		$data = $testimonial->get();
		echo json_encode($data);
	}

	public function create()
	{
		$session = session();
		helper(['form']);
		$data = [
			'title' => 'Dam|Testimonial',
			'uri' => new \CodeIgniter\HTTP\URI(),
			'validation' => \Config\Services::validation()
		];
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'name' => 'required',
				'username' => 'required',
				'testimonial' => 'required',
				'status' => 'required',
				'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
			];
			if (! $this->validate($rules)) {
				$session->setFlashdata('warning', 'Data entered is wrong, please check again');
				return redirect()->to('/admin/testimonial/create')->withInput();
			} else {
				$fileUpload = $this->request->getFile('image');
				$fileUpload->move('images/uploads/testimonials');
				$newData = [
					'name' => $this->request->getVar('name'),
					'username' => $this->request->getVar('username'),
					'testimoni' => $this->request->getVar('testimonial'),
					'status' => $this->request->getVar('status'),
					'image' => $fileUpload->getName(),
				];
				// dd($newData);
				$testimonial = new TestimonialModel();
				$testimonial->save($newData);
				$session->setFlashdata('success', 'New testimonial added successfully');
				return redirect()->to('/admin/testimonial');
			}
		}
		return view('admin/pages/testimonial/create', $data);
	}

	public function edit($id = false)
	{
		$session = session();
		helper(['form']);
		$testimonial = new TestimonialModel();
		$data = [
			'title' => 'Dam|Edit testimonial',
			'uri' => new \CodeIgniter\HTTP\URI(),
			'validation' => \Config\Services::validation()
		];
		if ($id == false) {
			if ($this->request->getMethod() == 'post') {
				$id = $this->request->getPost('id');
				$rules = [
					'name' => 'required',
					'username' => 'required',
					'testimonial' => 'required',
					'status' => 'required',
				];

				if($this->request->getPost('image') != ''){
					$rules['image'] = 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]';
				}else if (! $this->validate($rules)) {
					$session->setFlashdata('warning', 'Data you entered is wrong, please check again');
					return redirect()->to('/admin/testimonial/edit/'.$id)->withInput();
				}else{
					$newData = [
						'id' => $this->request->getVar('id'),
						'name' => $this->request->getVar('name'),
						'username' => $this->request->getVar('username'),
						'testimoni' => $this->request->getVar('testimonial'),
						'status' => $this->request->getVar('status'),
					];
					if($this->request->getPost('image') != ''){
						$fileUpload = $this->request->getFile('image');
						$fileUpload->move('images/uploads/testimonials');
						$newData['image'] = $fileUpload->getName();
					}
					$testimonial->save($newData);
					session()->setFlashdata('success', 'Your testimonial has been successfully updated');
					return redirect()->to('/admin/testimonial');
				}
			}
		}
		
		$data['testimonial'] = $testimonial->where('id', $id)->first();
		return view('admin/pages/testimonial/edit', $data);
	}

	public function delete()
	{
		$testimonial = new TestimonialModel();
		$id = $this->request->getVar('id');
		$testimonial->delete($id);
		session()->setFlashdata('danger', 'Menu has been deleted from list menus');
		return redirect()->to('/admin/testimonial');
	}
}