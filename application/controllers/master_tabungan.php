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

	public function index($params = null)
	{
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));
		$menu = $this->userdb->get_menu($userdata);
		// $no_rekening = $this->no_rekening();
		$data = array(
			'link' => 'master_tabungan_view.php',
			'menu' => $menu,
			'userdata' => $userdata,
			'edit' => '',
			'edit_mode' => false,
			'action' => 'save'
		);
		
		if(!empty($params))
		{
			$edit = $this->get_db->do_read_row($params);
			
			if(!empty($edit))
			{
				$data['edit'] = $edit;
				$data['edit_mode'] = true;
				$data['action'] = 'edit';
			} 
		}

		$this->load->view('index_view', $data);
	}

	public function list_data()
	{
		$list_data = $this->get_db->do_read();
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));

		$data = array(
			'link' => 'master_tabungan_list_view.php',
			'userdata' => $userdata,
			'list_data' => $list_data
		);

		$this->load->view('index_view', $data);
	}

	public function save()
	{
		$data = $this->input->post();
		unset($data['mt_id']);

		$save = $this->get_db->do_save($data);
		redirect("master_tabungan");
	}

	public function edit()
	{	
		$data = $this->input->post();
		$id = $data['mt_id'];
		unset($data['mt_id']);

		$edit = $this->get_db->do_edit($data, $id);
		redirect("master_tabungan/list_data");
	}

	public function delete($params)
	{
		$del = $this->get_db->do_delete($params);

		if($del)
			echo 'success';
		else
			echo 'failed delete data, please check code!';
		// return false;
	}

	public function no_rekening()
	{
		$no_rekening = $this->get_db->get_idx_nasabah();

		if(empty($index_nasabah))
			$new_index_nasabah = 1;
		else
			$new_index_nasabah = $index_nasabah['index_nasabah'] + 1;

		$new_index_nasabah = sprintf("%06d", $new_index_nasabah);	
		$year = substr(date('Y'), 1);
		$class = sprintf("%02d", '1');
		$random = rand(100, 999);

		$id_nasabah = $new_index_nasabah.$class.$year.$random;
		return $id_nasabah;
	}

}

