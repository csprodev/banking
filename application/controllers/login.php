<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->input->post())
			$this->postlogin();
		$data = array();
		$this->load->view('login');
	}

	public function postlogin()
	{
		$this->load->model('userdb');
		$post = $_POST;
		$user = $this->userdb->CheckLogin($post);
		// print_r($user);die();
		if($user != null)
		{
			if(!isset($post['remember']))
			{
				$cookie = array(
					'name'   => 'user',
					'value'  => $user->usr_id,
					'expire' => time()+86500
				);
				set_cookie($cookie);
			}

			$this->session->set_userdata('user',$user->usr_id);
			
			redirect();
		}
		else
			$this->session->set_userdata('err_msg','Login and password combination is invalid.');
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
