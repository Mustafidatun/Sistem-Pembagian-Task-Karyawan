<?php 

namespace App\Models;
use CodeIgniter\Model;
 
class KaryawanModel extends Model
{
    protected $table = 'tb_karyawan';
     
    public function getKaryawan($id_karyawan = ""){
        $hasil = [];

        if($id_karyawan == ""){
            
            $builder = $this->db->table('tb_karyawan');
            $builder->select('tb_karyawan.*,tb_divisi.divisi');
            $builder->join('tb_divisi', 'tb_divisi.id_divisi = tb_karyawan.id_divisi');
            $query = $builder->get();
            // foreach ($query->getResult() as $row){
            //     $hasil = [
            //         'id_karyawan'   => $row->id_karyawan,
            //         'nama_karyawan' => $row->nama_karyawan,
            //         'divisi'        => $row->divisi,
            //         'jenis_kelamin' => $row->jenis_kelamin,
            //         'no_telp'       => $row->no_telp,
            //         'tempat_lahir'  => $row->tempat_lahir,
            //         'tgl_lahir'     => $row->tgl_lahir,
            //         'alamat'        => $row->alamat,
            //     ];
            // }
            return $query->getResult();	 
        }else{
            // return $this->getWhere(['id_karyawan' => $id_karyawan]);
            $builder = $this->db->table('tb_karyawan');
            $builder->select('tb_karyawan.*,tb_divisi.*');
            $builder->join('tb_divisi', 'tb_divisi.id_divisi = tb_karyawan.id_divisi');
            $builder->where('id_karyawan', $id_karyawan);
            $query = $builder->get();
            // foreach ($query->getResult() as $row){
            //     $hasil = [
            //         'id_karyawan'   => $row->id_karyawan,
            //         'nama_karyawan' => $row->nama_karyawan,
            //         'divisi'        => $row->divisi,
            //         'jenis_kelamin' => $row->jenis_kelamin,
            //         'no_telp'       => $row->no_telp,
            //         'tempat_lahir'  => $row->tempat_lahir,
            //         'tgl_lahir'     => $row->tgl_lahir,
            //         'alamat'        => $row->alamat,
            //     ];
            // }
            return $query->getResult();	 
        }   
    }
 
    public function getDivisi(){
        $builder = $this->db->table('tb_divisi');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResult();	 
    }

    public function simpanKaryawan($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function editKaryawan($data, $id_karyawan){
        $query = $this->db->table($this->table)->update($data, ['id_karyawan' => $id_karyawan]);
        return $query;
    }
}