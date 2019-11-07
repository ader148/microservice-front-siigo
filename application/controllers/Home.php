<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Empleado_model');
	}

	public function index()
	{
		//var_dump($data["data"] = $this->Empleado_model->show());

		$data["data"] = $this->Empleado_model->show();

		//echo json_encode($data);	
		$this->load->view('index', $data);	
		
	}


	public function create(){

		if($this->input->is_ajax_request()){
			
			$data = array(
				'item_name' => $this->input->post('item'),
				'item_stock' => $this->input->post('mount'),
				'item_state' => $this->input->post('state'),
				'item_locate' => $this->input->post('locate'),
				'item_info' => $this->input->post('info'),
			);

			$res = $this->Item_model->create($data);
				if ($res) {
					$data = "Registro Exitoso";
				}else{
					 $data = "Error al Registrado Articulo";
				}
		}
		echo json_encode($data);
	}

	public function show(){
		
		$data["data"] = json_encode($this->Empleado_model->show());
		//echo json_encode($data);	
		$this->load->view('index', $data);	
	}



	public function edit(){
		if($this->input->is_ajax_request()){
			
			$id = $this->input->post("id");
		
			$res = $this->Item_model->edit($id);

		}
		echo json_encode ($res);	
	}

}
