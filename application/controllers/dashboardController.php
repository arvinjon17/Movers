<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboardController extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('dashboardModel');
    }

	function index()
	{

		if (empty($this->session->userdata('user_id'))) {
			redirect(site_url('Login_controller'));
		}else{

			$usercount = $this->getusercount();
			$itemcount = $this->getitemcount();
			$bookingcount = $this->getbookingpayment();
			$paymentcount = $this->getpayment();
			$this->load->view('dashboard', ['usercount' => $usercount, 'itemcount' => $itemcount, 'bookingcount' => $bookingcount, 'paymentcount' => $paymentcount]);
		}
	}

	function logout()
    {
		$initiate = $_POST['initiate'];

		if($initiate == 1){
			$this->session->sess_destroy();
			echo json_encode($initiate);
		}else{
			$this->session->sess_destroy();
			redirect(site_url("Login_controller/index"));
		}
    	
    }

	function getusercount(){

		$result = $this->dashboardModel->getusercount();
		return $result;

	}

	function getitemcount(){

		$result = $this->dashboardModel->getitemcount();
		return $result;

	}

	function getbookingpayment(){
		$result = $this->dashboardModel->getbookingpayment();
		return $result;
	}

	function getpayment(){
		$result = $this->dashboardModel->getpayment();
		return $result;
	}

}

?>