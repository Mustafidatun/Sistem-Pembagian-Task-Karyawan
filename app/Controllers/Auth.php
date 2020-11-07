<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
// use App\Models\KaryawanModel;

class Auth extends BaseController
{
    public function __construct()
    {   
        $this->userModel = new \App\Models\LoginModel();
    }     

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('/auth/login', $data);
    }

    public function login()
    {
        $data['validation'] = $this->validation;
        if($this->request->getPost()){
            //jika tidak tervalidasi
            if(!$this->validate([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'{field} harus diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'{field} harus diisi'
                    ]
                ]
            ])){
                // dd($data);
                return redirect()->to('/auth/index')->withInput()->with('validation', $this->validation);
            }else{
                $username = $this->request->getPost('username');
                $password = md5($this->request->getPost('password'));
                
                $vaData = $this->userModel->getvalidasi($username,$password)->getResult();
                // echo $row[0]->id_login;
                if(!empty($vaData)){
                    foreach($vaData as $data){
                    // if ($data->username == $username && $data->password = $password){		
                        $sessionData = [
                            'id_karyawan'   => $data->id_karyawan,
                            'username'      => $data->username,
                            'userlevel'     => $data->user_level,
                            'isLoggedIn'    => TRUE,
                        ];				
                        $this->session->set($sessionData);			
                        return redirect()->to('/home/index');
                    }
                }else{
                    $this->session->setFlashdata('errors', 'User Tidak Ditemukan');
                    return redirect()->to('/auth/index');
                }
            }

        }

        return view('/auth/login', $data);
    }

    public function logout(){
        $this->session->destroy();
		return redirect()->to('/auth/index');
    }

    public function login2()
    {
        if($this->request->getPost())
        {
            // $loginModel = new LoginModel();
            //lakukan validasi untuk data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');
            dd($this->validation->getErrors());
			$errors = $this->validation->getErrors();
            
            if($errors)
            {
                return view('auth/login');
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $login = $loginModel->where('username', $username)->first();

            if($user)
            {
                $salt = $user->salt;
                if($user->password !== md5(salt.$password))
                {
                    $this->session->setFlashdata('errors',['Password salah']);
                }else{
                    $sessData = [
                        'id'       => $user->id_login,
                        'username' => $user->username,
                        'userlevel'=> $user->user_level,
                        'isLoggedIn'=> TRUE,
                    ];

                    $this->session->set($sessData);

                    return redirect()->to(site_url('pages/dashboard'));
                }
            }else{
                $this->session->setFlashdata('errors', ['User Tidak Ditemukan']);
            }
        }
        return view('auth/login');
    }

    public function lupa_password(){
        echo view('auth/lupa_password');
    }
}