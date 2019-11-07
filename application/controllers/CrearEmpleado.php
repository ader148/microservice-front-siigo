<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearEmpleado extends CI_Controller {


    
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
		$data["areas"]=$this->areas_model->getArea();
		$data["roles"]=$this->roles_model->getRoles();
		$this->load->view('crear',$data);
	}


	function crearEmpleado(){

		//var_dump('hola desde guardar');
		//die();

		if($this->input->is_ajax_request()){
			
			//verificar role
			$roles='';
			if(!empty($_POST['check_list'])) {
				foreach($_POST['check_list'] as $check) {
						//echo $check; 
						if($roles==''){
							$roles=$check;
						}else{
							$roles=$roles.'-'.$check;
						}
				}
			}

			//verificar boletin
			if($this->input->post('boletin')){
				$boletin=1;
			}else{
				$boletin=0;
			}
			
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'email' => $this->input->post('email'),
				'sexo' => $this->input->post('genero'),
				'area_id' => $this->input->post('area'),
				'description' => $this->input->post('descripcion'),
				'boletin' => $boletin
				//'roles' => $roles
			);

		   
			$res = $this->empleado_model->create($data);
				if ($res) {
					$data = "Registro Exitoso";
					
				}else{
					 $data = "Error al Registrado Empleado";
				}
			
		}
		return redirect()->to('Home');
		echo json_encode($data);

	}


}