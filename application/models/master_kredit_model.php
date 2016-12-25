<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_kredit_model extends CI_Model 
{

	public function __construct()
    {
        parent::__construct();
    }

	public function do_read()
	{
		return $this->db->get('master_kredit')->result_array();
	}

	public function do_read_row($params)
	{
		$this->db->where('mk_id', $params);
		return $this->db->get('master_kredit')->row_array();
	}

	public function do_save($data)
	{
		return $this->db->insert('master_kredit',$data);
	}

	public function do_edit($data, $id)
	{
		$this->db->where('mk_id', $id);
		return $this->db->update('master_kredit',$data)	;
	}

	public function do_delete($id)
	{
		$this->db->where('mk_id', $id);
		return $this->db->delete('master_kredit');
	}

	public function gets()
	{
		$this->db->join('master_nasabah b', 'a.mk_no_rekening = b.mn_no_rekening', 'left');
		$this->db->order_by('a.mk_no_rekening','DESC');
		$res = $this->db->get('master_kredit a');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}
}
