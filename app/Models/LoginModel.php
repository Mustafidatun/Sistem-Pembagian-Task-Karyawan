<?php 

namespace App\Models;
use CodeIgniter\Model;
 
class LoginModel extends Model
{
    protected $table = 'tb_login';

    public function getvalidasi($username,$password){
        $builder = $this->db->table('tb_login');
        $builder->select('*');
        $builder->where('username', $username);
        $builder->where('password', $password);
        $query = $builder->get();
		//hanya mengambil 1 data dari database yang telah di where 
		return $query;	 
    }
}