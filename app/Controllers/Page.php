<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;
use App\Models\AboutModel;
use App\Models\TestimonialModel;

class Page extends Controller
{
    public function index()
    {
        $menu = new MenuModel();
        $about = new AboutModel();
        $testimonial = new TestimonialModel();
        $data = [
            'title' => 'Dam|ThaiTea',
            'menu' => $menu->get(),
            'about' => $about->get(1),
            'testimonial' => $testimonial->get(),
        ];
        return view('apps/index', $data);
    }
}