<?php
  /**
   *
   */
  class Jur extends CI_Model
  {

    function __construct() {
      parent::__construct();
			$this->load->database();
		}

    public function get_jur_table() {
      $query = $this->db->get('v_jur');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_jur' , array('id_jurusan' => $id));
      return $query->row_array();
    }

    public function insert() {

      $data = array(
        'id_jurusan'      => $this->input->post('id'),
        'nama_jur'        => $this->input->post('nama_jur'),
        'id_jenjang'      => $this->input->post('id_jen'),
        'ket'             => $this->input->post('ket')
      );

      if ($data !== NULL) {
        $this->db->insert('tb_jur' , $data);
        $p = '1';
      } else {
        $p = '0';
      }

      return  $p;
    }

    public function update($id) {

      $data = array(        
        'nama_jur'        => $this->input->post('nama_jur'),
        'id_jenjang'      => $this->input->post('id_jen'),
        'ket'             => $this->input->post('ket')
      );

      $this->db->where('id_folder', $id);
      return $this->db->update('tb_jur' , $data);
    }

    public function delete($id) {
      return $this->db->delete('tb_jur' , array('id_jurusan' => $id));
    }

  }
?>
