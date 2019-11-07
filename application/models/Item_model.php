<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {

    function create($data)
    {
        $this->db->insert('tbl_item', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
    }

    function show($word, $init, $mount){
        

        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->join('tbl_locate', 'tbl_item.item_locate = tbl_locate.loc_id', 'left');
        $this->db->limit($mount, 0);
        $this->db->like('tbl_item.item_name', $word);

        $query = $this->db->get();
        
        return $query->result();
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

    public function pagination(){
        $query = $this->db->count_all('tbl_item');
        return $query;
    }

}