<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_tabungan extends CI_Controller 
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

	public function index()
	{
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));
		$data = array(
			'link' => 'master_tabungan_view.php',
			'userdata' => $userdata
		);

		$this->load->view('index_view', $data);
	}

	public function save()
	{
		$data = $this->input->post();

		$save = $this->get_db->do_save($data);

		echo $save;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
