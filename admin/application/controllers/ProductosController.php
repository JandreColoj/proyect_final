<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosController extends CI_Controller {
	
	public $response = array(
        'status' => 400,
        'message' => '',
        'data' => ''
    );
	
	public function index(){	

		if (!$this->session->userdata("login")) {
			redirect((base_url()."index.php/LoginController"));
		}

		$this->load->model('ProductosModel');
		$categorias =  json_decode($this->ProductosModel->getCategorias(), true); 

		$banners="";
		$datos = array(          
			'data' => $banners,
			'categorias' => $categorias,
			
		);
		
		$this->load->view('productos',$datos);
	}

	public function dataTable(){
		
		$requestData= $_REQUEST;
		
		$this->load->model('ProductosModel');
		$productos =  json_decode($this->ProductosModel->dataTable(false,$requestData), true); 
		$totalProductos =  json_decode($this->ProductosModel->dataTable(true,$requestData), true); 

        $data = array();
        
        foreach ($productos as  $value) {
			$aux=array(); 
			
			$estado =$value['estado'] == 1? "<div class=\" text-center\"  style='background:#43A047;  color:#fff; width:80px !important; border-radius: 0.3em; padding: 8px !important;'>Activo</div>" : "<div class=\"text-center\" style='background:#EF5350; color:#fff; width:80px !important; border-radius: 0.3em; padding: 8px !important;'>Inactivo</div>" ;
			
			$baja= '<button id="'.$value['id'].'" class="btn AB" style="background:#EF5350; data-toggle="tooltip" data-tipomod="baja" title="Baja de producto">
						<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
					</button>';
			$alta= '<button id="'.$value['id'].'" class="btn AB" style="background:#43A047;" data-toggle="tooltip" data-tipomod="alta" title="Alta de producto">
						<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
					</button>';
			$btnEdit= '<button id="'.$value['id'].'"  class="btn btn_editar" style="background:#FF7043;"  data-toggle="tooltip"  data-tipomod="editar" title="Editar producto">
						<i class="fa fa-edit" aria-hidden="true"></i>
					</button>';
			
			$btnAB= $value['estado'] == 1 ? $baja : $alta;
			$img = $value['img'] ==''? '' : "<img height='50px' src='".base_url().$value['img']."'>";


		
			$aux[] = $value["id"];
			$aux[] = $value["nombre"];
			$aux[] = $value["nombre_cat"];
			$aux[] = substr($value["descripcion"],0,50)."..";
			$aux[] = substr($value["produccion"],0,50)."..";
			//$aux[] = substr($value["inf_nutricional"],0,50)."..";
			$aux[] = "<center>". $estado ."</center>";
			$aux[] = "<center>".$btnAB.'&nbsp'.$btnEdit."</center>";
			$aux[] ="<center>". $img ."</center>";		
			
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

	public function guardar_producto(){
		$datos=$_POST;

		//NOTA: da permiso a la carpeta
		$imagen=$_FILES['img_banner']['name'];
        $carpeta_temp=$_FILES['img_banner']['tmp_name'];
        $tam_archivo=$_FILES['img_banner']['size'];

        if ($imagen && move_uploaded_file($carpeta_temp, "application/views/img/productos/".$imagen)) {
           // echo "application/views/img/banners/".$imagen;
            $archivo ="application/views/img/productos/".$imagen;

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

		$this->load->model('ProductosModel');
		$insert =  $this->ProductosModel->add_producto($datos,$imagen);
		
		$this->response['message'] = "Producto agregado con exito.";
        $this->response['status'] = 200;
        $this->response['data'] = $insert;
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

	public function editar_producto(){
		$datos=$_POST;
		$imagen=$_FILES['imagen_edit']['name'];
	
		$carpeta_temp=$_FILES['imagen_edit']['tmp_name'];
		$tam_archivo=$_FILES['imagen_edit']['size'];

		if ($tam_archivo>0) {		

			if ($imagen && move_uploaded_file($carpeta_temp, "application/views/img/productos/".$imagen)) {
			    // echo "application/views/img/banners/".$imagen;
				$archivo ="application/views/img/productos/".$imagen;

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

		$this->load->model('ProductosModel');
		$update =  $this->ProductosModel->edit_producto($datos,$imagen);

		if ($update==='no_cambios') {
			$this->response['message'] = "No hay cambios";
			$this->response['status'] = 200;
			$this->response['data'] = $update;
			echo json_encode($this->response);
			exit();
		}
		
		$this->response['message'] = "Se ha actualizado correctamente";
        $this->response['status'] = 200;
        $this->response['data'] = $update;
		echo json_encode($this->response);	

	}

	public function setAB(){
        $id     = isset($_POST['id'])? $_POST['id'] : false;
        $estado = $_POST['tipo'];
        
        if(!$id || ($id == false)){
            $this->response['message'] = 'No se puede identificar el producto.';
            echo json_encode($this->response);
            exit();
        }
		
		$this->load->model('ProductosModel');
		$AB =  $this->ProductosModel->setAB($id, $estado);

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

