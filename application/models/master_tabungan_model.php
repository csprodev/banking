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


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
