<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannersController extends CI_Controller {
	
	public $response = array(
        'status' => 400,
        'message' => '',
        'data' => ''
    );
	
	public function index(){	
		if (!$this->session->userdata("login")) {
			redirect((base_url()."index.php/LoginController"));
		}
		

  	   $banners=$this->reloadTable();

		$datos = array(          
            'data' => $banners,
		);
		
		$this->load->view('banners',$datos);
	}

	public function reloadTable(){
		$banners=$this->getBanners();
		$table="";
		$i=1;

		foreach ($banners as $value) {
	    $table.="<tr>
					<th scope='row'>". $i++."</th>
					<td>".  $value[1]. "</td>
					<td>".  $value[2]. "</td>  
					<td>".  $value[3]. "</td>   
					<td>".  $value[4]. "</td>                                      
					<td>".  $value[6]. "</td>
					<td>".  $value[7]. "</td>
					<td>".  $value[5]. "</td>
				</tr>";
		}

		$reload = isset($_POST['reload']) ? $_POST['reload'] : false;
		
		if ($reload==='si') {
			echo $table;
		}else{
			return $table;
		}
	}

	public function getBanners(){
		$this->load->model('bannersModel');	
		
		$banners =  json_decode($this->bannersModel->get_banners(), true); 

		foreach ($banners as $value) {
			$estado =$value['estado'] == 1? "<div class=\" text-center\"  style='background:#43A047;  color:#fff; width:80px !important; border-radius: 0.3em; padding: 8px !important;'>Activo</div>" : "<div class=\"text-center\" style='background:#EF5350; color:#fff; width:80px !important; border-radius: 0.3em; padding: 8px !important;'>Inactivo</div>" ;

            $baja= '<button id="'.$value['id'].'" class="btn AB" style="background:#EF5350;" data-toggle="tooltip" data-tipomod="baja" title="Dar de baja el Banner">
						<i class="fas fa-arrow-circle-down"></i>
                    </button>';
            $alta= '<button id="'.$value['id'].'" class="btn AB" style="background:#43A047;" data-toggle="tooltip" data-tipomod="alta" title="Dar de alta el Banner">
                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                    </button>';
            $btnEdit= '<button id="'.$value['id'].'"  class="btn btn_editar" style="background:#FF7043;"  data-toggle="tooltip"  data-tipomod="editar" title="Editar Banner">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </button>';

            $btnAB= $value['estado'] == 1 ? $baja : $alta;
            $img = $value['img'] ==''? '' : "<img height='30px' src='".base_url().$value['img']."'>";

                        
            $results[] = array(
                $value['id'],
				$value['titulo'],
				$value['descripcion'],
				$value['descripcion2'],
				$value['href'],
				$img,
				$estado,   
				"<center>".$btnAB.'&nbsp'.$btnEdit."</center>" 
            );
		}

		return $results;
	}

	public function guardar_banner(){
		$datos=$_POST;
		//NOTA: da permiso a la carpeta
		$imagen=$_FILES['img_banner']['name'];
        $carpeta_temp=$_FILES['img_banner']['tmp_name'];
        $tam_archivo=$_FILES['img_banner']['size'];

        if ($imagen && move_uploaded_file($carpeta_temp, "application/views/img/banners/".$imagen)) {
           // echo "application/views/img/banners/".$imagen;
            $archivo ="application/views/img/banners/".$imagen;

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

		$this->load->model('bannersModel');
		$insert =  $this->bannersModel->add_banners($datos,$imagen);
		
		$this->response['message'] = "Banner guardado con exito";
        $this->response['status'] = 200;
        $this->response['data'] = $insert;
		echo json_encode($this->response);	

	}

	function info_banner(){
		$id  = isset($_POST['id'])? $_POST['id'] : false;

		if ($id==false) {
			$this->response['message'] = "No se encontro informacion del banner";
			echo json_encode($this->response);
			exit();
		}

		$this->load->model('bannersModel');
		$info =  json_decode($this->bannersModel->info_banners($id), true); 
		$this->response['message'] = "Informacion de banner";
        $this->response['status'] = 200;
        $this->response['data'] = $info;
		echo json_encode($this->response);	

	}

	public function editar_banner(){
		$datos=$_POST;
		$imagen=$_FILES['img_banner']['name'];
		$carpeta_temp=$_FILES['img_banner']['tmp_name'];
		$tam_archivo=$_FILES['img_banner']['size'];

		if ($tam_archivo>0) {		

			if ($imagen && move_uploaded_file($carpeta_temp, "application/views/img/banners/".$imagen)) {
			// echo "application/views/img/banners/".$imagen;
				$archivo ="application/views/img/banners/".$imagen;

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

		$this->load->model('bannersModel');
		$update =  $this->bannersModel->edit_banners($datos,$imagen);

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
            $this->response['message'] = 'No se puede identificar el banner.';
            echo json_encode($this->response);
            exit();
        }
		
		$this->load->model('bannersModel');
		$AB =  $this->bannersModel->setAB($id, $estado);

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

