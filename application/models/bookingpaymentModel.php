<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bookingpaymentModel extends CI_Model
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
                FROM booking
                WHERE paidflag IN ($status) AND (clientname LIKE ?)";

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

    function getfareamount($recordid = 0){

        $sql = "SELECT * FROM booking where id = ?";

        $query = $this->db->query($sql, [$recordid]);
        return $query->row_array();
        
    }

    function updatestatus($recordid = 0){

            date_default_timezone_set('Asia/Kuala_Lumpur');
            $date = date('Y-m-d H:i:s');

        $sql = "UPDATE booking 
                SET paidflag = 1, updatedby = ?, updateddate = ?, activeflag = 1
                WHERE id = ?";

        $this->db->query($sql, array($this->session->userdata('user_name'), $date, $recordid));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    
   
}