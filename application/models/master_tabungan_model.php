<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_tabungan_model extends CI_Model 
{

	public function __construct()
    {
        parent::__construct();
    }

	public function do_read()
	{
		return $this->db->get('master_tabungan')->result_array();
	}

	public function do_save($data)
	{
		return $this->db->insert('master_tabungan',$data);
	}

	public function gets()
	{
		$this->db->join('master_nasabah b', 'a.mt_no_rekening = b.mn_no_rekening', 'left');
		$this->db->order_by('a.mt_no_rekening','DESC');
		$res = $this->db->get('master_tabungan a');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	public function get_saldo_setor($mt_no_rekening)
	{
		$this->db->where('st_no_rekening', $mt_no_rekening);
		$this->db->select('SUM(st_jumlah_setor) as st_jumlah_setor');
		$res = $this->db->get('tr_setor_tunai');
		if($res->num_rows() > 0)
			return $res->row()->st_jumlah_setor;
		else
			return 0;
	}

	public function get_saldo_tarik($mt_no_rekening)
	{
		$this->db->where('tt_no_rekening', $mt_no_rekening);
		$this->db->select('SUM(tt_jumlah_tarik) as tt_jumlah_tarik');
		$res = $this->db->get('tr_tarik_tunai');
		if($res->num_rows() > 0)
			return $res->row()->tt_jumlah_tarik;
		else
			return 0;
	}

	function insert_setor($post)
	{
		$this->db->set('st_no_rekening', $post['mt_no_rekening_setor']);
		$this->db->set('st_jumlah_setor', $post['nominal_setor']);
		$this->db->set('created_at', date('Y-m-d h:i:s'));
		$this->db->set('created_by', $this->session->userdata('user'));
		$this->db->insert('tr_setor_tunai');
	}

	function insert_tarik($post)
	{
		$this->db->set('tt_no_rekening', $post['mt_no_rekening_tarik']);
		$this->db->set('tt_jumlah_tarik', $post['nominal_tarik']);
		$this->db->set('created_at', date('Y-m-d h:i:s'));
		$this->db->set('created_by', $this->session->userdata('user'));
		$this->db->insert('tr_tarik_tunai');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
