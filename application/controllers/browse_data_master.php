<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browse_data_master extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('userdb');
        if($this->session->userdata('user') == '') {
        	redirect('login');
        }
    }

	public function index()
	{
		$userdata= $this->userdb->getLoginInfo($this->session->userdata('user'));
		// $data = array(
		// 	'link' => 'index_view.php',
		// 	'userdata' => $userdata
		// );
		// $this->load->view('index_view', $data);
		$this->tabungan();
	}

	public function tabungan()
	{
		$userdata= $this->userdb->getLoginInfo($this->session->userdata('user'));
		$data = array(
			'link' => 'tabungan_view.php',
			'userdata' => $userdata
		);
		$this->load->view('index_view', $data);
	}

	public function kredit()
	{
		$userdata= $this->userdb->getLoginInfo($this->session->userdata('user'));
		$data = array(
			'link' => 'kredit_view.php',
			'userdata' => $userdata
		);
		$this->load->view('index_view', $data);
	}
	
}


