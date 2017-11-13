<?php
  /**
   *
   */
  class Folder extends CI_Model
  {

    function __construct() {
      parent::__construct();
			$this->load->database();
		}

    public function get_folder_table() {
      $query = $this->db->get('tb_folder');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_folder' , array('id_folder' => $id));
      return $query->row_array();
    }

    public function insert() {

      $data = array(
        'id_folder'      => $this->input->post('id'),
        'nama_folder'    => $this->input->post('folder'),
        'id_jenjang'     => $this->input->post('id_jen')
      );

      if ($data !== NULL) {
        $this->db->insert('tb_folder' , $data);
        $p = '1';
      } else {
        $p = '0';
      }

      return  $p;
    }

    public function update($id) {

      $data = array(
        'nama_folder'    => $this->input->post('folder'),
        'id_jenjang'     => $this->input->post('id_jen')
      );

      $this->db->where('id_folder', $id);
      return $this->db->update('tb_folder' , $data);
    }

    public function delete($id) {
      return $this->db->delete('tb_folder' , array('id_folder' => $id));
    }

  }
?>
