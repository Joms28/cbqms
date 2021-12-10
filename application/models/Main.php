<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Model {

  public function user_login() {

    $username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('username', $username)->where('password', $password)->where('level', 3)->get('users');

		$id = $query->row_array();

		return $id['id'];

  }

  public function user_create() {

    $date = date("F j, Y, g:ia");

    $data = array(
      'level' => 3,
      'fname' => $this->input->post('fname'),
      'lname' => $this->input->post('lname'),
      'mobile' => $this->input->post('mobile'),
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'created_at' => $date
    );

    return $this->db->insert('users',$data);

  }

  public function user_update($id) {

    $data = array(
      'fname' => $this->input->post('fname'),
      'lname' => $this->input->post('lname'),
      'mobile' => $this->input->post('mobile'),
      'gender' => $this->input->post('gender'),
      'email' => $this->input->post('email')
    );

    return $this->db->where('id', $id)->update('users', $data);
  }

  public function user_update_password($id) {

    $data2 = array(
      'password' => $this->input->post('password')
    );

    return $this->db->where('id', $id)->update('users', $data2);
  }

  public function user_walkin_cashier_insert_user() {

    $date = date("F j, Y, g:ia");

    $data = array(
      'level' => 3,
      'walkin' => 1,
      'fname' => $this->input->post('fname'),
      'lname' => $this->input->post('lname'),
      'mobile' => $this->input->post('mobile'),
      'email' => $this->input->post('email'),
      'created_at' => $date
    );

    $this->db->insert('users',$data);
    $id = $this->db->insert_id();

    $data2 = array(
      'closed' => 0,
      'status' => 0,
      'user_id' => $id,
      'sched_date' => date("F j, Y"),
      'transaction_type' => $this->input->post('type'),
      'transaction_name' => $this->input->post('transaction'),
      'priority_status' => ($this->input->post('priority') != "0" ? 1 : 0),
      'priority_type' => ($this->input->post('priority') != "0" ? $this->input->post('priority') : 0),
      'assigned_queue_num' => $this->create_queue_num($this->input->post('priority'),1),
      'updated_at' => $date,
      'created_at' => $date
    );
    $this->db->insert('transactions',$data2);
    return $id2 = $this->db->insert_id();
  }

  public function user_walkin_registrar_insert_user() {

    $date = date("F j, Y, g:ia");

    $data = array(
      'level' => 3,
      'walkin' => 1,
      'fname' => $this->input->post('fname'),
      'lname' => $this->input->post('lname'),
      'mobile' => $this->input->post('mobile'),
      'email' => $this->input->post('email'),
      'created_at' => $date
    );

    $this->db->insert('users',$data);
    $id = $this->db->insert_id();

    $data2 = array(
      'closed' => 0,
      'status' => 0,
      'user_id' => $id,
      'sched_date' => date("F j, Y"),
      'transaction_type' => 2,
      'transaction_name' => $this->input->post('transaction'),
      'priority_status' => ($this->input->post('priority') != "0" ? 1 : 0),
      'priority_type' => ($this->input->post('priority') != "0" ? $this->input->post('priority') : 0),
      'updated_at' => $date,
      'created_at' => $date,
      'expires_at' => $expires,
      'assigned_queue_num' => $this->create_queue_num($this->input->post('priority'),1)
    );
    $this->db->insert('transactions',$data2);
    return $id2 = $this->db->insert_id();

  }

  public function user_walkin_get_transaction($id) {

    $query = $this->db->where('id', $id)->get('transactions');

    return $query->row_array();

  }

  public function user_walkin_get_user($id) {

    $query = $this->db->where('id', $id)->get('users');

    return $query->row_array();

  }

  public function user_walkin_get_transaction_by_date($date) {

    $query = $this->db->where('sched_date', $date)->get('transactions');

    return $query->result_array();

  }

  private function set_expiration_date(){
    $date = date('F j, Y, g:ia');
    return date("F j, Y",strtotime($date.' + 2 days'));
  }

  public function user_set_appointment_cashier($id) {

    $date = date("F j, Y, g:ia");
    $expires = $this->set_expiration_date();

    $data2 = array(
      'closed' => 0,
      'status' => 0,
      'user_id' => $id,
      'sched_date' => date("F j, Y"),
      'transaction_type' => 1,
      'transaction_name' => $this->input->post('transaction'),
      'priority_status' => ($this->input->post('priority') != "0" ? 1 : 0),
      'priority_type' => ($this->input->post('priority') != "0" ? $this->input->post('priority') : 0),
      'updated_at' => $date,
      'created_at' => $date,
      'expires_at' => $expires,
      'assigned_queue_num' => $this->create_queue_num($this->input->post('priority'),1),
    );

    $this->db->insert('transactions',$data2);
  }

  public function user_set_appointment_registrar($id) {

    $date = date("F j, Y, g:ia");
    $expires = $this->set_expiration_date();

    $data2 = array(
      'closed' => 0,
      'status' => 0,
      'user_id' => $id,
      'sched_date' => date("F j, Y"),
      'transaction_type' => 2,
      'transaction_name' => $this->input->post('transaction'),
      'priority_status' => ($this->input->post('priority') != "0" ? 1 : 0),
      'priority_type' => ($this->input->post('priority') != "0" ? $this->input->post('priority') : 0),
      'updated_at' => $date,
      'created_at' => $date,
      'expires_at' => $expires,
      'assigned_queue_num' => $this->create_queue_num($this->input->post('priority'),1),
    );

    $this->db->insert('transactions',$data2);
  }

  public function check_user_sched_cashier($id) {

    //$query = $this->db->where('user_id', $id)->where('transaction_type', 1)->where('sched_date', date("F j, Y"))->where('closed', 0)->get('transactions');
    $query = $this->db->where('user_id', $id)->where('transaction_type', 1)->where('closed', 0)->get('transactions');

    if($query->num_rows()) {
      return false;
    } else {
      return true;
    }

  }

  public function get_user_sched_cashier($id) {

    //$query = $this->db->where('user_id', $id)->where('transaction_type', 1)->where('sched_date', date("F j, Y"))->where('closed', 0)->get('transactions');
    $query = $this->db->where('user_id', $id)->where('transaction_type', 1)->where('closed', 0)->get('transactions');

    return $query->row_array();

  }

  public function get_user_sched_registrar($id) {

    //$query = $this->db->where('user_id', $id)->where('transaction_type', 2)->where('sched_date', date("F j, Y"))->where('closed', 0)->get('transactions');
    $query = $this->db->where('user_id', $id)->where('transaction_type', 2)->where('closed', 0)->get('transactions');

    return $query->row_array();

  }

  public function get_user_sched_cashier_by_id($id) {

    $query = $this->db->where('id', $id)->where('transaction_type', 1)->where('sched_date', date("F j, Y"))->where('closed', 0)->get('transactions');

    return $query->row_array();

  }

  public function get_user_sched_registrar_by_id($id) {

    $query = $this->db->where('id', $id)->where('transaction_type', 2)->where('sched_date', date("F j, Y"))->where('closed', 0)->get('transactions');

    return $query->row_array();

  }

  public function check_user_sched_registrar($id) {

    //$query = $this->db->where('user_id', $id)->where('transaction_type', 2)->where('sched_date', date("F j, Y"))->where('closed', 0)->get('transactions');
    $query = $this->db->where('user_id', $id)->where('transaction_type', 2)->where('closed', 0)->get('transactions');

    if($query->num_rows()) {
      return false;
    } else {
      return true;
    }

  }

  public function delete_appointment($id) {
    $this->db->where('id', $id)->update('transactions', array('closed' => 1));
  }

  public function check_available_counter($counter) {

    $query = $this->db->where('type', $counter)->where('sched_date', date("F j, Y"))->get('counters');

    return $query->row();

  }

  public function get_dashboard_cashier_data() {

    $query = $this->db->where('priority_status', 0)->where('transaction_type', 1)->where('sched_date', date("F j, Y"))->get('transactions');

    return $query->result_array();

  }

  public function get_dashboard_registrar_data() {

    $query = $this->db->where('priority_status', 0)->where('transaction_type', 2)->where('sched_date', date("F j, Y"))->get('transactions');

    return $query->result_array();

  }

  public function get_dashboard_priority_data() {

    $query = $this->db->where('priority_status', 1)->where('sched_date', date("F j, Y"))->get('transactions');

    return $query->result_array();

  }

  public function user_login_employee() {

    $username = $this->input->post('username');
		$password = $this->input->post('password');
    $query = $this->db->query('SELECT * from users where username="'.$username.'" AND password="'. $password.'" AND level <3');
	
		foreach ($query->result() as $row)
		{	
      $this->session->set_userdata('user_id', $row->id);
      $this->session->set_userdata('user_level', $row->level);
      return true;
		}
    return false;

  }

  public function employee_check_have_transaction($id) {

    $query = $this->db->where('closed', 0)->where('agent_id', $id)->get('transactions');

  	if($query->num_rows() > 0) {
  	return $query->row_array()['id'];
  	} else {
  	return 0;
  	}


  }

  public function get_total_available_transaction($transaction) {

    $query = $this->db->where('sched_date', date("F j, Y"))->where('transaction_type', $transaction)->where('closed', 0)->get('transactions');

    return $query->num_rows();

  }

  public function get_processed_transaction($id) {

    $query = $this->db->where('closed', 1)->where('agent_id', $id)->get('transactions');

    return $query->num_rows();

  }

  public function processAppointment($id,$user_id) {

    $date = date("F j, Y, g:ia");

    $data = array(
      'status' => 1,
      'agent_id' => $user_id,
      'created_at' => $date
    );

    $this->db->where('id', $id)->update('transactions',$data);

  }

  public function processComplete($id) {
    $data = array(
      'status' => 3,
      'closed' => 1
    );

    $this->db->where('id', $id)->update('transactions',$data);
    $this->db->where('transaction_id',$id)->update('pending_transactions',$data); //update pending transactions if exists
  }

  public function processCancel($id) {
    $data = array(
      'status' => 2,
      'closed' => 1
    );

    $this->db->where('id', $id)->update('transactions',$data);
    $this->db->where('transaction_id',$id)->update('pending_transactions',$data); //update pending transactions if exists
  }

  public function get_all_transaction_by_id($id) {

    $query = $this->db->where('agent_id', $id)->get('transactions');

    return $query->result_array();
  }

  public function get_total_transaction($transaction,$status) {

    $query = $this->db->where('transaction_type', $transaction)->where('status', $status)->where('sched_date', date("F j, Y"))->get('transactions');

    return $query->num_rows();

  }

  public function get_total_pending($transaction) {

    $query = $this->db->where('transaction_type', $transaction)->where('status', 0)->where('closed', 0)->where('sched_date', date("F j, Y"))->get('transactions');

    return $query->num_rows();
  }

  public function get_counter($id,$type) {

    $query = $this->db->where('date', date("F j, Y"))->get('counters');

    $employees = $query->result_array();

    $i = 1;
    foreach($employees as $employee) {

      if($employee['type'] == $type && $employee['employee_id'] == $id) {
        break;
      } else if($employee['type'] == $type){
        $i++;
      }

    }
    return $i;

  }

  public function check_email($email) {

    $query = $this->db->where('email', $email)->get('users');

    return $query->row_array()['id'];

  }

  public function create_forgot($id, $code) {

    $data = array(
      'user_id' => $id,
      'code' => $code,
      'date' => "date"
    );
    $this->db->insert('user_forgots', $data);
    return $this->db->insert_id();

  }

  public function get_forgot($id) {

    $query = $this->db->where('id', $id)->get('user_forgots');

    return $query->row_array();

  }

  public function check_code($id, $code) {

    $query = $this->db->where('user_id', $id)->where('code',$code)->get('user_forgots');

    return $query->num_rows();

  }

  public function forgot_update_status($status,$id) {

    $data = array(
      'status' => $status
    );

    return $this->db->where('id', $id)->update('user_forgots', $data);

  }

  public function forgot_changepassword($id) {

    $data = array(
      'password' => $this->input->post('pass')
    );

    $this->db->where('id', $id)->update('users',$data);
    return $this->db->where('user_id', $id)->delete('user_forgots');;

  }

  public function update_bleep($status) {

    return $this->db->where('id', 1)->update('bleep', array('status' => $status));

  }

  public function check_bleep() {

    $query = $this->db->where('status', 1)->get('bleep');

    return $query->num_rows();

  }

  public function get_call($transaction_id){
    $query = $this->db->where('transaction_id',$transaction_id)->get('transaction_calls');

    return $this->query->row_array();
  }

  public function check_if_has_agent_id($transaction_id){    
    $query = $this->db->where('id',$transaction_id)->get('transactions')->row_array();
    if($query['agent_id'] == 0){
      return false;
    }
    else{
      return true;
    }
  }

  //queue number create
  public function create_queue_num($priority,$transaction_type){

    $priority_status = $priority != '0' ? 1 : 0;    
    $priority_prefix = $priority_status == 1 ? 'P' : '';        
    $transaction_prefix = $transaction_type == 1 ? 'C' : 'R';
    $transactions_count = $this->db->where('priority_status', $priority_status)->where('transaction_type',$transaction_type)->where('sched_date', date("F j, Y"))->get('transactions')->num_rows();    
    $pending_transactions = $this->db->where('status',0)->where('closed',0)->where('expires_at',date("F j, Y"))->order_by('queue_num','ASC')->get('pending_transactions')->row_array();

    $transactions_count++;

    $queue_num = $transaction_prefix . $priority_prefix . '-' . sprintf("%04d", $transactions_count);

    if($pending_transactions){ //checks queue num if there are pending transactions 
      foreach($pending_transactions as $pending){
        if($pending['queue_num'] == $queue_num){
          $transactions_count++;
        }
      }
    }

    $queue_num = $transaction_prefix . $priority_prefix . '-' . sprintf("%04d", $transactions_count);

    return $queue_num;
  }  

  public function eod_check_pending($transaction_type = 0){

    if($transaction_type != 0){
      $this->db->where('transaction_type',$transaction_type); // no transaction type filter by default
    }

    $this->db->where('status',0)->where('closed',0);    
    $this->db->order_by('queue_num','ASC');

    $pending_transactions = $this->db->get('transactions')->result_array();

    if($pending_transactions){      
      foreach($pending_transactions as $transaction){
        $data = array(
          'transaction_id' => $transaction['id'],
          'status' => $transaction['status'],
          'closed' => $transaction['closed'],
          'expires_at' => $transaction['expires_at']
        );
        $this->db->insert('pending_transactions',$data); //insert into pending transactions
      }
    }
  }

  public function eod_check_expired($transaction_type = 0){

    if($transaction_type != 0){
      $this->db->where('transaction_type',$transaction_type); // no transaction type filter by default
    }

    $this->db->where('status',0)->where('closed',0);
    $this->db->where('expires_at',date("F j, Y"));    

    $expired_transactions = $this->db->get('transactions')->result_array();

    if($expired_transactions){      
      foreach($expired_transactions as $transaction){
        $data = array(          
          'status' => 4,
        );
        $this->db->where('id',$transaction['id']);
        $this->db->update('transaction',$data); //update transactions expired
        $this->db->update('pending_transactions',$data); //update pending transactions expired
      }
    }
  }

  public function update_pending_transaction($status,$transaction_id){
    $info = array(
      'status' => $status,
      'closed' => 1
    );
    $this->db->where('transaction_id',$transaction_id)->update('pending_transactions',$info);
  }

  public function close_expired_transaction($transaction_id){
    $info = array(
      'closed' => 1
    );
    $this->db->where('id',$transaction_id)->update('transactions',$info);
    $this->db->where('transaction_id',$transaction_id)->update('transactions',$info);
  }
  
}
