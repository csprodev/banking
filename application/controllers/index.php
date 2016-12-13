<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$allow = $this->CheckAllow();
		if((stripos($_SERVER["REQUEST_URI"],'login') === FALSE)) {
			if(!$allow) {
				redirect('login');
			}
			// if(!$this->uri->segment(2))
			// 	$this->index();
		} else {
			if($allow) {
				$this->index();
			}
		}
	}

	public function index()
	{
		if($this->session->userdata('user')) {
			$this->load->view('index_view');
		} else {
			redirect('login');
		}
	}

	function CheckAllow()
	{
		$return = false;
		$user = $this->getLoginInfo();
		if($user != null)
			$return = true;
		return $return;
	}

	function getLoginInfo()
	{
		$this->load->model('userdb');
		$username = $this->session->userdata('user');
		if($username == '') {
			$username = get_cookie('user');
		}
		if($username != '') {
			$user = $this->userdb->getLoginInfo($username);
			//$user->fullname = 'Hello World';
		}
		else
			$user = null;
		return $user;
	}
}


