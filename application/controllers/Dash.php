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
		$this->load->model('count');
	}

	public function ip() {
		return '172.16.0.120';
	}

	public function view($req = 'dash')
	{
		if ($req == 'sma' || $req == 'smk') {
			$like 			= $req;
		} else {
			$like 			= '';
		}

		$data['count_all']			= $this->count->count_all();
		$data['count_video']		= $this->count->count_video($like);
		$data['count_buku']			= $this->count->count_buku($like);
		$data['count_silabus']		= $this->count->count_silabus($like);
		$data['count_lom']			= $this->count->count_lom($like);
		$data['count_audio']		= $this->count->count_audio($like);

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

		if ($req == 'update') {
			$data['update'] = $this->cek_update();
		}
		
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
		$connected = @fsockopen($this->ip(), 80); 
                                        
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
			$url="http://".$this->ip()."/sumbel/api_content";
			$get_url = file_get_contents($url);

			if ($get_url) {
				$data = json_decode($get_url, true);

				$data_array = array(
				'datalist' => $data
				);
				
				return $data;
			} else {
				echo "API Tidak Tersedia";
			}
		} else {
			echo "Periksa Kembali Jaringan Internet Anda";
		}
	}

	public function update($remark) {                           
	    if ($this->cek_conn()){
	        $this->load->library('ftp');

			$config['hostname'] 	= 'ftp://'.$this->ip();
			$config['username'] 	= 'sysadmin';
			$config['password'] 	= 'admin122';
			$config['debug']        = TRUE;

			$conn 	= $this->ftp->connect($config);
			
			$a = $this->cek();
			foreach ($a as $a) {
				if ($remark == $a['remark']) {					
					$this->ftp->download('document/content_1510797878.pdf', $_SERVER['DOCUMENT_ROOT'].'/sumbel1/content/'.$a['nama_folder'].'/'.$a['file'], 'ascii');					
					$this->ftp->close();
					
					$data = array(
		                'judul'         => $a['judul'],
		                'desc'          => $a['desc'],
		                'kelas'         => $a['kelas'],
		                'id_jenjang'    => $a['id_jenjang'],
		                'id_mapel'      => $a['id_mapel'],
		                'id_jurusan'    => $a['id_jurusan'],
		                'folder'        => $a['folder'],
		                'file'          => $a['file'],
		                'remark'        => $a['remark'],
		                'date'          => date('Y-m-d')
		            );
		              
		            $this->db->insert('tb_materi' , $data);
					
					echo $mssg = "<SCRIPT LANGUAGE='JavaScript'>
	                window.alert('Data berhasil di perbaharui')
	                window.location.href='".base_url()."view/update';
	                </SCRIPT>";
				}
			}			
	    }else{
	        echo $mssg = "<SCRIPT LANGUAGE='JavaScript'>
	                window.alert('Tidak dapat terhubung, periksa kembali jaringan Anda atau hubungi Administrator SIERRA')
	                window.location.href='".base_url()."view/update';
	                </SCRIPT>";
	    }
	}

	public function cek_update() {
		$a = array();
		$data_server = $this->cek();
		foreach ($data_server as $data) {
			if ($data['remark'] !== '') {
				$remark = array(
					'remark' 	=> $data['remark'],
					'file'		=> $data['file']
				);
		
				$cek = $this->materi->cek_update($remark);
				if ($cek->num_rows() !== 1) {
					$a[] = $data;
				}
			}
		}

		return $a;
	}
}
