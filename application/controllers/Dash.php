<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download','text'));	

		//Load models
		$this->load->helper('url');
		$this->load->model('materi');
		$this->load->model('folder');
		$this->load->model('jur');
		$this->load->model('mapel');
	}

	public function view($req = 'dash')
	{
		if ($req == 'sma' || $req == 'smk') {
			$like 			= $req;
		} else {
			$like 			= '';
		}

		$data['count_all']			= $this->materi->count_all();
		$data['count_video']		= $this->materi->count_video($like);
		$data['count_buku']			= $this->materi->count_buku($like);

		$data['get_jenjang'] 		= $this->materi->get_jenjang();
		$data['get_mapel'] 			= $this->materi->get_mapel();
		$data['get_jur'] 			= $this->materi->get_jur();
		$data['get_folder'] 		= $this->materi->get_folder();
		$data['get_jur_t']			= $this->jur->get_jur_table();
		$data['get_mapel_t'] 		= $this->mapel->get_mapel_table();
		$data['get_folder_t']		= $this->folder->get_folder_table();
		$data['get_materi']			= $this->materi->get_materi();
		$data['get_m_folder']		= $this->materi->get_m_folder($like);
		$data['slug']				= $req;
		if ($req == 'sma' || $req == 'smk') {
			$data['req'] 			= 'folder';
		} else {
			$data['req'] 			= $req;
		}

		// print_r($this->data->get_kelas());
		$this->load->view('index', $data);
	}

	public function content($jenjang, $folder) {
		$data['get_content']		= $this->materi->get_content($jenjang, $folder);
		$data['req'] 				= 'content';
		$this->load->view('index', $data);
	}

	public function file($id) {
		$data['file'] 				= $this->materi->get_id($id);
		$data['req'] 				= 'file';
		$this->load->view('index', $data);
	}

	public function download($jen, $file) {
		force_download('content/'.$jen.'/'.$file, NULL);
	}

	public function cek_conn() {
		$connected = @fsockopen("172.32.69.6", 80); 
                                        
	    if ($connected){
	        $is_conn = true; //action when connected
	        fclose($connected);
	    }else{
	        $is_conn = false; //action in connection failure
	    }
	    return $is_conn;
	}

	public function cek() {
		if ($this->cek_conn()) {
			$url="http://172.32.69.6/sumbel/api_content";
			$get_url = file_get_contents($url);

			if ($get_url) {
				$data = json_decode($get_url);

				$data_array = array(
				'datalist' => $data
				);
				
				print_r($data_array);
			} else {
				echo "API Tidak Tersedia";
			}
		} else {
			echo "Periksa Kembali Jaringan Internet Anda";
		}
		
		
	}

	public function update($jen, $file) {                           
	    if ($this->cek_conn()){
	        $this->load->library('ftp');

			$config['hostname'] 	= 'ftp://172.32.69.6';
			$config['username'] 	= 'sierra';
			$config['password'] 	= 'sierra321';
			$config['debug']        = TRUE;

			$conn = $this->ftp->connect($config);

			$this->ftp->download($jen.'/'.$file, $base_url().'/content/'.$jen.'/'.$file, 'ascii');

			$this->ftp->close();
	    }else{
	        echo "Periksa Kembali jaringan anda";
	    }
	}
}
