<?php 

namespace App\Models;
use CodeIgniter\Model;
 
class CustomerModel extends Model
{
    protected $table = 'tb_customer';
     
    public function getCustomer()
    {
        return $this->findAll();
       
    }
}