<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_nasabah_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }

    public function do_read()
	{
		return $this->db->get('master_nasabah')->result_array();
	}

	public function do_read_row($params)
	{
		$this->db->where('mn_id', $params);
		return $this->db->get('master_nasabah')->row_array();
	}

	public function do_save($data)
	{
		$data['mn_no_rekening'] = '0901010';
		return $this->db->insert('master_nasabah',$data);
	}

	public function do_edit($data, $id)
	{
		$this->db->where('mn_id', $id);
		return $this->db->update('master_nasabah',$data);
	}

	public function do_delete($id)
	{
		$this->db->where('mn_id', $id);
		return $this->db->delete('master_nasabah');
	}

}
