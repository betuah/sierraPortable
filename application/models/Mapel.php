<?php
  /**
   *
   */
  class Mapel extends CI_Model
  {

    function __construct() {
      parent::__construct();
			$this->load->database();
		}

    public function get_mapel_table() {
      $query = $this->db->get('tb_mapel');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_mapel' , array('id_mapel' => $id));
      return $query->row_array();
    }

    public function insert() {

      $data = array(
        'id_mapel'      => $this->input->post('id'),
        'nama_mapel'    => $this->input->post('mapel')
      );

      if ($data !== NULL) {
        $this->db->insert('tb_mapel' , $data);
        $p = '1';
      } else {
        $p = '0';
      }

      return  $p;
    }

    public function update($id) {

      $data = array(
        'nama_mapel'    => $this->input->post('mapel')
      );

      $this->db->where('id_mapel', $id);
      return $this->db->update('tb_mapel' , $data);
    }

    public function delete($id) {
      return $this->db->delete('tb_mapel' , array('id_mapel' => $id));
    }

  }
?>
