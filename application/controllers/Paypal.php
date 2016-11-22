<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller
{
     function  __construct(){
        parent::__construct();
        $this->load->library('Paypal_lib');
        $this->load->model('AddProductModel');
     }

     function success(){
        //get the transaction data
        $paypalInfo = $this->input->get();

        $data['product_id'] = $paypalInfo['item_number'];
        $data['txn_id'] = $paypalInfo["tx"];
        $data['payment_gross'] = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['payment_status'] = $paypalInfo["st"];

        $this->insertTransaction($data);

        //pass the transaction data to view
        $this->load->view('success', $data);

     }

     //insert transaction data
      public function insertTransaction($data = array()){
          $insert = $this->db->insert('payments',$data);
          return $insert ? true : false;
      }

     function cancel(){
        $this->load->view('cancel');
     }

     function ipn(){
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();

        $data['user_id'] = $paypalInfo['custom'];
        $data['product_id']    = $paypalInfo["item_number"];
        $data['txn_id']    = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["payment_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];

        $this->load->library('paypal_lib');

        $paypalURL = $this->paypal_lib->paypal_url;
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);

        //check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result)){
            //insert the transaction data into the database

            $this->load->contrller('Admin');
            $this->Admin->insertTransaction($data);
        }
    }
}
