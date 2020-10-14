<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\CategoryModel;

class Category extends Controller {

	protected $category;

	public function __construct()
	{
		$this->category = new CategoryModel();
	}

	public function index()
	{
		$data['title'] = 'Dam|Category menu';
		return view('admin/pages/category/index', $data);			
	}

	public function create()
	{
		$this->category->save([
			'name' => $this->request->getVar('category')
		]);
		session()->setFlashdata('success', 'New category has been successfully added');
		return redirect()->to('/admin/category');
	}

	public function read()
	{
		$data = $this->category->get();
		echo json_encode($data);
	}

	public function update()
	{
		$this->category->save([
			'id' => $this->request->getVar('id-edit'),
			'name' => $this->request->getVar('category-edit')
		]);
		session()->setFlashdata('success', 'Your category has been successfully updated');
		return redirect()->to('/admin/category');
	}

	public function delete()
	{
		$id = $this->request->getVar('id-delete');
		$this->category->delete($id);
		session()->setFlashdata('warning', 'Your category has been deleted');
		return redirect()->to('/admin/category');
	}


}