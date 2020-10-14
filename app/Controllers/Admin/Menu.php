<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\MenuModel;
use App\Models\CategoryModel;

class Menu extends Controller {

	protected $menu;
	protected $category;

	public function __construct()
	{
		session();
		$this->menu = new MenuModel();
		$this->category = new CategoryModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Dam|Menu',
			'uri' => new \CodeIgniter\HTTP\URI(),
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/menu/index', $data);			
	}

	public function read()
	{
		$data = $this->menu->get();
		echo json_encode($data);
	}

	public function create()
	{
		$session = session();
		helper(['form']);
		$data = [
			'title' => 'Dam|Add menu',
			'category' => $this->category->get(),
			'uri' => new \CodeIgniter\HTTP\URI(),
			'validation' => \Config\Services::validation()
		];
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'menu-name' => 'required',
				'menu-price' => 'required|integer',
				'menu-description' => 'max_length[255]',
				'menu-category' => 'required',
				'menu-image' => 'uploaded[menu-image]|max_size[menu-image,1024]|is_image[menu-image]|mime_in[menu-image,image/jpg,image/jpeg,image/png]'
			];
			if (! $this->validate($rules)) {
				$session->setFlashdata('warning', 'Data you entered is wrong, please check again');
				return redirect()->to('/admin/menu/create')->withInput();
			} else {
				$fileUpload = $this->request->getFile('menu-image');
				$fileUpload->move('images/uploads');
				$newData = [
					'name' => $this->request->getVar('menu-name'),
					'description' => $this->request->getVar('menu-description'), 
					'image' => $fileUpload->getName(),
					'price' => $this->request->getVar('menu-price'), 
					'status' => $this->request->getVar('status'),
					'category_id' => $this->request->getVar('menu-category')
				];
				// dd($newData);
				$this->menu->save($newData);
				$session->setFlashdata('success', 'New menu added successfully');
				return redirect()->to('/admin/menu');
			}
		}
		return view('admin/pages/menu/create', $data);
	}

	public function edit($id = false)
	{
		$session = session();
		helper(['form']);
		$data = [
			'title' => 'Dam|Edit menu',
			'category' => $this->category->get(),
			'uri' => new \CodeIgniter\HTTP\URI(),
			'validation' => \Config\Services::validation()
		];
		if ($id == false) {
			if ($this->request->getMethod() == 'post') {
				$id = $this->request->getPost('id');
				$rules = [
					'menu-name' => 'required|alpha',
					'menu-price' => 'required|integer',
					'menu-description' => 'max_length[255]',
					'menu-category' => 'required',
				];

				if($this->request->getPost('menu-image') != ''){
					$rules['menu-image'] = 'uploaded[menu-image]|max_size[menu-image,1024]|is_image[menu-image]|mime_in[menu-image,image/jpg,image/jpeg,image/png]';
				}else if (! $this->validate($rules)) {
					$session->setFlashdata('warning', 'Data you entered is wrong, please check again');
					return redirect()->to('/admin/menu/edit/'.$id)->withInput();
				}else{
					$newData = [
						'id' => $id,
						'name' => $this->request->getPost('menu-name'),
						'description' => $this->request->getPost('menu-description'), 
						'price' => $this->request->getPost('menu-price'), 
						'status' => $this->request->getPost('status'),
						'category_id' => $this->request->getPost('menu-category')
					];
					if($this->request->getPost('menu-image') != ''){
						$fileUpload = $this->request->getFile('menu-image');
						$fileUpload->move('images/uploads');
						$newData['image'] = $fileUpload->getName();
					}
					$this->menu->save($newData);
					session()->setFlashdata('success', 'Your menu has been successfully updated');
					return redirect()->to('/admin/menu');
				}
			}
		}
		
		$data['menu'] = $this->menu->where('id', $id)->first();
		return view('admin/pages/menu/edit', $data);
	}

	public function delete()
	{
		$id = $this->request->getVar('id');
		$this->menu->delete($id);
		session()->setFlashdata('danger', 'Menu has been deleted from list menus');
		return redirect()->to('/admin/menu');
	}
}