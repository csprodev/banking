<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_nasabah extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('userdb');
        $this->load->model('master_nasabah_model', 'get_db');
    }

	public function index()
	{
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));
		$data = array(
			'link' => 'master_nasabah_view.php',
			'userdata' => $userdata
		);

		$this->load->view('index_view', $data);
	}

	public function list_data()
	{
		// $list_data = $this->get_db->do_read();
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));

		$data = array(
			'link' => 'master_nasabah_list_view.php',
			'userdata' => $userdata,
		);

		$this->load->view('index_view', $data);
	}

	public function save()
	{
		$data = $this->input->post();

		$save = $this->get_db->do_save($data);

		redirect("master_nasabah");
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
