<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioController extends CI_Controller {

	public function index(){

		if (!$this->session->userdata("login")) {
			redirect((base_url()."index.php/LoginController"));
		}else{

			$this->load->model('InicioModel');
			$banners=$this->InicioModel->getBanners();
			$productos=$this->InicioModel->getProductos();
			$recetas=$this->InicioModel->getRecetas();
			$new_recetas =  json_decode($this->InicioModel->newRecetas(), true); 
		
			$datos = array(          
				'banners'    => $banners,
				'productos'  => $productos,
				'recetas'    => $recetas,
				'new_recetas'=> $new_recetas				
			);

			//var_dump($datos); die;
			$this->load->view('dashboard',$datos);			
		}

		
	}
}

