<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

  public function user_login() {

    $username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('username', $username)->where('password', $password)->where('level', 9)->get('users');

		$id = $query->row_array();

		return $id['id'];

  }

  public function user_department_list() {

    $query = $this->db->where('level <', 3)->get('users');

		return $query->result_array();

  }

  public function user_account_list() {

    $query = $this->db->where('level', 3)->get('users');

		return $query->result_array();

  }

  public function user_update_password($id) {

    $data = array(
      'password' => $this->input->post('password'),
    );

    return $this->db->where('id', $id)->update('users',$data);

  }

  public function get_user($id) {

    $query = $this->db->where('id', $id)->get('users');

    return $query->row_array();

  }

  public function create_account() {

    $date = date("F j, Y, g:ia");

    $data = array(
      'level' => $this->input->post('level'),
      'fname' => $this->input->post('fname'),
      'lname' => $this->input->post('lname'),
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'created_at' => $date
    );

    return $this->db->insert('users',$data);

  }

}
