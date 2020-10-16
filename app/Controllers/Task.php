<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KaryawanModel;

class Task extends Controller
{
    public function pembagian_task()
    {
        echo view('pages/task_pembagian');
    }

    public function task(){
        echo view('pages/task');
    }

    public function task_karyawan()
    {
        echo view('pages/task_karyawan');
    }

    public function detail_task_karyawan()
    {
        echo view('pages/task_karyawan_detail');
    }

    public function update_report()
    {
        echo view('pages/task_update_report');
    }

    public function riwayat_task()
    {
        echo view('pages/task_riwayat');
    }

    public function detail_riwayat_task()
    {
        echo view('pages/task_riwayat_detail');
    }
}