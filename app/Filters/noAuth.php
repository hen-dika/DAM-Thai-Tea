<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class noAuth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        if(session()->get('isLoggedIn')){
            return redirect()->to('/admin/admin');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
