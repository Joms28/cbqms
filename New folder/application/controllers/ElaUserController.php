<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ElaUserController extends CI_Controller {

  public function admin_user_login() {

    $this->form_validation->set_rules('username', 'Email Address', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("user/login");
		}
		else
		{
			if($this->user->user_login() ) {

				$this->session->set_userdata('user_id', $this->user->user_login());
        $this->session->set_userdata('user_level', 3);

				redirect(base_url() . "admin/dashboard");

			} else {

				$this->session->set_flashdata('login_error', 'Incorrect username or password!');

				redirect($_SERVER['HTTP_REFERER']);

			}
		}
  }

  public function admin_user_index() {

    if($this->session->userdata('user_level') != null) {

      if($this->session->userdata('user_level') == 1) {
        redirect(base_url() . "visitor-dashboard");
      }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      // if($this->session->userdata('user_level') == 3) {
      //   redirect(base_url() . "admin/dashboard");
      // }

    } else {
      redirect(base_url());
    }

    $session_id = $this->session->userdata('user_id');

    $data['user'] = $this->user->get_user($session_id);
    $data['transaction_cashier_complete'] = $this->main->get_total_transaction(1,3);
    $data['transaction_cashier_cancel'] = $this->main->get_total_transaction(1,2);
    $data['transaction_registrar_complete'] = $this->main->get_total_transaction(2,3);
    $data['transaction_registrar_cancel'] = $this->main->get_total_transaction(2,2);
    $data['transaction_cashier_pending'] = $this->main->get_total_pending(1);
    $data['transaction_registrar_pending'] = $this->main->get_total_pending(2);

    $this->load->view("user/dashboard", $data);
  }

  public function admin_user_profile() {

    if($this->session->userdata('user_level') != null) {

      if($this->session->userdata('user_level') == 1) {
        redirect(base_url() . "visitor-dashboard");
      }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      // if($this->session->userdata('user_level') == 3) {
      //   redirect(base_url() . "admin/dashboard");
      // }

    } else {
      redirect(base_url());
    }


    $session_id = $this->session->userdata('user_id');
    $data['user'] = $this->main->user_walkin_get_user($session_id);

    if (isset($_POST['editProfile'])) {
      $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]');
      $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]');
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[2]');
      $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[2]');

  		if ($this->form_validation->run() == FALSE)
  		{
        $this->load->view("user/setting", $data);
  		}
  		else
  		{
  			$this->main->user_update($session_id);

        $this->session->set_flashdata('respond-profile', 'Your profile is successfully updated.');

  			redirect(base_url() . "admin/setting");
  		}
    } else if(isset($_POST['editPassword'])){
      $this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[2]|matches[repassword]');
      $this->form_validation->set_rules('repassword', 'Re-Type Password', 'trim|required|min_length[2]');
  		if ($this->form_validation->run() == FALSE)
  		{
        $this->load->view("user/setting", $data);
  		}
  		else
  		{
  			$this->main->user_update_password($session_id);

        $this->session->set_flashdata('respond-profile', 'Your password is successfully changed.');

  			redirect(base_url() . "admin/setting");
  		}
    } else {
        $this->load->view("user/setting", $data);
    }
  }

  public function admin_user_change_password() {

    if($this->session->userdata('user_level') != null) {

      if($this->session->userdata('user_level') == 1) {
        redirect(base_url() . "visitor-dashboard");
      }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      // if($this->session->userdata('user_level') == 3) {
      //   redirect(base_url() . "admin/dashboard");
      // }

    } else {
      redirect(base_url());
    }


    $session_id = $this->session->userdata('user_id');

    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|matches[re-password]');
    $this->form_validation->set_rules('re-password', 'Re-Type Password', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view("user/setting_change_password");
		}
		else
		{
			$this->user->user_update_password($session_id);

			redirect(base_url() . "admin/setting");
		}


  }

  public function admin_department() {

    if($this->session->userdata('user_level') != null) {

      if($this->session->userdata('user_level') == 1) {
        redirect(base_url() . "visitor-dashboard");
      }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      // if($this->session->userdata('user_level') == 3) {
      //   redirect(base_url() . "admin/dashboard");
      // }

    } else {
      redirect(base_url());
    }


    $data['users'] = $this->user->user_department_list();

    $session_id = $this->session->userdata('user_id');

    $data['user'] = $this->user->get_user($session_id);
    $this->load->view("user/depertment", $data);

  }

  public function admin_department_create() {

    if($this->session->userdata('user_level') != null) {

      if($this->session->userdata('user_level') == 1) {
        redirect(base_url() . "visitor-dashboard");
      }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      // if($this->session->userdata('user_level') == 3) {
      //   redirect(base_url() . "admin/dashboard");
      // }

    } else {
      redirect(base_url());
    }


    $session_id = $this->session->userdata('user_id');

    $data['user'] = $this->user->get_user($session_id);
    $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|is_unique[users.username]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|matches[re-password]');
    $this->form_validation->set_rules('re-password', 'Re-Type Password', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view("user/department_create",$data);
		}
		else
		{
			$this->user->create_account();

      $this->session->set_flashdata('respond-department', 'Successfully created an account.');

			redirect(base_url() . "admin/department");
		}

  }

  public function admin_transaction_history() {

  }

  public function admin_member() {

    if($this->session->userdata('user_level') != null) {

      if($this->session->userdata('user_level') == 1) {
        redirect(base_url() . "visitor-dashboard");
      }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      // if($this->session->userdata('user_level') == 3) {
      //   redirect(base_url() . "admin/dashboard");
      // }

    } else {
      redirect(base_url());
    }


    $session_id = $this->session->userdata('user_id');

    $data['user'] = $this->user->get_user($session_id);
    $data['users'] = $this->user->user_account_list();

    $this->load->view("user/account", $data);

  }

  public function admin_member_create() {

    if($this->session->userdata('user_level') != null) {

      if($this->session->userdata('user_level') == 1) {
        redirect(base_url() . "visitor-dashboard");
      }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      // if($this->session->userdata('user_level') == 3) {
      //   redirect(base_url() . "admin/dashboard");
      // }

    } else {
      redirect(base_url());
    }


    $session_id = $this->session->userdata('user_id');

    $data['user'] = $this->user->get_user($session_id);
    $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|is_unique[users.username]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|matches[re-password]');
    $this->form_validation->set_rules('re-password', 'Re-Type Password', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view("user/account_create",$data);
		}
		else
		{
			$this->user->create_account();

      $this->session->set_flashdata('respond-student', 'Successfully created an account.');

			redirect(base_url() . "admin/account");
		}

  }

  public function logout() {

    $this->session->sess_destroy();
    redirect(base_url() . "admin/login");

  }

}
