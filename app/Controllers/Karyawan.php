<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    public function __construct(){   
        $this->karyawan_model = new \App\Models\KaryawanModel();
    }  
    
    public function index()
    {
        // $model = new KaryawanModel();
        $data['karyawan'] = $this->karyawan_model->getKaryawan();
        echo view('pages/karyawan', $data);
    }

    public function tambah_karyawan()
    {
        $data['divisi'] = $this->karyawan_model->getDivisi();
        $data['validation'] = \Config\Services::validation();

        if($this->request->getPost()){
            //jika tidak tervalidasi
            if(!$this->validate([
                'nama_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama karyawan harus diisi'
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Tempat lahir harus diisi'
                    ]
                ],
                'no_telp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nomor Telepon harus diisi'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Alamat harus diisi'
                    ]
                ],
                'id_divisi' => [
                    'rules' => 'required|in_list['.implode(array_keys($data["divisi"]),',').']',
                    'errors' => [
                        'required'=>'Divisi harus diisi'
                    ]
                ],
            ])){
                // dd($data);
                return redirect()->to('/karyawan/tambah_karyawan')->withInput()->with('validation', $this->validation);
            }else{
                $data = array(
                        'id_karyawan'   => "00001K3",
                        'nama_karyawan' => $this->request->getPost('nama_karyawan'),
                        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                        'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                        'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
                        'alamat'        => $this->request->getPost('alamat'),
                        'no_telp'       => $this->request->getPost('no_telp'),
                        'id_divisi'     => $this->request->getPost('id_divisi'),
                        );
                $this->karyawan_model->simpanKaryawan($data);
                return redirect()->to('/karyawan');
            }

        }
        echo view('pages/karyawan_tambah', $data);
    }

    public function edit_karyawan($id_karyawan){
        $data['karyawan'] = $this->karyawan_model->getKaryawan($id_karyawan);
        $data['divisi'] = $this->karyawan_model->getDivisi();
        $data['validation'] = \Config\Services::validation();
        
            // print_r($data['karyawan']);
            echo view('pages/karyawan_edit', $data);
    }

    public function edit($id_karyawan){
        if($this->request->getPost()){
            //jika tidak tervalidasi
            if(!$this->validate([
                'nama_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama karyawan harus diisi'
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Tempat lahir harus diisi'
                    ]
                ],
                'no_telp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nomor Telepon harus diisi'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Alamat harus diisi'
                    ]
                ],
                'id_divisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Divisi harus diisi'
                    ]
                ],
            ])){
                //in_list['.implode(array_keys($data["divisi"]),',').']
                // dd($data);
                return redirect()->to('/karyawan/edit_karyawan/'.$id_karyawan)->withInput()->with('validation', $this->validation);
            }else{
                $data = array(
                        'id_karyawan'   => $id_karyawan,
                        'nama_karyawan' => $this->request->getPost('nama_karyawan'),
                        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                        'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                        'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
                        'alamat'        => $this->request->getPost('alamat'),
                        'no_telp'       => $this->request->getPost('no_telp'),
                        'id_divisi'     => $this->request->getPost('id_divisi'),
                        );

                    // print_r($data);
                $this->karyawan_model->editKaryawan($data, $id_karyawan);
                return redirect()->to('/karyawan');
            }

        }
    }

    public function simpan()
    {
        // $data = [];
    
        // if($this->request->getMethod() == 'post'){
        //     $rules = [
        //         'id_karyawan' => 'required'
        //     ];

        //     if($this->validate($rules)){

        //     }else{
        //         $data['validation'] = $this->validator;
        //         return redirect()->to('/karyawan_add_view');
        //     }
        // }

        

        // if ($this->request->getMethod() === 'post')
        // {
        //     $model = new KaryawanModel();
        //     $data = array(
        //         'id_karyawan'   => $this->request->getPost('id_karyawan'),
        //         'nama_karyawan' => $this->request->getPost('nama_karyawan'),
        //         'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        //         'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
        //         'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
        //         'alamat'        => $this->request->getPost('alamat'),
        //         'no_telp'       => $this->request->getPost('no_telp'),
        //         'id_divisi'     => $this->request->getPost('id_divisi'),
        //     );
        //     $model->simpanKaryawan($data);
        //     return redirect()->to('/karyawan');
        // }else{
        //     echo "Tidak tersimpan";
        // }

    }
}