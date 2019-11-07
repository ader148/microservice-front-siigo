<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas_model extends CI_Model {

    function getArea(){
        $query = $this->db->get('areas');
        return $query->result();
    }
}