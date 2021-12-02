<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminClassController extends CI_Controller {

  public function index(){

    $data['classes'] = $this->class_model->getClasses();

    $this->load->view ('admin/admin-class-management', $data);
  }

  public function create(){

    $this->form_validation->set_rules('name', 'Class Name', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view ('admin/admin-class-create');
		}
		else
		{
			$this->class_model->createClass();

			redirect(base_url() . "cms/class");
		}
  }


  public function viewClassSubject($id) {

    $data['teachers'] = $this->class_model->getTeacher();
    $data['class'] = $this->class_model->getClass($id);
    $data['subjects'] = $this->class_model->getSubjects($data['class']['level']);

    $this->load->view ('admin/admin-class-subject',$data);

  }

  public function update($id) {

    $this->class_model->closeClass($id);
    redirect(base_url() . "cms/class");

  }


}
