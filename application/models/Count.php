<?php
  /**
   *
   */
  class Count extends CI_Model
  {

    function __construct() {
      parent::__construct();
			$this->load->database();
		}

    public function count_all() {
      return $this->db->count_all('v_content');
    }

    public function count_video($req='') {
      $this->db->like('ket', $req);
      $this->db->like('folder', '1');
      $this->db->from('v_content');
      return $this->db->count_all_results();
    }

    public function count_buku($req='') {
      $this->db->like('ket', $req);
      $this->db->like('folder', '2');
      $this->db->from('v_content');
      return $this->db->count_all_results();
    }

    public function count_silabus($req='') {
      $this->db->like('ket', $req);
      $this->db->like('folder', '3');
      $this->db->from('v_content');
      return $this->db->count_all_results();
    }

    public function count_audio($req='') {
      $this->db->like('ket', $req);
      $this->db->like('folder', '5');
      $this->db->from('v_content');
      return $this->db->count_all_results();
    }

    public function count_lom($req='') {
      $this->db->like('ket', $req);
      $this->db->like('folder', '4');
      $this->db->from('v_content');
      return $this->db->count_all_results();
    }

  }
?>
