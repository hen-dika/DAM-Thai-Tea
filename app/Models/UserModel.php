<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'users';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'password', 'role' ];
    protected $useTimestamps = true;

    public function get($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
