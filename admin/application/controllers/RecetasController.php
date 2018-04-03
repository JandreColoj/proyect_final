<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecetasController extends CI_Controller {
	
	public $response = array(
        'status' => 400,
        'message' => '',
        'data' => ''
    );
	
	public function index(){	

		if (!$this->session->userdata("login")) {
			redirect((base_url()."index.php/LoginController"));
		}
		
		$this->load->model('RecetasModel');
		$categorias =  json_decode($this->RecetasModel->getCategorias(), true); 

		$banners="";
		$datos = array(          
			'data' => $banners,
			'categorias' => $categorias,
			
		);
		
		$this->load->view('recetas',$datos);
	}

	public function dataTable(){
		
		$requestData= $_REQUEST;
		
		$this->load->model('RecetasModel');
		$recetas =  json_decode($this->RecetasModel->dataTable(false,$requestData), true); 
		$totalProductos =  json_decode($this->RecetasModel->dataTable(true,$requestData), true); 

        $data = array();
	
        foreach ($recetas as  $value) {
			$aux=array(); 
			
			$estado =$value['estado'] == 1? "<div class=\" text-center\"  style='background:#43A047;  color:#fff; width:80px !important; border-radius: 0.3em; padding: 8px !important;'>Aprovado</div>" : "<div class=\"text-center\" style='background:#EF5350; color:#fff; width:80px !important; border-radius: 0.3em; padding: 8px !important;'>Rechazado</div>" ;
			
			$baja= '<button id="'.$value['id'].'" class="btn AB" style="background:#EF5350; data-toggle="tooltip" data-tipomod="baja" title="Baja de producto">
						<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
					</button>';
			$alta= '<button id="'.$value['id'].'" class="btn AB" style="background:#43A047;" data-toggle="tooltip" data-tipomod="alta" title="Alta de producto">
						<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
					</button>';
			$btnEdit= '<a href="'.site_url("EditRecetaController?id=".$value['id']."").'">
						<button id="'.$value['id'].'"  class="btn btn_editar" style="background:#FF7043;"  data-toggle="tooltip"  data-tipomod="editar" title="Editar producto">
							<i class="fa fa-edit" aria-hidden="true"></i>
						</button>
					  <a>';
			
			$btnAB= $value['estado'] == 1 ? $baja : $alta;
			$img = $value['img'] ==''? '' : "<img height='50px' src='".base_url().$value['img']."'>";


		
			$aux[] = $value["id"];
			$aux[] = $value["titulo"];
			$aux[] = $value["categoria"];
			$aux[] = $value["usuario"]." ".$value["apellido"];
			$aux[] = "<center>".$value["fecha_ingreso"]."<center>";
			//$aux[] = substr($value["inf_nutricional"],0,50)."..";
			$aux[] = "<center>". $estado ."</center>";
			$aux[] = "<center>".$btnAB.'&nbsp'.$btnEdit."</center>";
			$aux[] = "<center>". $img ."</center>";		
			
			$data[] = $aux;
        }

		
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => $totalProductos,  // total number of records
					"recordsFiltered" => $totalProductos, // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);
		
		echo json_encode($json_data);  // send data as json format

	}


	public function setAB(){
        $id     = isset($_POST['id'])? $_POST['id'] : false;
        $estado = $_POST['tipo'];
        
        if(!$id || ($id == false)){
            $this->response['message'] = 'No se puede identificar la receta.';
            echo json_encode($this->response);
            exit();
        }
		
		$this->load->model('RecetasModel');
		$AB =  $this->RecetasModel->setAB($id, $estado);

        if(!$AB || ($AB == false)){
            $this->response['message'] = "Ocurrio un error al realizar el cambio.";
			echo json_encode($this->response);
            exit();
        }

        $this->response['message'] = "Se realizo el cambio correctamente.";
        $this->response['status'] = 200;
        $this->response['data'] = $AB;
        
        echo json_encode($this->response);
        exit();
    }


	
}

