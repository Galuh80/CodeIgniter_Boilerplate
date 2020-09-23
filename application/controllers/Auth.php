<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user_model');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	public function login()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->user_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'id_user' => $row->id_user,
					'email' => $row->email,
					'level'	  => $row->level
				);
				$this->session->set_userdata($params);
				redirect('dashboard');
			} else {
				redirect('auth/failedLogin');
			}
		}
	}

	public function failedLogin()
	{
		$url = base_url('auth');
		echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
		redirect($url);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$url = base_url('auth');
		redirect($url);
	}
}
