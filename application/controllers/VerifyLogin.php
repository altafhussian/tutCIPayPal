<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_local');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('loginView');
   }
   else
   {
     $this->load->model('AddProductModel');

     $this->data['products'] = $this->AddProductModel->get_product();
     $this->load->view('adminView', $this->data);

   }
 }

 function check_local($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');

    if($username == "admin" && $password == "admin") {
      return true;
    } else {
      $this->form_validation->set_message('check_local', 'Invalid username or password');
      return false;
    }
  }

}
