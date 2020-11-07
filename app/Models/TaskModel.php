<?php 

namespace App\Models;
use CodeIgniter\Model;
 
class TaskModel extends Model
{
    protected $table = 'tb_task';
     
    public function ambilDataTaskLama(){
        $builder = $this->db->table('tb_task');
        $builder->select('*');
        $builder->where("id_divisi <> '' ");
        $query = $builder->get();
        return $query->getResult();
    }

    public function ambilDataTaskBaru(){
        $builder = $this->db->table('tb_task');
        $builder->select('*');
        $builder->where("id_divisi IS NULL OR id_divisi = '' ");
        $query = $builder->get();
        return $query->getResult();
    }

    public function uploadKata($kataTask, $idTask){
        $builder = $this->db->table('tb_kata_task');
        $builder->select('id_kata, jumlah');
        $builder->where('kata_task', $kataTask);
        $builder->where('id_task', $idTask);
        $query = $builder->get();
        $result = $query->getRow();

        if(isset($result)){
            $id_kata = $result->id_kata;
            $jumlah = $result->jumlah;
            $jumlah++;
            $query = $this->db->table('tb_kata_task')->update(['jumlah'=>$jumlah], ['id_kata'=>$id_kata]);
        }else{
            $data = [
                'id_task'   => $idTask,
                'kata_task' => $kataTask,
                'jumlah'    => 1,
            ];
            $query = $this->db->table('tb_kata_task')->insert($data);
        }
        return $query;	
    }

    public function pembobotanTFIDF(){
        $builder = $this->db->table('tb_kata_task');
        $builder->select('*');
        $builder->countAll();
        $builder->groupBy('id_task'); 
        $query = $builder->get();
        $result = $query->getRow();

        dd($result);
    }
}