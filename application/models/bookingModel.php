<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bookingModel extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function process_payment($data = []){

        $sql = "INSERT INTO booking (drivername, clientname, tripfrom, tripto, service, amount, tip, total, createdby, createddate, paidflag, activeflag) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array(
            $data['drivername'],
            $data['clientname'],
            $data['tripfrom'],
            $data['tripto'],
            $data['service'],
            $data['amount'],
            $data['tips'],
            $data['totalamount'],
            $data['createdby'],
            $data['createddate'],
            $data['paid'],
            $data['activeflag']
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

}

?>
