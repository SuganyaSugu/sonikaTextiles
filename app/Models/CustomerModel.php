<?php
namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer_list'; 
    protected $primaryKey = 'customer_id'; 
    protected $allowedFields = ['fullname', 'email', 'password', 'username', 'contact', 'status']; 

    public function insertData($data)
    {
        return $this->insert($data);
    }
}
?>