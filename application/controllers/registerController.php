<?php
defined('BASEPATH') or exit('No direct script access allowed');

class registerController extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('registrationModel');
    }

    function index()
    {
        $this->load->view('registrationPage.php');
    }

    function process_register()
    {
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $date = date('Y-m-d H:i:s');

            $data = array(
                'name' => isset($_POST['name']) ? $_POST['name'] : null,
                'username' => isset($_POST['username']) ? $_POST['username'] : null,
                'birthday' => isset($_POST['bday']) ? $_POST['bday'] : null,
                'email' => isset($_POST['email']) ? $_POST['email'] : null,
                'hashedpassword' => !empty($_POST['password']) ? md5($_POST['password']) : null,
                'adminflag' => isset($_POST['adminFlag']) ? $_POST['adminFlag'] : 0,
                'createdby' => $this->session->userdata('user_name') ?? null,
                'createddate' => $date,
                'activeflag' => 1
            );

            if($data['name'] == '' || $data['birthday'] == '' || $data['email'] == '' || $data['hashedpassword'] == ''){
                $msg = 'null values';
                echo json_encode($msg);
            }else{

                
                $check_email = $this->registrationModel->check_email($data);
                $check_username = $this->registrationModel->check_username($data);

               
                if($check_email || $check_username){

                   if(!empty($check_email['email']) && !empty($check_username['username'])){
                        $msg = "duplicate_emailusername";
                   }else{
                        if(!empty($check_email['email'])){
                            $msg = "duplicateemail";
                        }

                        if(!empty($check_username['username'])){
                            $msg = "duplicateusername";
                        }
                   }

                    echo json_encode($msg);
                    
                }else{
                    $result = $this->registrationModel->register_user($data);

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

    function process_edituser()
    {
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $date = date('Y-m-d H:i:s');

            $data = array(
                'name' => isset($_POST['name']) ? $_POST['name'] : null,
                'username' => isset($_POST['username']) ? $_POST['username'] : null,
                'birthday' => isset($_POST['bday']) ? $_POST['bday'] : null,
                'email' => isset($_POST['email']) ? $_POST['email'] : null,
                'hashedpassword' => !empty($_POST['password']) ? md5($_POST['password']) : null,
                'adminflag' => isset($_POST['adminFlag']) ? $_POST['adminFlag'] : 0,
                'createdby' => $this->session->userdata('user_name') ?? null,
                'createddate' => $date,
                'updatedby' => $this->session->userdata('user_name') ?? null,
                'updateddate' => $date,
                'activeflag' => 1,
                'userid'    =>  isset($_POST['userid']) ? $_POST['userid'] : null,
            );

            $changes = $this->checkchanges($data);
            

            if($data['name'] == $changes['name'] && $data['birthday'] == $changes['birthday'] && $data['email'] == $changes['email'] && $data['hashedpassword'] == ''){
                $msg = 'no changes';
                echo json_encode($msg);
            }else{

                
                if($data['email'] != $changes['email']){

                    $check_email = $this->registrationModel->check_email($data);
                    $check_username = $this->registrationModel->check_username($data);

                    if($check_email || $check_username){

                        if(!empty($check_email['email']) && !empty($check_username['username'])){
                                $msg = "duplicate_emailusername";
                        }else{
                                if(!empty($check_email['email'])){
                                    $msg = "duplicateemail";
                                }
    
                                if(!empty($check_username['username'])){
                                    $msg = "duplicateusername";
                                }
                        }
    
                            echo json_encode($msg);
                            
                        }

                }else{

                        $result = $this->registrationModel->edit_user($data);

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

        $result = $this->registrationModel->checkchanges($data);

        return $result;

    }


    function deactivate(){

        $userid = $_POST['userid'];

        $this->registrationModel->deactivate($userid);

        echo json_encode(true);

    }

    function activate(){

        $userid = $_POST['userid'];

        $this->registrationModel->activate($userid);

        echo json_encode(true);

    }
}