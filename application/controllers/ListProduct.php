<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListProduct extends CI_Controller {

	public function index()
	{
    $this->load->model('AddProductModel');

    $this->data['products'] = $this->AddProductModel->get_product();
    $this->load->view('listProductView', $this->data);
	}

  function buy($id){
        //Set variables for paypal form
        $returnURL = base_url().'index.php/Paypal/success'; //payment success url
        $cancelURL = base_url().'index.php/Paypal/cancel'; //payment cancel url
        $notifyURL = base_url().'index.php/Paypal/ipn'; //ipn url
        //get particular product data
        $this->load->model('AddProductModel');
        $product = $this->AddProductModel->get_product_data($id);

        $userID = 1; //current user id

        $this->load->library('paypal_lib');

        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $product[0]['name']);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $product[0]['id']);
        $this->paypal_lib->add_field('amount',  $product[0]['price']);

        $this->paypal_lib->paypal_auto_form();
    }

}
