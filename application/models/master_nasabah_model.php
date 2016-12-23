<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_nasabah_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }

	public function do_save($data)
	{
		$data['mn_no_rekening'] = '0901010';
		return $this->db->insert('master_nasabah',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
