<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browse_data_master extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('userdb');
		$this->load->model('master_tabungan_model','tabungandb');
		$this->load->model('master_kredit_model','kreditdb');
        if($this->session->userdata('user') == '') {
        	redirect('login');
        }
    }

	public function index()
	{
		$this->tabungan();
	}

	public function tabungan()
	{
		$userdata= $this->userdb->getLoginInfo($this->session->userdata('user'));
		$data_tabungan = $this->tabungandb->gets();
		$saldo = [];
		foreach($data_tabungan as $k=>$val) {
			$data_saldo_setor = $this->tabungandb->get_saldo_setor($val->mt_no_rekening);
			$data_saldo_tarik = $this->tabungandb->get_saldo_tarik($val->mt_no_rekening);

			array_push($saldo, $data_saldo_setor - $data_saldo_tarik);
			
		}
		
		// print_r($saldo);die();
		$data = array(
			'link' => 'tabungan_view.php',
			'userdata' => $userdata,
			'data_tabungan' => $data_tabungan,
			'saldo' => $saldo
		);
		
		$this->load->view('index_view', $data);
	}

	public function kredit()
	{
		$userdata= $this->userdb->getLoginInfo($this->session->userdata('user'));
		$data_kredit = $this->kreditdb->gets();

		$data = array(
			'link' => 'kredit_view.php',
			'userdata' => $userdata,
			'data_kredit' => $data_kredit
		);
		$this->load->view('index_view', $data);
	}

	public function proses_setor()
	{
		$post = $_POST;
		$cek_remember_token = $this->cek_remember_token();
		if($cek_remember_token != null)
			$this->tabungandb->insert_setor($post);
		redirect('browse_data_master/tabungan');
	}

	public function proses_tarik()
	{
		$post = $_POST;
		$cek_remember_token = $this->cek_remember_token();
		if($cek_remember_token != null)
			$this->tabungandb->insert_tarik($post);
		redirect('browse_data_master/tabungan');
	}

	public function cek_remember_token()
	{
		$post_cek_token['usr_id'] = $this->session->userdata('user');
		$post_cek_token['remember_token'] = $this->session->userdata('remember_token');
		$cek_remember_token = $this->userdb->check_remember_token($post_cek_token);

		return $cek_remember_token;
	}
	
}


