<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EliminarEmpleado extends CI_Controller {


    public function __construct()
	{
		parent:: __construct();
	
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

		$this->empleado_model->deleteEmpleado($idemp);
		
	}

}