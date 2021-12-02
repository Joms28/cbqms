<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserController extends CI_Controller {

  public function index(){

    $data['users'] = $this->user->getUserTeacher();

    $this->load->view ('admin/admin-user-management', $data);
  }
  public function create(){

    $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('mname', 'Middle Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('contact', 'Contact No.', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view ('admin/admin-user-create');
		}
		else
		{
			$this->user->createUser();

			redirect(base_url() . "cms/user");
		}
  }

  public function student() {

    $data['users'] = $this->user->getUserStudent();

    $this->load->view ('admin/admin-user-student', $data);
  }

}
