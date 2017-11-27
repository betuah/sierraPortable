<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();

		//Load models
		$this->load->model('auth');
	}

	public function signup()	{		
		$data = array(
			'username'    => $this->input->post('username'),
			'password'    => md5($this->input->post('password'))
		);

		$insrt = $this->auth->insert($data);

		if ($insrt == '1') {
			echo "<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Berhasil Mendaftar')
						window.location.href='".base_url()."view/dash';
						</SCRIPT>";
		} else {
			echo $insrt;
		}
	}

	public function login() {
		$data = array(
			'username'    => $this->input->post('username'),
			'password'    => md5($this->input->post('password'))
		);

		// print_r($data);

		$result = $this->auth->login($data);

		if ($result->num_rows() == 1) {
			foreach ($result->result() as $users) {
				$users_data['user'] 	= $users->username;
				$this->session->set_userdata($users_data);
			}

			redirect(base_url().'view/dash');
		} else {
			echo "<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Gagal Login, Periksa Kembali Username Dan Password Anda')
						window.location.href='".base_url()."view/dash';
						</SCRIPT>";
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		session_destroy();
		redirect(base_url());
	}
	
}
