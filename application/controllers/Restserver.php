<?php
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/REST_Controller_Definitions.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Restserver extends CI_Controller
{

use REST_Controller {
    REST_Controller::__construct as private __resTraitConstruct;
    
}


//metodo post para crear producto
public function createProd_post(){

        $this->load->model('productos_model');

        $id=$this->input->post('id');
        $tenant_id=$this->input->post('tenant_id');
        $name=$this->input->post('name');
        $description=$this->input->post('description');
        $list_price=$this->input->post('list_price');

        
    $response=$this->productos_model->createProducto($id,$tenant_id,$name,$description,$list_price);

    if($response){
        $this->response([
            'status:' => true,
            'message'=>'Se creo el producto '.$id,
            'data'=>[]
        ]);
    }else{
        $this->response([
            'status:' => false,
            'message'=>'error al crear el producto '.$id,
            'data'=>[]
        ]);
    }
        
   
   
}


//metodo delete para eliminar
public function deleteProd_delete() {

    $this->load->model('productos_model');

    $idprod=$this->input->get('id');
    
    $response=$this->productos_model->deleteProducto($idprod);

    if($response){
        $this->response([
            'status:' => true,
            'message'=>'Se elimino el producto '.$idprod,
            'data'=>[]
        ]);
    }else{
        $this->response([
            'status:' => false,
            'message'=>'error al eliminar el producto '.$idprod,
            'data'=>[]
        ]);
    }

}  

//metodo put para UPDATE
public function updateProd_put(){

    $this->load->model('productos_model');

    //armamos la data para actualizar el producto
    $data = array(
        'tenant_id'=> $this->input->get('tenant_id'),
        'name'=> $this->input->get('name'),
        'description'=> $this->input->get('description'),
        'list_price'=> $this->input->get('list_price'),
    );

    $idprod=$this->input->get('id');

    $response=$this->productos_model->updateProducto($idprod,$data);

    if($response){
        $this->response([
            'status:' => true,
            'message'=>'Se actualizo el producto '.$idprod,
            'data'=>[]
        ]);
    }else{
        $this->response([
            'status:' => false,
            'message'=>'Error al actualizar el producto '.$idprod,
            'data'=>[]
        ]);
    }
}

}