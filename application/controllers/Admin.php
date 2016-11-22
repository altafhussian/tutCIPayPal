<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->model('AddProductModel');

		$this->data['products'] = $this->AddProductModel->get_product();
		$this->load->view('adminView', $this->data);

	}

	public function AddProduct(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Product Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('price', 'Price', 'required|xss_clean|callback_check_price');

		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  User redirected to login page
			$this->load->view('adminView');
		}
		else
		{
			$data = array(
					'name' => $this->input->post('name'),
					'price' => $this->input->post('price'),
			);

			$this->load->model('AddProductModel');

			$this->AddProductModel->insert_product($data);
			$this->data['products'] = $this->AddProductModel->get_product();
			$this->load->view('adminView', $this->data);
		}
	}



	function check_price($price){

		$res = preg_replace('/[^0-9\.\-]+/','',$price);
		if(!$res){
			$this->form_validation->set_message('check_price', 'Invalid Price');
			return false;
		}else {
			return true;
		}

	}
}
