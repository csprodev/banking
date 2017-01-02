<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_jurnal_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }

    public function do_read()
	{
		return $this->db->get('transaksi_jurnal')->result_array();
	}

	public function get_no_bukti()
	{
		$this->db->order_by('tj_no_bukti', 'desc');
		return $this->db->get('transaksi_jurnal')->row_array();
	}

	public function do_save($data)
	{
		return $this->db->insert('transaksi_jurnal',$data);
	}

	public function do_edit($data, $id)
	{
		$this->db->where('mn_id', $id);
		return $this->db->update('transaksi_jurnal',$data);
	}

	public function do_delete($id)
	{
		$this->db->where('tj_id', $id);
		return $this->db->delete('transaksi_jurnal');
	}

	public function get_ref_kode_perkiraan()
	{
		$this->db->order_by('rkp_kode', 'asc');
		return $this->db->get('ref_kode_perkiraan')->result_array();
	}

}
