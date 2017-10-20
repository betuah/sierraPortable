<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

		$this->load->helper('directory');

		$base_dir = './file_content/';
		$data['dir'] = $this->dir($base_dir);


		// print_r($data);
		$this->load->view('welcome_message', $data);
		// echo "string";
	}

	public function dir($path) {
		$paths = directory_map($path,2);

		return $paths;
	}
}
