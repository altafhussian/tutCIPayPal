<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('loginView');
	}

	public function logout()
	{
			$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
					if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
							$this->session->unset_userdata($key);
					}
			}
			$this->session->sess_destroy();
			redirect('login');
	}
}
