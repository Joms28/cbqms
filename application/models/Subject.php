<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Model {

  public function __construct(){
		$this->load->database();
	}

  public function getSubjects() {

    $query = $this->db->where('delete', 0)->get('subjects');

		return $query->result_array();

  }

  public function createSubject() {

    $date = date("F j, Y, g:ia");

    $data = array(
      'code' => $this->input->post('code'),
      'name' => $this->input->post('name'),
      'level' => $this->input->post('level'),
      'created_at' => $date,
      'updated_at' => $date
    );

    return $this->db->insert('subjects',$data);

  }

  public function updateSubject($id) {

      $data = array(
        'code' => $this->input->post('code'),
        'name' => $this->input->post('name'),
        'level' => $this->input->post('level')
      );

      return $this->db->where('id', $id)->update('subjects',$data);
  }

  public function deleteSubject($id) {

    $data = array(
      'delete' => 1,
    );

    return $this->db->where('id', $id)->update('subjects',$data);

  }

}
