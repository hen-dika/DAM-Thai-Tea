<?php namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table = 'testimonials';
    protected $useTimestamps = true;
    protected $allowedFields = ['name','username','testimoni','image','status'];

    public function get()
    {
        return $this->findAll();
    }
}