<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_kredit extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('userdb');
        $this->load->model('master_kredit_model', 'get_db');
    }

	public function index($params = null)
	{
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));
		$data = array(
			'link' => 'master_kredit_view.php',
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
			'link' => 'master_kredit_list_view.php',
			'userdata' => $userdata,
			'list_data' => $list_data
		);

		$this->load->view('index_view', $data);
	}

	public function save()
	{
		$data = $this->input->post();
		$save = $this->get_db->do_save($data);
		$data['mk_tanggal_tempo'] = date_format(date_create($data['mk_tanggal_tempo']),'Y-m-d');
		unset($data['mk_id']);

		redirect("master_kredit");
	}

	public function edit()
	{	
		$data = $this->input->post();
		$data['mk_tanggal_tempo'] = date_format(date_create($data['mk_tanggal_tempo']),'Y-m-d');
		$id = $data['mk_id'];
		unset($data['mk_id']);

		$edit = $this->get_db->do_edit($data, $id);
		redirect("master_kredit/list_data");
	}

	public function delete($params)
	{
		$del = $this->get_db->do_delete($params);

		if($del)
			echo 'success';
		else
			echo 'failed delete data, please check code!';
	}

}
