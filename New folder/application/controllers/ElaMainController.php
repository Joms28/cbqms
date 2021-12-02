<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ElaMainController extends CI_Controller {

  public function  __construct(){
    parent::__construct();
  }

  public function tv() {

    $data['user'] = $this->main->user_walkin_get_user(9999);
    $data['data_cashiers'] = $this->main->get_dashboard_cashier_data();
    $data['data_registrars'] = $this->main->get_dashboard_registrar_data();
    $data['data_priorities'] = $this->main->get_dashboard_priority_data();

    $data['bleep'] = $this->main->check_bleep();
    $this->load->view("user/tv",$data);

  }

  public function bleep($id) {

    $this->main->update_bleep(1);

    redirect(base_url() . "employee-appointment/" . $id);

  }

  public function index() {

    $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view("user/visitor/main");
		}
		else
		{
			$id = $this->main->user_walkin_cashier_insert_user();

			redirect(base_url() . "walkin-ticket/" . $id);
		}


  }

  public function main_walk_in_cashier() {


    $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view("user/visitor/walkin_cashier");
		}
		else
		{
			$id = $this->main->user_walkin_cashier_insert_user();

			redirect(base_url() . "walkin-ticket/" . $id);
		}
  }

  public function main_walk_in_registrar() {

    $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view("user/visitor/walkin_registrar");
		}
		else
		{
			$id = $this->main->user_walkin_registrar_insert_user();

			redirect(base_url() . "walkin-ticket/" . $id);
		}

  }

  public function main_walk_in_ticket($id) {

    $data['trans'] = $this->main->user_walkin_get_transaction($id);
    $data['transactions'] = $this->main->user_walkin_get_transaction_by_date($data['trans']['sched_date']);
    $data['users'] = $this->main->user_walkin_get_user($data['trans']['user_id']);

    $this->load->view("user/visitor/walkin_ticket", $data);
  }

  public function main_sign_up() {

    $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|is_unique[users.username]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|matches[repassword]');
    $this->form_validation->set_rules('repassword', 'Re-Type Password', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
      $this->load->view("user/visitor/signup");
		}
		else
		{
			$this->main->user_create();

			redirect(base_url() . "");
		}


  }

  public function main_sign_in() {

    $this->form_validation->set_rules('username', 'Email Address', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("user/visitor/login");
		}
		else
		{
			if($this->main->user_login() ) {

				$this->session->set_userdata('user_id', $this->main->user_login());
        $this->session->set_userdata('user_level', 1);
				redirect(base_url() . "visitor-dashboard");

			} else {

				$this->session->set_flashdata('login_error', 'Incorrect username or password!');

				redirect($_SERVER['HTTP_REFERER']);

			}
		}

  }

  public function main_forget_password() {

    $this->form_validation->set_rules('email', 'Email Address', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("user/visitor/forgot_email");
		}
		else
		{
			if($this->main->check_email($this->input->post('email')) ) {

        $code = rand(1111,9999);
        $id = $this->main->create_forgot($this->main->check_email($this->input->post('email')),$code);




        //   $this->load->library('Phpmailer_lib');
        //   $mail = $this->phpmailer_lib->load();


        // /* SMTP configuration */
        // $mail->isSMTP();
        // $mail->SMTPDebug = 2;
        // $mail->Host     = 'sg2plzcpnl487154.prod.sin2.secureserver.net';
        // $mail->SMTPAuth = false;
        // $mail->SMTPAutoTLS = false;
        // $mail->Username = 'support@cbqms.live';
        // $mail->Password = 'Password1!';
        // $mail->Port = 465;

        // $mail->setFrom('info@example.com', 'CodexWorld');
        // $mail->addReplyTo('info@example.com', 'CodexWorld');

        // /* Add a recipient */
        // $mail->addAddress($this->input->post('email'));

        // /* Add cc or bcc */
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // /* Email subject */
        // $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';

        // /* Set email format to HTML */
        // $mail->isHTML(true);

        // /* Email body content */
        // $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
        // <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        // $mail->Body = $mailContent;

        // /* Send email */
        // if(!$mail->send()){
        //     echo 'Mail could not be sent.';
        //     echo 'Mailer Error: ' . $mail->ErrorInfo;
        //     exit();
        // }else{
        //     echo 'Mail has been sent';
        //     exit();
        // }


        $this->send($this->input->post('email'),$code);
        redirect(base_url() . "forgot/verif/" . $id);

			} else {

				$this->session->set_flashdata('login_error', 'Email not found!');

				redirect($_SERVER['HTTP_REFERER']);

			}
		}

  }

  public function email_template2($code){

    $_tempalte = '';
    $_tempalte .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
    $_tempalte .= '<html xmlns="http://www.w3.org/1999/xhtml">';
    $_tempalte .= '<head>';
    $_tempalte .= '<title>FORGOT PASSWORD</title>';
    $_tempalte .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    $_tempalte .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
    $_tempalte .= '</head>';
    $_tempalte .= '<body>';
    $_tempalte .= 'Hi Student,<br><br>';
    $_tempalte .= 'If you requested to reset the password for your CBQMS account. Use the confirmation code below to complete the process.<br><br>';
    $_tempalte .= 'Code: ' . $code;
    $_tempalte .= '<br><br>If you didnt make this request, please ignore this email.';
    $_tempalte .= '<br><br>Thanks, the STI Sta. Maria team.';
    $_tempalte .= '</body>';
    $_tempalte .= '</html>';

    return $_tempalte;

  }

  public function send($email,$code) {

    $config = Array(
      'mailtype' => 'html',
      'protocol' => 'smtp',
      'smtp_host' => 'sg2plzcpnl487154.prod.sin2.secureserver.net',
      'smtp_port' => 465,
      'smtp_user' => 'support@cbqms.live',
      'smtp_pass' => 'Password1!',
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
    $this->email->set_newline("\r\n");

    $this->email->from('support@cbqms.live', 'FORGOT PASSWORD');

    $this->email->to($email);

    $this->email->subject('FORGOT PASSWORD');

    $this->email->message($this->email_template2($code));

    if($this->email->send()) {
      echo "asd";
    } else {
      echo $this->email->print_debugger();
    }

  }

  public function main_forget_password_verification($id) {

    $data['forgot'] = $this->main->get_forgot($id);


    $this->form_validation->set_rules('code', 'Code', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("user/visitor/forgot_code",$data);
		}
		else
		{
			if($this->main->check_code($data['forgot']['user_id'],$this->input->post('code')) ) {

        $this->main->forgot_update_status(1,$id);
        redirect(base_url() . "forgot/change/" . $id);

			} else {

				$this->session->set_flashdata('login_error', 'Code is incorect!');

				redirect($_SERVER['HTTP_REFERER']);

			}
		}

  }

  public function main_forget_change_password($id) {

    $data['forgot'] = $this->main->get_forgot($id);

    $this->form_validation->set_rules('pass', 'New Password', 'required|min_length[8]');
    $this->form_validation->set_rules('repass', 'Re-Type Password', 'required|min_length[8]|matches[repass]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("user/visitor/forgot_change_pass",$data);
		}
		else
		{

        $this->main->forgot_changepassword($data['forgot']['user_id']);

		    $this->session->set_flashdata('login_success', 'Password successfully change!');

		    redirect(base_url() . "login");

		}



  }

  public function visitor_dashboard() {

    if($this->session->userdata('user_level') != null) {

      // if($this->session->userdata('user_level') == 1) {
      //   redirect(base_url() . "visitor-dashboard");
      // }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      if($this->session->userdata('user_level') == 3) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $session_id = $this->session->userdata('user_id');
    $data['user'] = $this->main->user_walkin_get_user($session_id);
    $data['data_cashiers'] = $this->main->get_dashboard_cashier_data();
    $data['data_registrars'] = $this->main->get_dashboard_registrar_data();
    $data['data_priorities'] = $this->main->get_dashboard_priority_data();

    $this->load->view("user/visitor/dashboard", $data);
  }

  public function visitor_profile() {

    if($this->session->userdata('user_level') != null) {

      // if($this->session->userdata('user_level') == 1) {
      //   redirect(base_url() . "visitor-dashboard");
      // }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

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
      $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[2]');

  		if ($this->form_validation->run() == FALSE)
  		{
        $this->load->view("user/visitor/profile", $data);
  		}
  		else
  		{
  			$this->main->user_update($session_id);

        $this->session->set_flashdata('respond-profile', 'Your profile is successfully updated.');

  			redirect(base_url() . "visitor-profile");
  		}
    } else if(isset($_POST['editPassword'])){
      $this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[2]|matches[repassword]');
      $this->form_validation->set_rules('repassword', 'Re-Type Password', 'trim|required|min_length[2]');
  		if ($this->form_validation->run() == FALSE)
  		{
        $this->load->view("user/visitor/profile", $data);
  		}
  		else
  		{
  			$this->main->user_update_password($session_id);

        $this->session->set_flashdata('respond-profile', 'Your password is successfully changed.');

  			redirect(base_url() . "visitor-profile");
  		}
    } else {
        $this->load->view("user/visitor/profile", $data);
    }


  }

  public function visitor_form_registrar() {

    if($this->session->userdata('user_level') != null) {

      // if($this->session->userdata('user_level') == 1) {
      //   redirect(base_url() . "visitor-dashboard");
      // }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      if($this->session->userdata('user_level') == 3) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $session_id = $this->session->userdata('user_id');
    $data['user'] = $this->main->user_walkin_get_user($session_id);
    $data['trans'] = $this->main->get_user_sched_registrar($session_id);
    $data['transactions'] = ($data['trans'] != null ? $this->main->user_walkin_get_transaction_by_date($data['trans']['sched_date']) : array());

    $this->form_validation->set_rules('transaction', 'Transaction', 'trim|required|min_length[2]');

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view("user/visitor/registrar", $data);
    }
    else
    {
      $this->main->user_set_appointment_registrar($session_id);

      $this->session->set_flashdata('respond-registrar', 'You successfully created an appointment.');

      redirect(base_url() . "visitor-registrar");
    }
  }

  public function visitor_form_registrar_ticket() {

    if($this->session->userdata('user_level') != null) {

      // if($this->session->userdata('user_level') == 1) {
      //   redirect(base_url() . "visitor-dashboard");
      // }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      if($this->session->userdata('user_level') == 3) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $id = $this->session->userdata('user_id');
    $data['trans'] = $this->main->get_user_sched_registrar($id);
    $data['transactions'] = $this->main->user_walkin_get_transaction_by_date($data['trans']['sched_date']);
    $data['users'] = $this->main->user_walkin_get_user($id);

    $this->load->view("user/visitor/registrar_ticket", $data);
  }

  public function visitor_from_registrar_delete($id) {

    $this->main->delete_appointment($id);

    $this->session->set_flashdata('respond-registrar', 'You successfully cancelled your appointment.');

    redirect(base_url() . "visitor-registrar");

  }

  public function visitor_form_cashier() {

    if($this->session->userdata('user_level') != null) {

      // if($this->session->userdata('user_level') == 1) {
      //   redirect(base_url() . "visitor-dashboard");
      // }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      if($this->session->userdata('user_level') == 3) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $session_id = $this->session->userdata('user_id');
    $data['user'] = $this->main->user_walkin_get_user($session_id);
    $data['trans'] = $this->main->get_user_sched_cashier($session_id);
    $data['transactions'] = ($data['trans'] != null ? $this->main->user_walkin_get_transaction_by_date($data['trans']['sched_date']) : array());

    $this->form_validation->set_rules('transaction', 'Transaction', 'trim|required|min_length[2]');

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view("user/visitor/cashier",$data);
    }
    else
    {
      $this->session->set_flashdata('respond-cashier', 'You successfully created an appointment.');
      $this->main->user_set_appointment_cashier($session_id);

      redirect(base_url() . "visitor-cashier");
    }

  }

  public function visitor_from_cashier_delete($id) {

    $this->main->delete_appointment($id);

    $this->session->set_flashdata('respond-cashier', 'You successfully cancelled your appointment.');

    redirect(base_url() . "visitor-cashier");

  }

  public function visitor_form_cashier_ticket() {

    if($this->session->userdata('user_level') != null) {

      // if($this->session->userdata('user_level') == 1) {
      //   redirect(base_url() . "visitor-dashboard");
      // }

      if($this->session->userdata('user_level') == 2) {
        redirect(base_url() . "employee-dashboard");
      }

      if($this->session->userdata('user_level') == 3) {
        redirect(base_url() . "admin/dashboard");
      }

    } else {
      redirect(base_url());
    }

    $id = $this->session->userdata('user_id');
    $data['trans'] = $this->main->get_user_sched_cashier($id);
    $data['transactions'] = $this->main->user_walkin_get_transaction_by_date($data['trans']['sched_date']);
    $data['users'] = $this->main->user_walkin_get_user($id);


    $this->load->view("user/visitor/cashier_ticket", $data);
  }

  public function visitor_view_registrar_schedule_ticket() {
    $this->load->view("user/visitor/registrar_ticket");
  }

  public function visitor_logout() {
    $this->session->sess_destroy();
    redirect(base_url() . "");
  }



}
