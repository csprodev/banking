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

			$this->session->unset_userdata('err_msg');
			$remember_token = md5($user->usr_id.time());
			$this->userdb->set_remember_token($user->usr_id, $remember_token);
			$this->session->set_userdata('user',$user->usr_id);
			$this->session->set_userdata('remember_token',$remember_token);
			
			redirect();
		}
		else {
			$this->session->set_userdata('err_msg','Login and password combination is invalid.');
			redirect();
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
