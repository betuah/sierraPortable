<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require(APPPATH.'libraries/REST_Controller.php');

  class Api_jur extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
      $id = $this->get('id');
      if ($id == '') {
          $data = $this->db->get('tb_jur')->result();
      } else {
          $this->db->where('jenjang_jur', $id);
          $data = $this->db->get('tb_jur')->result();
      }
      $this->response($data, 200);
    }
}
