<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require(APPPATH.'libraries/REST_Controller.php');

  class Api_content extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
      $id = $this->get('id');
      if ($id == '') {
          $data = $this->db->get('v_content')->result();
      } else {
          $this->db->where('id_materi', $id);
          $data = $this->db->get('v_content')->result();
      }
      $this->response($data, 200);
    }
}
