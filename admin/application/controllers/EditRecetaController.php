<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditRecetaController extends CI_Controller {
	
	public $response = array(
        'status' => 400,
        'message' => '',
        'data' => ''
    );
	
	public function index(){	

		$id  = isset($_GET['id'])? $_GET['id'] : false;

		if (!$id) {
			$this->load->view('recetas',$datos);
		}

		$this->load->model('EditRecetaModel');
		$categorias  =  json_decode($this->EditRecetaModel->getCategorias(), true); 
		$info        =  json_decode($this->EditRecetaModel->getInfoReceta($id), true); 
		$receta_prod =  json_encode($this->EditRecetaModel->getRecetaProd($id)); 

		$datos = array(          
			'data' => $info,
			'categorias' => $categorias,
			'receta_prod' => $receta_prod,
			
		);
		
		$this->load->view('editReceta',$datos);
	}


	public function editar_receta(){
		$datos=$_POST;
		//NOTA: da permiso a la carpeta
		$imagen=$_FILES['img_receta']['name'];
        $carpeta_temp=$_FILES['img_receta']['tmp_name'];
		$tam_archivo=$_FILES['img_receta']['size'];
		
		if ($tam_archivo>0) {

			if ($imagen && move_uploaded_file($carpeta_temp, "application/views/img/recetas/".$imagen)) {
	
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

		}

		$this->load->model('EditRecetaModel');
		$edit =  $this->EditRecetaModel->edit_receta($datos,$imagen);

		if (!$edit) {
			$this->response['message'] = "No se logro realizar los cambios.";
			$this->response['status'] = 400;
			echo json_encode($this->response);
			exit();
		}
		
		$this->response['message'] = "Receta editada con exito.";
        $this->response['status'] = 200;
        $this->response['data'] = $edit;
		echo json_encode($this->response);	

	}

	public function info_producto(){
		$id  = isset($_POST['id'])? $_POST['id'] : false;

		if ($id==false) {
			$this->response['message'] = "No se encontro informacion del producto";
			echo json_encode($this->response);
			exit();
		}

		$this->load->model('ProductosModel');
		$info =  json_decode($this->ProductosModel->info_producto($id), true); 
		$this->response['message'] = "Informacion del producto";
        $this->response['status'] = 200;
        $this->response['data'] = $info;
		echo json_encode($this->response);	

	}

	public function search_product(){		
		$frase  =  $_POST['phrase'];

		$this->load->model('AddRecetaModel');
		$info =  json_decode($this->AddRecetaModel->search_product($frase), true); 
		
		echo json_encode($info);	//die;

	}

	
}

