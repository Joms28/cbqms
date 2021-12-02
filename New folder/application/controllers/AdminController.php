<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

  public function login() {

    if(isset($_POST['loginSubmit'])) {

      $username = $this->input->post('email');
      $password = $this->input->post('password');

      if(!empty($username) && !empty($password)) {

        if($this->admin_model->check_login($username,$password)) {

          $user = $this->admin_model->loginGetInfo($this->admin_model->check_login($username,$password));

          $this->session->set_userdata('user_id', $user['id']);

          if($user['acc_level'] == 1) {
            $this->session->set_userdata('user_restriction', '1');
            redirect(base_url(). "student/index");
          } else if($user['acc_level'] == 2) {
            $this->session->set_userdata('user_restriction', '2');
            redirect(base_url(). "evaluator/index");
          } else {
            $this->session->set_userdata('user_restriction', '3');
            redirect(base_url(). "admin/subject");
          }

          $this->session->set_flashdata('login_error', $user['acc_level']);

        } else {
          $this->session->set_flashdata('login_error', 'Incorrect username or password');
        }


      } else {
        $this->session->set_flashdata('login_error', 'Fill all fields');
      }

      redirect($_SERVER['HTTP_REFERER']);
    }

    $this->load->view ('login');

  }

  public function logout() {
    $this->session->sess_destroy();
    redirect(base_url(). "login");
  }

  public function index() {

    if(!$this->session->has_userdata('user_id') || $this->session->userdata('user_restriction') != 3) {
      redirect(base_url() . "login");
    }

    $this->load->view ('admin/index');
  }

  public function subject() {

    if(!$this->session->has_userdata('user_id') || $this->session->userdata('user_restriction') != 3) {
      redirect(base_url() . "login");
    }

    $data['courses'] = $this->admin_model->getCourses();

    $this->load->view('admin/subject', $data);
  }

  public function course($id) {

    if(!$this->session->has_userdata('user_id') || $this->session->userdata('user_restriction') != 3) {
      redirect(base_url() . "login");
    }

    $data['subjects'] = $this->admin_model->getSubjects($id);
    $data['course'] = $this->admin_model->getCourse($id);

    $this->load->view('admin/course', $data);

  }

  public function courseSubject($id) {

    if(!$this->session->has_userdata('user_id') || $this->session->userdata('user_restriction') != 3) {
      redirect(base_url() . "login");
    }

    $data['subjects'] = $this->admin_model->getSubjects($id);
    $data['course'] = $this->admin_model->getCourse($id);

    $this->form_validation->set_rules('code', 'Subject Code', 'trim|required|min_length[2]|max_length[12]');
    $this->form_validation->set_rules('name', 'Subject Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('unit', 'Subject Unit(s)', 'trim|required');

    if ($this->form_validation->run() == TRUE)
    {

      $this->admin_model->addSubject($id);

      $this->session->set_flashdata('create_subject', 'Success, Subject is created!');

      redirect(base_url(). "admin/subject/course/" . $id);

    }
    else
    {
        $this->load->view('admin/course_create', $data);
    }

  }

  public function viewSubject($id, $subject_id) {

    if(!$this->session->has_userdata('user_id') || $this->session->userdata('user_restriction') != 3) {
      redirect(base_url() . "login");
    }

    $data['subjects'] = $this->admin_model->getSubjects($id);
    $data['subject'] = $this->admin_model->getSubject($subject_id);
    $data['course'] = $this->admin_model->getCourse($id);

    $this->form_validation->set_rules('code', 'Subject Code', 'trim|required|min_length[2]|max_length[12]');
    $this->form_validation->set_rules('name', 'Subject Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('unit', 'Subject Unit(s)', 'trim|required');

    if ($this->form_validation->run() == TRUE)
    {

      $this->admin_model->updateSubject($subject_id);

      $this->session->set_flashdata('create_subject', 'Success, Subject is updated!');

      redirect(base_url(). "admin/subject/course/" . $id);

    }
    else
    {
        $this->load->view('admin/course_view', $data);
    }

  }

  public function student() {

    if(!$this->session->has_userdata('user_id') || $this->session->userdata('user_restriction') != 3) {
      redirect(base_url() . "login");
    }

    $data['students'] = $this->admin_model->getStudents();

    $this->load->view ('admin/student', $data);
  }

  public function studentCreate() {

    if(!$this->session->has_userdata('user_id') || $this->session->userdata('user_restriction') != 3) {
      redirect(base_url() . "login");
    }

    $data['courses'] = $this->admin_model->getCourses();

    $this->form_validation->set_rules('student_no', 'Subject No.', 'trim|required|min_length[2]|max_length[10]');
    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
    $this->form_validation->set_rules('age', 'Age', 'trim|required');
    $this->form_validation->set_rules('address', 'Address', 'trim|required');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|is_unique[users.email]');
    $this->form_validation->set_rules('contact', 'Contact No.', 'trim|required');

    if ($this->form_validation->run() == TRUE)
    {

      $this->admin_model->addStudent();

      $this->send($this->input->post('email'), $this->input->post('email'), $this->input->post('password'));

      $this->session->set_flashdata('create_student', 'Success, Student is created!');

      redirect(base_url(). "admin/student");

    }
    else
    {
        $this->load->view ('admin/student_create', $data);
    }
  }

  public function evaluator() {
    if(!$this->session->has_userdata('user_id') || $this->session->userdata('user_restriction') != 3) {
      redirect(base_url() . "login");
    }

    $data['evaluators'] = $this->admin_model->getEvaluators();
    $this->load->view ('admin/evaluator', $data);
  }

  public function createEvaluator() {

    if(!$this->session->has_userdata('user_id') || $this->session->userdata('user_restriction') != 3) {
      redirect(base_url() . "login");
    }

    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
    $this->form_validation->set_rules('age', 'Age', 'trim|required');
    $this->form_validation->set_rules('address', 'Address', 'trim|required');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|is_unique[users.email]');
    $this->form_validation->set_rules('contact', 'Contact No.', 'trim|required');

    if ($this->form_validation->run() == TRUE)
    {

      $this->admin_model->addEvaluator();

      $this->send($this->input->post('email'), $this->input->post('email'), $this->input->post('password'));

      $this->session->set_flashdata('create_student', 'Success, Evaluator is created!');

      redirect(base_url(). "admin/evaluator");

    }
    else
    {
        $this->load->view ('admin/evaluator_create');
    }

  }

  public function email_template2($username,$password){

    $_tempalte = '';
    $_tempalte .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
    $_tempalte .= '<html xmlns="http://www.w3.org/1999/xhtml">';
    $_tempalte .= '<head>';
    $_tempalte .= '<title>STUDENT EVALUATION MANAGEMENT SYSTEM</title>';
    $_tempalte .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    $_tempalte .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
    $_tempalte .= '</head>';
    $_tempalte .= '<body>';
    $_tempalte .= 'Welcome to STUDENT EVALUATION MANAGEMENT SYSTEM.  ';
    $_tempalte .= '<br><br>';
    $_tempalte .= 'Account Information<br>';
    $_tempalte .= 'Username: <b>' . $username . '</b><br>';
    $_tempalte .= 'Password: <b>' . $password . '</b>';
    $_tempalte .= '</body>';
    $_tempalte .= '</html>';

    return $_tempalte;

  }

  public function send($email,$username,$password) {

    $config = Array(
      'mailtype' => 'html',
      'protocol' => 'smtp',
      'smtp_host' => 'smtp.gmail.com',
      'smtp_port' => 465,
      'smtp_user' => 'sems202101@gmail.com',
      'smtp_pass' => 'Sems2021!',
      'smtp_crypto' => 'ssl',
      'crlf' => "\r\n",
      'newline' => "\r\n",
        'charset' => 'utf-8',
        'wordwrap' => TRUE
    );
    // $config = Array(
    //   'mailtype' => 'html',
    //   'protocol' => 'smtp',
    //   'smtp_host' => 'smtp.mailtrap.io',
    //   'smtp_port' => 465,
    //   'smtp_user' => '3501eb00e27c36',
    //   'smtp_pass' => '40c64df3c653b4',
    //   'crlf' => "\r\n",
    //   'newline' => "\r\n"
    // );

    $this->email->initialize($config);

    $this->email->from('sems202101@gmail.com', 'STUDENT EVALUATION MANAGEMENT SYSTEM');

    $this->email->to($email);

    $this->email->subject('STUDENT EVALUATION MANAGEMENT SYSTEM');

    $this->email->message($this->email_template2($username,$password));

    if($this->email->send()) {
      echo "asd";
    } else {
      echo $this->email->print_debugger();
    }

  }

  public function profile() {

    if(isset($_POST['changePassword'])) {

      $id = $this->input->post('id');
      $old = $this->input->post('old');
      $new = $this->input->post('new');
      $retype = $this->input->post('retype');

      if(!empty($old) && !empty($new) && !empty($retype)) {

        if($new == $retype) {

          if($this->admin_model->checkOldPassword($id, $old)) {

            $this->admin_model->updatePassword($id, $new);
            $this->session->set_flashdata('changePassword', 'Password successfully changed');

          } else {
            $this->session->set_flashdata('changePasswordError', 'Old password not match');
          }

        } else {
          $this->session->set_flashdata('changePasswordError', 'New password not match');
        }

      } else {
        $this->session->set_flashdata('changePasswordError', 'Fill all fields');
      }



      redirect($_SERVER['HTTP_REFERER']);
    }
    $this->load->view ('admin/profile');
  }
}
