<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		// if($this->input->post())
		// 	$this->postlogin();
		// $data = array();
		$this->load->view('register');
		// $this->Render('login','login','Login',$data,'login');
	}

	private function postlogin()
	{
		$post = $this->PopulatePost();
		$param = array("username","password");
		if($this->checkParameter($param))
		{
			$this->load->model('userdb');
			$this->load->model('roletypedb');
			$user = $this->userdb->CheckLogin($post);
			// print_r($user);die();
			if($user != null)
			{

				// $role = $this->roletypedb->getById($user->id_role);
				if($user->id_role == ADMIN || $user->id_role == SUPER_ADMIN || $user->id_role == FINANCE)
				{
					if(!isset($post['remember']))
					{
						$cookie = array(
							'name'   => 'user',
							'value'  => $user->id_user,
							'expire' => time()+86500
						);
						set_cookie($cookie);
					}

					$this->session->set_userdata('user',$user->id_user);
					
					redirect('admin/home');
				}
				else
					$this->session->set_userdata('err_msg','Login and password combination is invalid.');
			}
			else
				$this->session->set_userdata('err_msg','Login and password combination is invalid.');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
