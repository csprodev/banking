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
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));
		$menu = $this->userdb->get_menu($userdata->usr_id);
		
		$data = array(
			'link' => 'home_view.php',
			'userdata' => $userdata,
			'menu' => $menu
		);
		
		$this->load->view('index_view', $data);
	}
	
}


