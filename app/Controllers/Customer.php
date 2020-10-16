<?php namespace App\Controllers;

class Customer extends BaseController
{
	public function __construct()
    {   
        $this->customer_model = new \App\Models\CustomerModel();
	}     
	
	public function index()
	{
		$data['customer'] = $this->customer_model->getCustomer();
		//dd($data);
		echo view('pages/customer', $data);
	}
}
