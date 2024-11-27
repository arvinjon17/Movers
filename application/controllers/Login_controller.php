<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('loginModel');
    }

	function index()
	{

		if ($this->input->get('registration') == 'success') {
			$this->load->view('loginPage', ['registration_success' => true]);
		} else {

            if (!empty($this->session->userdata('user_id'))) {
                redirect(site_url('dashboardController'));
            }else{
                $this->load->view('loginPage');
            }
		}
	}

	function process_login()
    {

        if (!empty($this->session->userdata('user_id'))) {
            echo json_encode(true);
        } else {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $hashedPassword = md5($password);

            $user = $this->loginModel->login_process($email, $hashedPassword);

            if ($user['activeflag'] == 1) {

                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('user_name', $user['username']);
                $this->session->set_userdata('user_fullname', $user['name']);
                $this->session->set_userdata('user_email', $user['email']);
                $this->session->set_userdata('user_admin', $user['admin']);

                echo json_encode("success");

            } else if ($user['activeflag'] == 0){

                echo json_encode("deactivated");

            }else {

                echo json_encode("invalid");
            }
        }
    }
}
