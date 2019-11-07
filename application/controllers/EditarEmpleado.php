<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarEmpleado extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
	
		$this->load->model('areas_model');
		$this->load->model('roles_model');
		$this->load->model('empleado_model');
		$this->load->helper('url');
    }


    public function index()
	{
		
		if($this->input->get('emp')){
			$idemp=$this->input->get('emp');
		}else{
			$idemp=0;
		}

		$data["empleado"]=$this->empleado_model->getEmledoById($idemp);
		$data["areas"]=$this->areas_model->getArea();
		$data["roles"]=$this->roles_model->getRoles();
		$this->load->view('editar',$data);
	}


}