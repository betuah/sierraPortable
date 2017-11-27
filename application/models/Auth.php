<?php
  /**
   *
   */
  class Auth extends CI_Model
  {

    function __construct() {
      parent::__construct();
			$this->load->database();
		}

    public function insert($data) {
      $query = $this->db->insert('tb_users' , $data);
      if ($query) {
        return $mssg = '1';
      } else {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Gagal Memasukan Data')
                  window.location.href='".base_url()."view/dash';
                  </SCRIPT>";
      }
    }

    public function login($data) {
      $query = $this->db->get_where('tb_users', $data);
      return $query;
    }
  }
?>
