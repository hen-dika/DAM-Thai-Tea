<?php namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
   protected $table = 'about_us';
   protected $useTimestamps = true;
   protected $allowedFields = ['meta_title','meta_description','meta_keyword','phone','emai','facebook','twitter','instagram'];

   public function get($id = false)
   {
       if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id'=>$id])->first();
   }
}