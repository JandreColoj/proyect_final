<?php
class ProductosModel extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function dataTable($total,$requestData){   	
        
        $columns = array( 
        // indice de la columna en datatable  => nombre de la columna en base de datos
            0 => 'p.productos_id',
            1 => 'p.nombre', 
            2 => 'c.nombre',
            3 => 'p.descripcion',
            4 => 'p.produccion',
            5 => 'p.productos_id',
            6 => 'p.productos_id',
            7 => 'p.productos_id'

        );

        if($total){
            $this->db->select('p.productos_id as id,p.nombre,p.descripcion,p.produccion,p.inf_nutricional, p.categoria_categoria_id as categoria_id, p.estado, i.path as img, i.imagen_id, c.nombre as nombre_cat');
            $this->db->from('productos p');
            $this->db->join('imagen i', 'p.imagen_id = i.imagen_id');
            $this->db->join('categoria c', 'p.categoria_categoria_id = c.categoria_id');
            //$this->db->where('b.banner_id',$id);
            $query = $this->db->get();
        return  $totalFiltered=$query->num_rows();
        } 
            

        if( !empty($requestData['search']['value']) ) {
            // if there is a search parameter
            $sql="SELECT p.productos_id as id,p.nombre,p.descripcion,p.produccion,p.inf_nutricional, p.categoria_categoria_id as categoria_id, p.estado, i.path as img, i.imagen_id, c.nombre as nombre_cat";
            $sql.=" FROM productos p";
            $sql.=" INNER JOIN imagen i ON (p.imagen_id = i.imagen_id)";
            $sql.=" INNER JOIN categoria c ON (p.categoria_categoria_id = c.categoria_id)";
            $sql.=" WHERE p.nombre LIKE'".$requestData['search']['value']."%'";
            $sql.=" OR c.nombre LIKE'".$requestData['search']['value']."%'";
            
            $query = $this->db->query($sql); 
            $totalFiltered=$query->num_rows(); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

            $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
            $query = $this->db->query($sql); 
            
        } else {	    

            $sql="SELECT p.productos_id as id,p.nombre,p.descripcion,p.produccion,p.inf_nutricional, p.categoria_categoria_id as categoria_id, p.estado, i.path as img, i.imagen_id, c.nombre as nombre_cat";
            $sql.=" FROM productos p ";
            $sql.="INNER JOIN imagen i ON (p.imagen_id = i.imagen_id)";
            $sql.="INNER JOIN categoria c ON (p.categoria_categoria_id = c.categoria_id)";
            $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
            // var_dump($sql);die;
            $query = $this->db->query($sql); 			
        }  

        return json_encode($query->result());

    }


    function getCategorias(){
        $this->db->select('categoria_id as id,nombre,imagen_id');
        $this->db->from('categoria');
            $this->db->where('estado',1);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return json_encode($query->result());
        }   
        
        return false;
    }

    function add_producto($datos,$imagen){

        $data = array(
            'nombre'         =>   'Imagen de producto',
            'path'           =>   'application/views/img/productos/'.$imagen,
            'tipo_imagen_id' =>   3
            );
            
            if($this->db->insert('imagen',$data)){
                $query=$this->db->query('SELECT MAX(imagen_id) as id FROM imagen');
                $id_img=$query->result();

                $data = array(
                'categoria_categoria_id' =>   $datos['categoria'],
                'nombre'                 =>   'Nombre del banner',
                'imagen_id'              =>   $id_img[0]->id,
                'nombre'                 =>   $datos['nombre'],
                'descripcion'            =>   $datos['descripcion'],
                'produccion'             =>   $datos['produccion'],
                'inf_nutricional'        =>   $datos['nutricional'],
                'estado'                 =>   1 
            );
                
                return $this->db->insert('productos',$data);
            }

            return false;        
    }

    function info_producto($id){

        $this->db->select('p.productos_id as id,p.nombre,p.descripcion,p.produccion,p.inf_nutricional, p.categoria_categoria_id as categoria_id, p.estado, i.path as img, i.imagen_id, c.nombre as nombre_cat, c.categoria_id');
        $this->db->from('productos p');
        $this->db->join('imagen i', 'p.imagen_id = i.imagen_id');
        $this->db->join('categoria c', 'p.categoria_categoria_id = c.categoria_id');
        $this->db->where('p.productos_id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return json_encode($query->result());
        }   
        
        return false;

    }

    function edit_producto($datos,$imagen){   
        
        /* datos actuales del banner */
        $info=json_decode($this->info_producto($datos['producto_id']),true);
        $actualizar = array();

        if($info[0]['nombre'] != $datos['nombre_edit']){
            $actualizar['nombre'] = $datos['nombre_edit'];
        }
        if($info[0]['descripcion'] != $datos['descripcion_edit']){
            $actualizar['descripcion'] = $datos['descripcion_edit'];
        }
        if($info[0]['produccion'] != $datos['produccion_edit']){
            $actualizar['descripcion'] = $datos['produccion_edit'];
        }
        if($info[0]['inf_nutricional'] != $datos['nutricional_edit']){
            $actualizar['inf_nutricional'] = $datos['nutricional_edit'];
        }
        if($info[0]['categoria_id'] != $datos['categoria_edit'] && $datos['categoria_edit'] !="0"){
            $actualizar['categoria_categoria_id'] = $datos['categoria_edit'];
        }

        if (count($actualizar)==0 && $imagen=="") {
        return "no_cambios";
        }

        if($imagen!=""){
            $data = array(
                'path' => 'application/views/img/productos/'.$imagen
            );
                        $this->db->where('imagen_id',$info[0]['imagen_id']);
            $update_img=$this->db->update('imagen', $data);       
        }

        if (count($actualizar)!=0) {
            $this->db->where('productos_id', $datos['producto_id']);
            return $this->db->update('productos', $actualizar);
        }
        
        return $update_img;  
    }

    function setAB($id, $estado){
        $data = array(
            'estado' => $estado
        );
        $this->db->where('productos_id',$id);
        return $this->db->update('productos', $data);  
    }

   
}
?>