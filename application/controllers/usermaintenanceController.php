<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usermaintenanceController extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('userMaintenanceModel');
    }

	function index()
	{

		if (empty($this->session->userdata('user_id'))) {
			redirect(site_url('Login_controller'));
		}else{
			$this->load->view('UserMaintenance/userMaintenance');
		}
	}

    function get_user_list()
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

            $output['user'] = $this->userMaintenanceModel->get_table_data($filteringConfig);
            $output['recordcount'] = $this->userMaintenanceModel->get_table_data($filteringConfig, true);
            $output['pagecount'] = ceil($output['recordcount'] / $filteringConfig['limit']);
            $output['pagenum'] = $filteringConfig['pagenum'];
            
            echo json_encode(array(
                'table' => $this->load->view('UserMaintenance/tables/userMaintenanceTable.php', $output, true),
                'pagination' => $this->load->view('pagination.php', $output, true),
                'recordcount' => $output['recordcount']
            ));

        } else {

            echo json_encode(array(
                'message' => 'error'
            ));

        }
    }

    function get_user()
    {

        if (!empty($this->session->userdata('user_id'))) {

            $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
            $output['user'] = $this->userMaintenanceModel->get_user($userid);

            echo json_encode(array(
                'user' => $output['user']
            ));
            
        } else {

            echo json_encode(array(
                'message' => 'error'
            ));

        }
    }

}

?>