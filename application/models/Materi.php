<?php
  /**
   *
   */
  class Materi extends CI_Model
  {

    function __construct() {
      parent::__construct();
			$this->load->database();
		}

    public function fetch_data($limit, $start, $jenjang, $folder) {
      $this->db->limit($limit, $start);
      $this->db->where(array('folder' => $folder, 'ket' => $jenjang));
      $this->db->order_by('id_materi', 'ASC');
      // $this->db->where('id_materi', $id);
      $query = $this->db->get("v_content");
      
      if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) {
          $data[] = $row;
        }
      } else {
        $data = '0';
      }

      return $data;
    }

    public function get_m_folder($req='') {
      $this->db->distinct();
      $this->db->select('nama_folder');
      $this->db->where('ket', $req);
      $query = $this->db->get('v_content');
      return $query->result_array();
    }

    public function get_content($jenjang, $folder) {
      $query = $this->db->get_where('v_content', array('folder' => $folder, 'ket' => $jenjang));
      return $query->result_array();
    }

    public function filter($limit, $start,$jenjang,$folder,$kelas,$mapel) {
      $this->db->limit($limit, $start);
      $this->db->like('ket', $jenjang);
      $this->db->like('folder', $folder);
      $this->db->like('id_mapel', $mapel);
      $this->db->like('kelas', $kelas);
      $this->db->order_by('id_materi', 'ASC');
      $query = $this->db->get('v_content');
      
      if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) {
          $data[] = $row;
        }
      } else {
        $data = '0';
      }

      return $data;
    }

    public function get_materi() {
      $query = $this->db->get('v_content');
      return $query->result_array();
    }

    public function get_jenjang() {
      $query = $this->db->get('tb_jenjang');
      return $query->result_array();
    }

    public function get_mapel() {
      $query = $this->db->get('tb_mapel');
      return $query->result_array();
    }

    public function get_jur() {
      $query = $this->db->get('tb_jur');
      return $query->result_array();
    }

    public function get_folder() {
      $query = $this->db->get('tb_folder');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('v_content' , array('id_materi' => $id));
      return $query->row_array();
    }

    public function cek_update($data) {
      $query = $this->db->get_where('v_content' , $data);
      return $query;
    }

    public function insert() {

      $this->load->library('upload');

      $format                         = explode(".",$_FILES['file']['name']);
      $type                           = $this->input->post('folder');
      $nmfile                         = "content_".time().".".$format[1];
      $tmp_size                       = $_FILES['file']['size'];
      $config['file_size']            = ceil($tmp_size / 1024).' Kb';
      $config['upload_path']          = 'content/'.$type;
      $config['allowed_types']        = 'pdf|rar|zip|mp4|mp3';
      $config['max_size']             = 1000000; // Satuan Kbps
      $config['file_name']            = $nmfile;

      $this->upload->initialize($config);
      $file      = $this->upload->data();

      $this->form_validation->set_rules('judul','judul','required');
      $this->form_validation->set_rules('jenjang','jenjang','required');
      $this->form_validation->set_rules('desc','desc','required');
      // $this->form_validation->set_rules('jen','jen','required');
      $this->form_validation->set_rules('mapel','mapel','required');
      $this->form_validation->set_rules('jur','jur','required');
      $this->form_validation->set_rules('kelas','kelas','required');
      $this->form_validation->set_rules('folder','folder','required');

      if ($this->form_validation->run() == FALSE) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Pastikan Semua data telah terisi ')
              window.location.href='".base_url()."view/add';
              </SCRIPT>";
      } else {
        if ($_FILES['file']['name']) {
            if ($this->upload->do_upload('file')) {
              

               $data = array(
                'judul'         => $this->input->post('judul'),
                'desc'          => $this->input->post('desc'),
                // 'jen'           => $this->input->post('jen'),
                'kelas'         => $this->input->post('kelas'),
                'id_jenjang'    => $this->input->post('jenjang'),
                'id_mapel'      => $this->input->post('mapel'),
                'id_jurusan'    => $this->input->post('jur'),
                'folder'        => $this->input->post('folder'),
                'file'          => $file['file_name'],
                'size'          => $file['file_size'],
                'remark'        => time(),
                'date'          => date('Y-m-d')
              );
              
              $this->db->insert('tb_materi' , $data);
              return $mssg = '1';
            } else {
              return $this->upload->display_errors();
            }
        } else {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Tidak Ada Data yang di upload')
                window.location.href='".base_url()."view/add';
                </SCRIPT>";
        }
      }
    }

    public function update($id) {
      $data = array(
        'judul'         => $this->input->post('judul'),
        'desc'          => $this->input->post('desc'),
        // 'jen'           => $this->input->post('jen'),
        'kelas'         => $this->input->post('kelas'),
        'id_jenjang'    => $this->input->post('jenjang'),
        'id_mapel'      => $this->input->post('mapel'),
        'id_jurusan'    => $this->input->post('jur'),
        'folder'        => $this->input->post('folder'),
      );

      $this->db->where('id_materi', $id);
      return $this->db->update('id_materi' , $data);

      return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Cannot be update your data')
                window.location.href='".base_url()."view/add';
                </SCRIPT>";

      
    }

    public function delete($id) {
      $query      = $this->db->get_where('v_content' , array('id_materi' => $id));
      $data       = $query->row_array();
      $file       = $data['file'];
      $folder     = $data['nama_folder'];
      $path       = "content/".$folder."/";

      // echo $path.$file;
      unlink($path.$file);
      return $this->db->delete('tb_materi' , array('id_materi' => $id));
    }

  }
?>
