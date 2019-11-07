<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
	{
		parent:: __construct();
	
		$this->load->model('Productos_model');
		$this->load->helper('url');

		
	}
	

	

	public function index()
	{
		
		
		$this->load->view('index');	
		
	}

}