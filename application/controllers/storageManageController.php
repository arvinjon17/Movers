<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class storageManageController extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('storageManageModel');
    }


    function index()
	{

		if (empty($this->session->userdata('user_id'))) {
			redirect(site_url('loginController'));
		}else{
			$this->load->view('StorageManagement/storageManage');
		}
	}


    function get_item_list()
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

            $output['item'] = $this->storageManageModel->get_table_data($filteringConfig);
            $output['recordcount'] = $this->storageManageModel->get_table_data($filteringConfig, true);
            $output['pagecount'] = ceil($output['recordcount'] / $filteringConfig['limit']);
            $output['pagenum'] = $filteringConfig['pagenum'];
            echo json_encode(array(
                'table' => $this->load->view('StorageManagement\tables\storageManageTable.php', $output, true),
                'pagination' => $this->load->view('pagination.php', $output, true),
                'recordcount' => $output['recordcount']
            ));

        } else {

            echo json_encode(array(
                'message' => 'error'
            ));

        }
    }

    function get_item()
    {

        if (!empty($this->session->userdata('user_id'))) {

            $itemid = isset($_POST['itemid']) ? $_POST['itemid'] : '';
            $output['item'] = $this->storageManageModel->get_item($itemid);

            echo json_encode(array(
                'item' => $output['item']
            ));
            
        } else {

            echo json_encode(array(
                'message' => 'error'
            ));

        }
    }

    function process_register()
    {
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $date = date('Y-m-d H:i:s');

            $data = array(
                'itemname' => isset($_POST['itemname']) ? $_POST['itemname'] : null,
                'qty' => isset($_POST['qty']) ? $_POST['qty'] : null,
                'type' => isset($_POST['type']) ? $_POST['type'] : null,
                'createdby' => $this->session->userdata('user_name') ?? null,
                'createddate' => $date,
                'activeflag' => 1
            );

            // print_r($data);die();

            if($data['itemname'] == '' || $data['qty'] == '' || $data['type'] == ''){
                $msg = 'null values';
                echo json_encode($msg);
            }else{

                
                $check_itemname = $this->storageManageModel->check_itemname($data);

               
                if($check_itemname){

                    $msg = "duplicate_itemname";
                    echo json_encode($msg);
                    
                }else{
                    $result = $this->storageManageModel->register_item($data);

                    if ($result == true) {
                        $msg = "update";
                    } else {
                        $msg = "no_update";
                    }
            
                    echo json_encode($msg);
                }
                
            }

           

            
            
        // }
    }

    function process_edititem()
    {
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $date = date('Y-m-d H:i:s');

            $data = array(
                'itemname' => isset($_POST['itemname']) ? $_POST['itemname'] : null,
                'qty' => isset($_POST['qty']) ? $_POST['qty'] : null,
                'type' => isset($_POST['type']) ? $_POST['type'] : null,
                'updatedby' => $this->session->userdata('user_name') ?? null,
                'updateddate' => $date,
                'activeflag' => 1,
                'itemid'    =>  isset($_POST['itemid']) ? $_POST['itemid'] : null,
            );

            $changes = $this->checkchanges($data);
            

            if($data['itemname'] == $changes['itemname'] && $data['qty'] == $changes['qty'] && $data['type'] == $changes['type']){
                $msg = 'no changes';
                echo json_encode($msg);
            }else{

                
                $check_itemname = $this->storageManageModel->check_itemname($data);

               
                if($check_itemname){

                    $msg = "duplicate_itemname";
                    echo json_encode($msg);
                    
                }else{
                    $result = $this->storageManageModel->edit_item($data);

                    if ($result == true) {
                        $msg = "update";
                    } else {
                        $msg = "no_update";
                    }
            
                    echo json_encode($msg);
                }
                
            }

           

            
            
        // }
    }


    function checkchanges($data = []){

        $result = $this->storageManageModel->checkchanges($data);

        return $result;

    }


    function deactivate(){

        $itemid = $_POST['itemid'];

        $this->storageManageModel->deactivate($itemid);

        echo json_encode(true);

    }

    function activate(){

        $itemid = $_POST['itemid'];

        $this->storageManageModel->activate($itemid);

        echo json_encode(true);

    }

}

?>