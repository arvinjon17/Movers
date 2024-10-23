<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loginModel extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function login_process($email = '', $hashedPassword = ''){

        //validate data

        //check creds

        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $query =  $this->db->query($sql, array($email, $hashedPassword));
        $result = $query->row_array();

        if ($query->num_rows() > 0) {
            return $result;
        } else {
            return false;
        }

        //
    }

}

?>