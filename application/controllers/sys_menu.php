<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sys_menu extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('userdb');
        $this->load->model('sys_menu_model', 'get_db');
    }

	public function index($params = null)
	{
		$list_data = $this->get_db->do_read();
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));
		$menu = $this->userdb->get_menu($userdata->usr_id);
		$column_table = $this->get_db->do_get_column_table();

		$data = array(
			'menu' => $menu,
			'link' => 'sys_menu_view.php',
			'userdata' => $userdata,
			'list_data' => $list_data,
			'column_table' => $column_table
		);


		$this->load->view('index_view', $data);
	}

	public function data_edit($params = null)
	{
		$edit = array();

		if(!empty($params))
		{
			$edit = $this->get_db->do_read_row($params);

			// if($edit['fm_is_child'] == 1)
				// $edit['fm_title'] = 
		}

		echo json_encode($edit);
	}

	public function save()
	{
		$data = $this->input->post();
		$prefix_data = array();
		$scope = $data['is_scope'];

		unset($data['id']);
		unset($data['btnSave']);
		unset($data['is_scope']);

		if($scope == 'is_parent')
		{
			$data['is_parent'] = 1;
			unset($data['id_parent']);
		} 
		else 
		{
			$data['is_child'] = 1;
		}


		foreach ($data as $key => $value) 
		{
			if($key == 'is_active' || $key == 'is_child')
			{
				if($value == 'on') $value = 1;
				else $value = 0;
			}

			$prefix_data['sm_'.$key] = $value;
		}

		$save = $this->get_db->do_save($prefix_data);
		redirect("sys_menu");
	}

	public function edit()
	{	
		$data = $this->input->post();
		$id = $data['id'];
		$scope = $data['is_scope'];

		unset($data['id']);
		unset($data['btnSave']);
		unset($data['is_scope']);

		if($scope == 'is_parent')
		{
			$data['is_parent'] = 1;
			unset($data['id_parent']);
		} 
		else 
		{
			$data['is_child'] = 1;
		}


		foreach ($data as $key => $value) 
		{
			if($key == 'is_active' || $key == 'is_child')
			{
				if($value == 'on') $value = 1;
				else $value = 0;
			}

			$prefix_data['sm_'.$key] = $value;
		}

		print_r($prefix_data); exit;

		$edit = $this->get_db->do_edit($data, $id);
		redirect("sys_menu/list_data");
	}

	public function delete($params)
	{
		$del = $this->get_db->do_delete($params);

		if($del)
			echo 'success';
		else
			echo 'failed delete data, please check code!';
	}

	public function id_nasabah()
	{
		$index_nasabah = $this->get_db->get_idx_nasabah();

		if(empty($index_nasabah)) 	
			$new_index_nasabah = 1;
		else
			$new_index_nasabah = $index_nasabah['index_nasabah'] + 1;

		$new_index_nasabah = sprintf("%06d", $new_index_nasabah);	
		$year = substr(date('Y'), 1);
		$class = sprintf("%02d", '1');;
		$random = rand(100, 999);

		$id_nasabah = $new_index_nasabah.$class.$year.$random;
		return $id_nasabah;
	}

	public function check_upload($files)
	{
		echo '<pre>';
		foreach ($files as $key => $value)
		{
			print_r(strpos($value['type'], 'image')); exit;
		}
	}

	public function get_parent()
	{
		$data = $this->get_db->do_get_parent();
		echo json_encode($data);
	}

}
