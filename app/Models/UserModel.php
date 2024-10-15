<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'admin_list'; 
    protected $primaryKey = 'admin_id'; 
    protected $allowedFields = ['name', 'email', 'password', 'username', 'contat']; 

    public function insertData($data)
    {
        return $this->insert($data);
    }
}
?>