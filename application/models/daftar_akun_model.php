<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar_akun_model extends CI_Model 
{

	public function __construct()
    {
        parent::__construct();
    }

	public function do_read()
	{
		return $this->db->get('master_tabungan')->result_array();
	}

	public function do_read_row($params)
	{
		$this->db->where('mt_id', $params);
		return $this->db->get('master_tabungan')->row_array();
	}

	public function do_save($data)
	{
		return $this->db->insert('master_tabungan',$data);
	}

	public function do_edit($data, $id)
	{
		$this->db->where('mt_id', $id);
		return $this->db->update('master_tabungan',$data);
	}

	public function do_delete($id)
	{
		$this->db->where('mt_id', $id);
		return $this->db->delete('master_tabungan');
	}

	public function get_category()
	{
		$res = $this->db->get('master_coa_kategori');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	public function gets()
	{
		$this->db->join('master_coa_subkategori b', 'a.mc_id_subkategori = b.sc_id', 'left');
		$this->db->join('master_coa_kategori c', 'a.mc_id_kategori = c.kc_id', 'left');
		// $this->db->order_by('a.mt_no_rekening','DESC');
		$res = $this->db->get('master_coa a');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
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
