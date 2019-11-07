<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_model extends CI_Model {

    function create($data)
    {
        $this->db->insert('empleados', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
    }

    function show(){
        
        $this->db->select('empleados.id as empid, empleados.nombre, empleados.email,empleados.sexo, empleados.area_id, empleados.description, empleados.boletin,areas.area');
        $this->db->from('empleados');
        $this->db->join('areas', 'empleados.area_id = areas.id', 'inner');
       

        $query = $this->db->get();

        
        
        
        return $query->result();
       
    }


    function deleteEmpleado($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('empleados');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
    }

    function edit($id){

        $data = array('item_id' => $id);

        $query = $this->db->get_where('tbl_item', $data);
        $res = $query->row();

        $swap = $res->item_state;

        if($swap == 1){
            $swap = 0;
        }else{
            $swap = 1;
        }
        $this->db->set('item_state', $swap);
        $this->db->where('item_id', $id);
        $this->db->update('tbl_item');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
    }


    function getEmledoById($idEmp){
        $query = $this->db->query("SELECT * from empleados where empleados.id=".$idEmp);
        $result = $query->result_array();
        return $result;
    }


    public function pagination(){
        $query = $this->db->count_all('tbl_item');
        return $query;
    }

}