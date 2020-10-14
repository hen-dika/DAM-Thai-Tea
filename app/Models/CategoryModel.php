<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    
    protected $table = 'categories';
    protected $useTimestamps = true;
    protected $allowedFields = ['name'];
   
    public function get($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}