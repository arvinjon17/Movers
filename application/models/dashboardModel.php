<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboardModel extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getusercount(){


        $sql = "SELECT 
                MONTHNAME(createddate) AS month, 
                COUNT(*) AS user_count
                FROM 
                    users
                WHERE 
                    YEAR(createddate) = YEAR(CURDATE())
                GROUP BY 
                    MONTH(createddate)
                ORDER BY 
                    MONTH(createddate)";


        $query =  $this->db->query($sql);
        $result = $query->result_array();

        return $result;
    }

    function getitemcount(){


        $sql = "SELECT itemname, sum(qty) as qty FROM storage GROUP BY itemname;";

        $query =  $this->db->query($sql);
        $result = $query->result_array();

        return $result;
    }

    function getbookingpayment(){

        $sql = "SELECT 
                MONTHNAME(createddate) AS month, 
                COUNT(*) AS BookingCount
                FROM 
                    booking
                WHERE 
                    YEAR(createddate) = YEAR(CURDATE())
                GROUP BY 
                    MONTH(createddate)
                ORDER BY 
                    MONTH(createddate)";

        $query =  $this->db->query($sql);
        $result = $query->result_array();

        return $result;
    }

    function getpayment(){
        $sql = "SELECT 
        MONTHNAME(createddate) AS month, 
        COUNT(paidflag) AS paidCount
        FROM 
            booking
        WHERE 
            YEAR(createddate) = YEAR(CURDATE()) AND paidflag = 1
        GROUP BY 
            MONTH(createddate)
        ORDER BY 
            MONTH(createddate)";

        $query =  $this->db->query($sql);
        $result = $query->result_array();

        return $result;
    }


}