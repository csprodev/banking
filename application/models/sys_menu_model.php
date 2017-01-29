<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sys_menu_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }

    public function do_read()
	{
		return $this->db->get('sys_menu')->result_array();
	}

	public function do_read_row($params)
	{
		$this->db->where('sm_id', $params);
		return $this->db->get('sys_menu')->row_array();
	}

	public function do_save($data)
	{
		return $this->db->insert('sys_menu',$data);
	}

	public function do_edit($data, $id)
	{
		$this->db->where('sm_id', $id);
		return $this->db->update('sys_menu',$data);
	}

	public function do_delete($id)
	{
		$this->db->where('sm_id', $id);
		return $this->db->delete('sys_menu');
	}

	public function do_get_column_table()
	{
		return $this->db->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ibs_branchless' AND TABLE_NAME = 'sys_menu'")->result_array();
	}

	public function do_get_parent()
	{
		$this->db->select('sm_id, sm_title');
		$this->db->where('sm_id_parent is null');
		$this->db->where('sm_user_id != 3');
		return $this->db->get('sys_menu')->result_array();
	}

}
