<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_model extends CI_Model {

    function getRoles(){
        $query = $this->db->get('roles');
        return $query->result();
    }
}