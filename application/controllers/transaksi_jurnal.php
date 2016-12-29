<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_jurnal extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('userdb');
        $this->load->model('transaksi_jurnal_model', 'get_db');
		date_default_timezone_set('Asia/Jakarta');
    }

	public function index($params = null)
	{
		$list_data = $this->get_db->do_read();
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));
		$data = array(
			'link' => 'transaksi_jurnal_view.php',
			'userdata' => $userdata,
			'action' => 'save',
			'list_data' => $list_data,
			'time' => date('d/m/Y H:i:s')
		);

		$this->load->view('index_view', $data);
	}

	public function save()
	{
		$data = $this->input->post();
		$data['mn_tanggal_lahir'] = date_format(date_create($data['mn_tanggal_lahir']),'Y-m-d');
		unset($data['mt_id']);
		
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

}
