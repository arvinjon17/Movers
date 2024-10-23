<?php
defined('BASEPATH') or exit('No direct script access allowed');

class storageManageModel extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_table_data($filteringConfig = [], $count = false){

        $search = "%" . $filteringConfig['search'] . "%";
        $status = $filteringConfig['status'];  
        $offset = ($filteringConfig['pagenum'] - 1) * $filteringConfig['limit'];     

        $sortBy = $filteringConfig['sortBy'];
        $sortOrder = $filteringConfig['sortOrder'];

        if (is_array($status)) {
            $status = implode(',', $status);
        }
            
        $sql = "SELECT 
                * 
                FROM storage
                WHERE activeflag IN ($status) AND (itemname LIKE ?)";

        if($count == true){

            $query = $this->db->query($sql, [$search]);
            return $query->num_rows();

        }else{
            if (!empty($sortBy) && !empty($sortOrder)) {
                if ($sortBy == 'adminFlag') {
                    $sql .= " ORDER BY
                        CASE 
                            WHEN adminflag = 1 THEN 'Admin'
                            WHEN adminflag = 0 THEN 'User'
                            ELSE 'unknown'
                        END $sortOrder LIMIT ?,?";
                } elseif ($sortBy == 'activeflag') {
                    $sql .= " ORDER BY
                        CASE 
                            WHEN activeflag = 1 THEN 'Active'
                            WHEN activeflag = 0 THEN 'Inactive'
                            ELSE 'unknown'
                        END $sortOrder LIMIT ?,?";
                } else {
    
                    $sql .= " ORDER BY $sortBy $sortOrder LIMIT ?,?";
                }
            } else {
                $sortBy = 'id';
                $sortOrder = 'ASC';
                $sql .= " ORDER BY $sortBy $sortOrder LIMIT ?,?";
            }
    
    
            $query = $this->db->query($sql, [$search, $offset, $filteringConfig['limit']]);
            return $query->result_array();
        }
       
     
    }

    function get_item($itemid = 0){
        
        $sql = "SELECT * FROM storage WHERE id = ?";
        $query = $this->db->query($sql, [$itemid]);
        return $query->row_array(); 

    }

    function check_itemname($data)
    {
        $itemname =  $data['itemname'];
        $itemid = $data['itemid'] ?? null;


        $sql  = 'SELECT itemname FROM storage WHERE itemname = ?';
        if($itemid){
            $sql .= "AND id != ?";
            $query =  $this->db->query($sql, array($itemname, $itemid));
        }else{
            $query =  $this->db->query($sql, array($itemname));
        }
        
        $result = $query->row_array();

        return $result;
    }

    function register_item($data)
    {

        $sql = "INSERT INTO storage (itemname, qty, type, createdby, createddate, activeflag) VALUES (?,?,?,?,?,?)";
        $this->db->query($sql, array(
            $data['itemname'],
            $data['qty'],
            $data['type'],
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
                itemname,
                qty,
                type
                
                FROM storage 
                WHERE id = ?";

        $query =  $this->db->query($sql, array($data['itemid']));
        $result = $query->row_array();

        return $result;
    }

    function edit_item($data){

        $sql = "UPDATE storage 
            SET itemname = ?, qty = ?, type = ?, updatedby = ?, updateddate = ?
            WHERE id = ?";

        $this->db->query($sql, array(
            $data['itemname'],
            $data['qty'],
            $data['type'],
            $data['updatedby'],
            $data['updateddate'],
            $data['itemid']
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function deactivate($itemid = 0){

            date_default_timezone_set('Asia/Kuala_Lumpur');
            $date = date('Y-m-d H:i:s');

        $sql = "UPDATE storage 
                SET activeflag = 0, updatedby = ?, updateddate = ?
                WHERE id = ?";

        $this->db->query($sql, array($this->session->userdata('user_name'), $date, $itemid));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    
    function activate($itemid = 0){

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $date = date('Y-m-d H:i:s');

        $sql = "UPDATE storage 
                SET activeflag = 1, updatedby = ?, updateddate = ?
                WHERE id = ?";

        $this->db->query($sql, array($this->session->userdata('user_name'), $date, $itemid));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
}