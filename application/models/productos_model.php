<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {



    private $database = 'products';
	private $collection = 'Products';
    private $conn;
    

    function __construct() {
		parent::__construct();
		$this->load->library('mongodb');
		$this->conn = $this->mongodb->getConn();
	}

/*
    function deleteProducto($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ac_products');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
    }


   function updateProducto($id,$data){

    
        $this->db->where('id',$id);
        $this->db->update('ac_products',$data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
   }*/
   

   function createProducto($id,$tenant_id,$name,$description,$list_price){

        try {
            $product = array(
                'id' => $id,
                'tenant_id' => $tenant_id,
                'name'=>$name,
                'description'=>$description,
                'list_price'=>$list_price
            );
            
            $query = new MongoDB\Driver\BulkWrite();
            $query->insert($product);
            
            $result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
            
            if($result) {
                return TRUE;
            }
            
            return FALSE;
        } catch(MongoDB\Driver\Exception\RuntimeException $ex) {
            show_error('Error while saving Product: ' . $ex->getMessage(), 500);
        }

   }

  function updateProducto($id,$data){

    try {
        $query = new MongoDB\Driver\BulkWrite();
        $query->update(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => array('tenant_id' => $data['tenant_id'], 'name' => $data['name'], 'description'=>$data['description'], 'list_price'=>$data['list_price'])]);
        
        $result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
        
        if($result) {
            return TRUE;
        }
        
        return FALSE;
    } catch(MongoDB\Driver\Exception\RuntimeException $ex) {
        show_error('Error while updating Product: ' . $ex->getMessage(), 500);
    }

  }


    function deleteProducto($id)
    {
        try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->delete(['_id' => new MongoDB\BSON\ObjectId($id)]);
			
			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
			
			if($result) {
				return TRUE;
			}
			
			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while deleting Product: ' . $ex->getMessage(), 500);
		}
    }

}