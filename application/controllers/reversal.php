<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reversal extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('userdb');
		$this->load->model('master_tabungan_model', 'get_db');
		if($this->session->userdata('user') == '') {
        	redirect('login');
        }
    }

	public function index($params = null)
	{
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));

		$this->load->view('reversal_view');
	}

}

