<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category_list'; 
    protected $primaryKey = 'category_id'; 
    protected $allowedFields = ['name', 'date_created', 'status']; 

    public function insertData($data)
    {
        return $this->insert($data);
    }
}
?>