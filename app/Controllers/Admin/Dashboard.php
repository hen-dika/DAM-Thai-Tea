<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\MenuModel;
use App\Models\TestimonialModel;

class Dashboard extends Controller {

	public function index()
	{
		$menu = new MenuModel();
		$testimoni = new TestimonialModel(); 
		$data = [
			'uri' =>  service('uri'),
			'title' => 'Dam|Dashboard',
			'menu' => count($menu->get()),
			'testi' => count($testimoni->get()),
		];
		return view('admin/pages/dashboard', $data);			
	}

}