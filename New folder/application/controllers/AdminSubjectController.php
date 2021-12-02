<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSubjectController extends CI_Controller {

  public function index(){

    $data['subjects'] = $this->subject->getSubjects();

    $this->load->view ('admin/admin-subject-management', $data);
  }

  public function create(){

    $this->form_validation->set_rules('code', 'Subject Code', 'trim|required|min_length[2]|max_length[12]|is_unique[subjects.code]');
    $this->form_validation->set_rules('name', 'Subject Name', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view ('admin/admin-subject-create');
		}
		else
		{
			$this->subject->createSubject();

			redirect(base_url() . "cms/subject");
		}

  }

  public function update($id) {

    $this->form_validation->set_rules('code', 'Subject Code', 'trim|required|min_length[2]|max_length[12]');
    $this->form_validation->set_rules('name', 'Subject Name', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == TRUE)
		{
      $this->subject->updateSubject($id);
      redirect(base_url() . "cms/subject");
		} else {
      redirect(base_url() . "cms/subject");
    }

  }

  public function delete($id) {

    $this->subject->deleteSubject($id);
    redirect(base_url() . "cms/subject");

  }


}
