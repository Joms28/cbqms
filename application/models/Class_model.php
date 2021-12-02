<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model {

  public function __construct(){
		$this->load->database();
	}

  public function getClasses() {

    $query = $this->db->get('classes');

		return $query->result_array();

  }

  public function createClass() {

    $date = date("F j, Y, g:ia");

    $data = array(
      'sy' => $this->input->post('sy'),
      'level' => $this->input->post('level'),
      'name' => $this->input->post('name'),
      'status' => 0,
      'created_at' => $date,
      'updated_at' => $date
    );

    return $this->db->insert('classes',$data);

  }

  public function getTeacher() {
    $query = $this->db->where('type', 1)->get('users');

    return $query->result_array();
  }

  public function getSubjects($id) {
    $query = $this->db->where('level', $id)->get('subjects');

		return $query->result_array();
  }

  public function getClass($id){

    $query = $this->db->where('id', $id)->get('classes');

		return $query->row_array();
  }

  public function closeClass($id) {

    $data = array(
      'status' => 1,
    );

    return $this->db->where('id', $id)->update('classes',$data);

  }
}
