<?php
defined('BASEPATH') or exit('No direct script access allowed');

class registrationModel extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function check_email($data)
    {
        $email =  $data['email'];


        $sql  = 'SELECT email, username FROM users WHERE email = ?';
        $query =  $this->db->query($sql, array($email));
        $result = $query->row_array();

        return $result;
    }

    function check_username($data)
    {
        $username =  $data['username'];


        $sql  = 'SELECT email, username FROM users WHERE username = ?';
        $query =  $this->db->query($sql, array($username));
        $result = $query->row_array();

        return $result;
    }

    function register_user($data)
    {

        $sql = "INSERT INTO users (name, username, birthday, email, password, admin, createdby, createddate, activeflag) VALUES (?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array(
            $data['name'],
            $data['username'],
            $data['birthday'],
            $data['email'],
            $data['hashedpassword'],
            $data['adminflag'],
            $data['createdby'],
            $data['createddate'],
            $data['activeflag']
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    function checkchanges($data){

        $sql = "SELECT 
                name,
                username,
                birthday,
                email
                
                FROM users 
                WHERE id = ?";

        $query =  $this->db->query($sql, array($data['userid']));
        $result = $query->row_array();

        return $result;
    }

    function edit_user($data){

        $sql = "UPDATE users 
            SET name = ?, username = ?, birthday = ?, email = ?, password = ?, admin = ?, updatedby = ?, updateddate = ?
            WHERE id = ?";

        $this->db->query($sql, array(
            $data['name'],
            $data['username'],
            $data['birthday'],
            $data['email'],
            $data['hashedpassword'],
            $data['adminflag'],
            $data['updatedby'],
            $data['updateddate'],
            $data['userid']
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function deactivate($userid = 0){

            date_default_timezone_set('Asia/Kuala_Lumpur');
            $date = date('Y-m-d H:i:s');

        $sql = "UPDATE users 
                SET activeflag = 0, updatedby = ?, updateddate = ?
                WHERE id = ?";

        $this->db->query($sql, array($this->session->userdata('user_name'), $date, $userid));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    
    function activate($userid = 0){

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $date = date('Y-m-d H:i:s');

        $sql = "UPDATE users 
                SET activeflag = 1, updatedby = ?, updateddate = ?
                WHERE id = ?";

        $this->db->query($sql, array($this->session->userdata('user_name'), $date, $userid));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
}
