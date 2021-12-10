<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Employee extends CI_Controller {

  public function login() {
    $this->form_validation->set_rules('username', 'Email Address', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view("user/employee/login");
    }
    else
    {
      if($this->main->user_login_employee() ) {        

        
        redirect(base_url() . "employee-dashboard");

      } else {

        $this->session->set_flashdata('login_error', 'Incorrect username or password!');

        redirect($_SERVER['HTTP_REFERER']);

      }
    }

  }

  public function dashboard() {

    if($this->session->userdata('user_level') != null) {

      if($this->session->userdata('user_level') == 4) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $session_id = $this->session->userdata('user_id');

    $current_trans = $this->main->employee_check_have_transaction($session_id);

    if($current_trans != 0){
      redirect(base_url("employee-appointment/".$current_trans['id']));
    }
    else{
      $data['user'] = $this->user->get_user($session_id);
      $data['data_cashiers'] = $this->main->get_dashboard_cashier_data();
      $data['data_registrars'] = $this->main->get_dashboard_registrar_data();
      $data['data_priorities'] = $this->main->get_dashboard_priority_data();
  
      $this->load->view("user/employee/dashboard",$data);
    }    
  }

  public function profile() {

    if($this->session->userdata('user_level') != null) {

      if($this->session->userdata('user_level') == 1) {
        redirect(base_url() . "visitor-dashboard");
      }

      // if($this->session->userdata('user_level') == 2) {
      //   redirect(base_url() . "employee-dashboard");
      // }

      if($this->session->userdata('user_level') == 3) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $session_id = $this->session->userdata('user_id');
    $data['user'] = $this->main->user_walkin_get_user($session_id);

    if (isset($_POST['editProfile'])) {
      $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]');
      $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]');
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[2]');

  		if ($this->form_validation->run() == FALSE)
  		{
        $this->load->view("user/employee/profile", $data);
  		}
  		else
  		{
  			$this->main->user_update($session_id);

        $this->session->set_flashdata('respond-profile', 'Your profile is successfully updated.');

  			redirect(base_url() . "employee-profile");
  		}
    } else if(isset($_POST['editPassword'])){
      $this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[2]|matches[repassword]');
      $this->form_validation->set_rules('repassword', 'Re-Type Password', 'trim|required|min_length[2]');
  		if ($this->form_validation->run() == FALSE)
  		{
        $this->load->view("user/employee/profile", $data);
  		}
  		else
  		{
  			$this->main->user_update_password($session_id);

        $this->session->set_flashdata('respond-profile', 'Your password is successfully changed.');

  			redirect(base_url() . "employee-profile");
  		}
    } else {
        $this->load->view("user/employee/profile", $data);
    }
  }

  public function log() {

    $session_id = $this->session->userdata('user_id');
    $data['user'] = $this->user->get_user($session_id);
    $data['logs'] = $this->main->get_all_transaction_by_id($session_id);
    $this->load->view("user/employee/log",$data);

  }

  public function processAppointment($id) {

    if($this->session->userdata('user_level') != null) {
     
      if($this->session->userdata('user_level') == 4) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $session_id = $this->session->userdata('user_id');

    if($this->main->check_if_has_agent_id($id)){
      $this->session->set_flashdata('respond-process','The transaction is already in process');
      redirect(base_url("employee-dashboard"));
    }
    else{
      $this->main->processAppointment($id,$session_id);

      redirect(base_url() . "employee-appointment/".$id);
    }
  }

  public function appointmentProcessing($id) {

    if($this->session->userdata('user_level') != null) {      

      if($this->session->userdata('user_level') == 4) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $session_id = $this->session->userdata('user_id');
    $data['user'] = $this->user->get_user($session_id);
    if($data['user']['level'] == 1) {
    $data['trans'] = $this->main->get_user_sched_cashier_by_id($id);
    } else if($data['user']['level'] == 2) {
    $data['trans'] = $this->main->get_user_sched_registrar_by_id($id);
    }
    $data['transactions'] = $this->main->user_walkin_get_transaction_by_date($data['trans']['sched_date']);
    $data['usr'] = $this->main->user_walkin_get_user($data['trans']['user_id']);

    $this->load->view("user/employee/appointment",$data);

  }

  public function processComplete($id) {

    if($this->session->userdata('user_level') != null) {
      
      if($this->session->userdata('user_level') == 3) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $this->main->processComplete($id);

    $this->session->set_flashdata('respond-process', 'You successfully completed the appointment.');

    redirect(base_url() . "employee-dashboard");
  }

  public function processCancel($id) {

    if($this->session->userdata('user_level') != null) {      

      if($this->session->userdata('user_level') == 4) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $this->main->processCancel($id);

    $this->session->set_flashdata('respond-process', 'You successfully cancelled the appointment.');

    redirect(base_url() . "employee-dashboard");
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect(base_url() . "employee-login");
  }



}
