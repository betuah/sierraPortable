<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->helper('text');

		//Load models
		$this->load->helper('url');
		$this->load->model('materi');
		$this->load->model('folder');
		$this->load->model('jur');
		$this->load->model('mapel');
	}

	public function insert($req = '')	{		
		$insrt 	= $this->$req->insert();
		$url 	= base_url();
		$pages 	= '';
		
		if ($req == 'materi') {
			$pages = 'add';
		} elseif ($req == 'folder') {
			$pages = 'add_folder';
		} elseif ($req == 'mapel') {
			$pages = 'add_mapel';
		} elseif ($req == 'jur') {
			$pages = 'add_jur';
		}
		
		if ($insrt == '1') {
			echo "<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Data Berhasil Di Simpan')
							window.location.href='".$url."view/".$pages."';
							</SCRIPT>";
			// redirect($url.'view/'.$content);
		} else {
			echo $insrt;
		}
	}

	public function delete($req,$id) {
		// echo $req." ".$id;
		if ($req == 'materi') {
			$pages = 'add';
		} elseif ($req == 'folder') {
			$pages = 'add_folder';
		} elseif ($req == 'mapel') {
			$pages = 'add_mapel';
		} elseif ($req == 'jur') {
			$pages = 'add_jur';
		}

		echo $this->$req->delete($id);
		$url 	= base_url();
		redirect($url.'/view/'.$pages);
	}

}
