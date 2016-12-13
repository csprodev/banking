<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		$this->load->model('userdb');
		// $this->userdb->updateLastLogout();
		delete_cookie('user_member');
		$this->session->unset_userdata('user');
		redirect();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
