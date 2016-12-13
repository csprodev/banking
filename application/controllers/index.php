<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

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
		$data['userdata'] = $this->userdb->getLoginInfo($this->session->userdata('user'));
		$this->load->view('index_view', $data);
	}
	
}


