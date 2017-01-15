<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_nasabah extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('userdb');
        $this->load->model('master_nasabah_model', 'get_db');
    }

	public function index($params = null)
	{
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));

		$id_nasabah = $this->id_nasabah();

		$data = array(
			'link' => 'master_nasabah_view.php',
			'userdata' => $userdata,
			'edit' => '',
			'edit_mode' => false,
			'action' => 'save',
			'id_nasabah' => $id_nasabah
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
			'link' => 'master_nasabah_list_view.php',
			'userdata' => $userdata,
			'list_data' => $list_data
		);

		$this->load->view('index_view', $data);
	}

	public function save()
	{
		$data = $this->input->post();
		// $path_foto_nasabah = base_url()."assets/images/foto_nasabah/";
		$path_foto_nasabah = "assets/images/foto_nasabah";
		$path_ktp = base_url()."assets/images/ktp_nasabah";
		$img = 'image';


		$data['mn_tanggal_lahir'] = date_format(date_create($data['mn_tanggal_lahir']),'Y-m-d');
		unset($data['mn_id']);

		$data['mn_foto_nasabah'] = $_FILES['mn_foto_nasabah']['name'];
		// $data['mn_foto_ktp_nasabah'] = $_FILES['mn_foto_ktp_nasabah']['name'];
		$config['upload_path'] = $path_foto_nasabah;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';

		if(!empty($data['mn_foto_nasabah']))
		{
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload($img))
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error); exit;
				// $this->load->view('upload_form', $error);
			}
			else
			{
				$image = array('upload_data' => $this->upload->data());
			}
		}

		if(!empty($data['mn_foto_nasabah']))
		{
			$config['upload_path'] = $path_ktp;
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload($data['mn_foto_nasabah']))
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error); exit;
				// $this->load->view('upload_form', $error);
			}
			else
			{
				$image = array('upload_data' => $this->upload->data());
			}
		}
		
		$save = $this->get_db->do_save($data);

		redirect("master_nasabah");
	}

	public function edit()
	{	
		$data = $this->input->post();
		$data['mn_tanggal_lahir'] = date_format(date_create($data['mn_tanggal_lahir']),'Y-m-d');
		$id = $data['mn_id'];
		unset($data['mn_id']);

		$edit = $this->get_db->do_edit($data, $id);
		redirect("master_nasabah/list_data");
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

}
