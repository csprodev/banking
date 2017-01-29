<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar_akun extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('userdb');
		$this->load->model('daftar_akun_model','akundb');
        if($this->session->userdata('user') == '') {
        	redirect('login');
        }
    }

	public function index()
	{
		$userdata= $this->userdb->getLoginInfo($this->session->userdata('user'));
		$data_akun = $this->akundb->gets();
		$category = $this->akundb->get_category();
		
		$menu = array('coa');
		$data = array(
			'link' => 'daftar_akun_view.php',
			'userdata' => $userdata,
			'data_akun' => $data_akun,
			'category' => $category,
			'menu' => $menu
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

	public function print_pdf()
	{
		require_once 'assets/plugins/mpdf60/mpdf.php';

		$mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);
		// $mpdf->WriteHTML('<h1>Hello world!</h1>');
		$mpdf->WriteHTML(file_get_contents('application/views/pdf/bukti_setor.php'));
		$mpdf->Output();
	}
	
}


