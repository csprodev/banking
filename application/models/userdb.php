<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class UserDB extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    function getLoginInfo($id)
	{
		$this->db->where('usr_id',$id);
		// $this->db->where('status','Active');
		// $this->db->join('user_profile b','user.id = b.id');
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function CheckLogin($post)
	{
		$this->db->where('usr_name',$post['username']);
		$this->db->where('usr_password',md5($post['password'].SALT));
		$this->db->where('status','active');
		$res = $this->db->get('users');	
		//print_r($this->db->last_query());die();
		if($res->num_rows() > 0)
		{
			$row = $res->row();

			$this->db->where('usr_id',$row->usr_id);
			$this->db->set('last_login',date('Y-m-d H:i:s'));
			$this->db->update('users');

			return $row;
		}
		else
			return null;
	}

	function set_remember_token($usr_id, $remember_token)
	{
		$this->db->where('usr_id', $usr_id);
		$this->db->set('usr_remember_token', $remember_token);
		$this->db->update('users');
	}

	function check_remember_token($post)
	{
		$this->db->where('usr_id',$post['usr_id']);
		$this->db->where('usr_remember_token',$post['remember_token']);
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_menu($params)
	{
		$menu = array();
		$this->db->select('*');
		$this->db->where('sm_user_id', $params);
		$this->db->where('(sm_is_child is null or sm_is_child = 0)');
		$this->db->order_by('sm_order', 'asc');

		$data_parent =  $this->db->get('sys_menu')->result_array();

		if($data_parent != null)
		{
			foreach ($data_parent as $key => $value) 
			{
				$menu[] = $value; 				
				$child = $this->db->query("select * from sys_menu where sm_id_parent = '".$value['sm_id']."'")->result_array();
				
				if(!empty($child))
				{
					$menu[$key]['sm_child'] = $child;
				}
			}
		}

		return $menu;
	}

}