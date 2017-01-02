<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_jurnal extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('userdb');
        $this->load->model('transaksi_jurnal_model', 'get_db');
		date_default_timezone_set('Asia/Jakarta');
		session_start();
    }

	public function index($params = null)
	{
		$list_data = $this->get_db->do_read();
		$userdata = $this->userdb->getLoginInfo($this->session->userdata('user'));
		$no_bukti = $this->get_db->get_no_bukti();

		if(empty($no_bukti))
		{
			$no_bukti['tj_no_bukti'] = '00001';
		}

		$data = array(
			'link' => 'transaksi_jurnal_view.php',
			'userdata' => $userdata,
			'list_data' => $list_data,
			'time' => date('d/m/Y H:i:s'),
			'no_bukti' => $no_bukti['tj_no_bukti']
		);

		$this->load->view('index_view', $data);
	}

	public function tambah_temp()
	{
		$post = $this->input->post(); 
		$_SESSION['tambah_temp'] = $post;
		exit;
	}

	public function save()
	{

		$post = $this->input->post();
		

		if(!empty($_SESSION['tambah_temp']))
		{
			$dataFix = array_merge($post, $_SESSION['tambah_temp']);
			$date = DateTime::createFromFormat('d/m/Y H:i:s', $dataFix['tj_tanggal_trans']);
			$dataFix['tj_tanggal_trans'] = $date->format('Y/m/d H:i:s'); 
			$save = $this->get_db->do_save($dataFix);
			$_SESSION['tambah_temp'] = '';
		}
		else
		{
			
		}

		redirect("transaksi_jurnal");
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

	public function delete()
	{
		$id = $this->input->get('id');
		$del = $this->get_db->do_delete($id);

		if($del)
			redirect("transaksi_jurnal");
		else
			echo 'failed delete data, please check code!';
	}

	public function ref_kode_perkiraan()
	{
		$rkp = $this->get_db->get_ref_kode_perkiraan();
		$content = "<option value=\"999\"> - - - </option>";

		foreach($rkp as $key => $val)
		{
			$content.= "<option value='".$val['rkp_kode']."'>".$val['rkp_kode'].' - '.$val['rkp_nama']."</option>";
		}

		echo $content;
	}

}
