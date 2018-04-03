<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddRecetaController extends CI_Controller {
	
	public $response = array(
        'status' => 400,
        'message' => '',
        'data' => ''
    );
	
	public function index(){	

		if (!$this->session->userdata("login")) {
			redirect((base_url()."index.php/LoginController"));
		}
		
		$this->load->model('AddRecetaModel');
		$categorias =  json_decode($this->AddRecetaModel->getCategorias(), true); 

		$banners="";
		$datos = array(          
			'data' => $banners,
			'categorias' => $categorias			
		);
		
		$this->load->view('addReceta',$datos);
	}


	public function guardar_receta(){
		$datos=$_POST;

		//NOTA: da permiso a la carpeta
		$imagen=$_FILES['img_receta']['name'];
        $carpeta_temp=$_FILES['img_receta']['tmp_name'];
        $tam_archivo=$_FILES['img_receta']['size'];

        if ($imagen && move_uploaded_file($carpeta_temp, "application/views/img/recetas/".$imagen)) {
           // echo "application/views/img/banners/".$imagen;
            $archivo ="application/views/img/recetas/".$imagen;

            $tamano    = filesize($archivo);
            $archivo   = fopen($archivo, "r");
            $contenido_bytes = fread($archivo, $tamano);
            $contenido = addslashes($contenido_bytes);
            fclose($archivo);

        }else{
			$this->response['message'] = "Ocurrio un problema al cargar la imagen";
			echo json_encode($this->response);
			exit();
		}

		$this->load->model('AddRecetaModel');
		$insert =  $this->AddRecetaModel->add_receta($datos,$imagen);

		if (!$insert) {
			$this->response['message'] = "No se logro agregar la receta.";
			echo json_encode($this->response);
			exit();
		}		
		
		$this->response['message'] = "Receta agregada con exito.";
        $this->response['status'] = 200;
        $this->response['data'] = $insert;
		echo json_encode($this->response);	

	}

	public function search_product(){		
		$frase  =  $_POST['phrase'];

		$this->load->model('AddRecetaModel');
		$info =  json_decode($this->AddRecetaModel->search_product($frase), true); 
		
		echo json_encode($info);	//die;

	}

	
}

