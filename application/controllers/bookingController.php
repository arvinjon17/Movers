<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bookingController extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('bookingModel');
    }

    function index()
	{

		if (empty($this->session->userdata('user_id'))) {
			redirect(site_url('Login_controller'));
		}else{

			$this->load->view('Booking/booking');
		}
	}

    function process_payment(){

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $date = date('Y-m-d H:i:s');

        $data = array(
            'drivername' => $_POST['drivername'],
            'clientname' => $_POST['clientname'],
            'tripfrom' => $_POST['tripfrom'],
            'tripto' => $_POST['tripto'],
            'service' => $_POST['service'],
            'amount' => $_POST['amount'],
            'tips' => $_POST['tips'],
            'totalamount' => $_POST['totalamount'],
            'paid' => $_POST['paid'],
            'createdby' => $this->session->userdata('user_name') ?? null,
            'createddate' => $date,
            'activeflag' => $_POST['activeflag']
        );

        $output = $this->bookingModel->process_payment($data);

        if($output){
            echo json_encode('success');
        }else{
            echo json_encode('error');
        }
        

    }

}

?>