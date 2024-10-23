<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bookingpaymentController extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('bookingpaymentModel');
    }


    function index()
	{

		if (empty($this->session->userdata('user_id'))) {
			redirect(site_url('loginController'));
		}else{
			$this->load->view('BookingPaymentMainte/bookingpayment');
		}
	}


    function get_booking_list()
    {

        if (!empty($this->session->userdata('user_id'))) {

            $filteringConfig = array(
                "search" => $_POST['search'],
                "status"    => !empty($_POST['status']) ? $_POST['status'] : '1, 0',
                "sortOrder" => $_POST['sortOrder'],
                "sortBy"    => $_POST['sortBy'],
                "limit"     => (int) $_POST['limit'],
                "pagenum"   => (int) $_POST['pagenum']
            );

            $output['record'] = $this->bookingpaymentModel->get_table_data($filteringConfig);
            $output['recordcount'] = $this->bookingpaymentModel->get_table_data($filteringConfig, true);
            $output['pagecount'] = ceil($output['recordcount'] / $filteringConfig['limit']);
            $output['pagenum'] = $filteringConfig['pagenum'];
            echo json_encode(array(
                'table' => $this->load->view('BookingPaymentMainte\tables\bookingpaymentable.php', $output, true),
                'pagination' => $this->load->view('pagination.php', $output, true),
                'recordcount' => $output['recordcount']
            ));

        } else {

            echo json_encode(array(
                'message' => 'error'
            ));

        }
    }


    function getfareamount(){

        $recordid = $_POST['recordid'];
        
        $result = $this->bookingpaymentModel->getfareamount($recordid);

        echo json_encode($result);

    }

    function updatestatus(){
        $recordid = $_POST['recordid'];

        $result = $this->bookingpaymentModel->updatestatus($recordid);

        echo json_encode($result);
    }

    

}

?>