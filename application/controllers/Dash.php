<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {

	public function view($req = 'dash')
	{
		$this->load->helper('url');
		$this->load->model('data');

		$data['get_jenjang'] 		= $this->data->get_jenjang();
		$data['get_mapel'] 			= $this->data->get_mapel();
		$data['get_jur'] 			= $this->data->get_jur();
		$data['req'] 						= $req;

		// print_r($this->data->get_kelas());
		$this->load->view('index', $data);
	}

}
