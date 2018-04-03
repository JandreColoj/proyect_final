<?php
class InicioModel extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function getBanners(){
        $this->db->where("estado",1);
        $query = $this->db->get("banner");

        return $query->num_rows();
    }

    function getProductos(){
        $this->db->where("estado",1);
        $query = $this->db->get("productos");
        
        return $query->num_rows();
    }

    function getRecetas(){
        $this->db->where("estado",1);
        $query = $this->db->get("recetas");
        
        return $query->num_rows();
    }

    function newRecetas(){
        $fecha_actual=date('Y-m-d');
        $fecha= date('Y-m-d', strtotime('-30 day'));
   

        $sql="SELECT r.recetas_id as id, r.titulo, r.ingredientes, r.preparacion, r.estado, r.fecha_ingreso, r.tiempo_preparacion, i.path as img, c.nombre as categoria, u.nombre as usuario, u.apellido";
        $sql.=" FROM recetas r";
        $sql.=" INNER JOIN imagen i ON(r.imagen_id = i.imagen_id)";
        $sql.=" INNER JOIN usuarios u ON(r.usuarios_Id= u.usuario_Id)";
        $sql.=" INNER JOIN categoria_receta c ON(r.categoria_receta_id= c.categoria_receta_id)";
        $sql.=" Where (fecha_ingreso BETWEEN '".$fecha."' AND '".$fecha_actual."') ";
        
        //$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
        //var_dump($sql);die;
        $query = $this->db->query($sql);
        
        return json_encode($query->result());

    }




   
}
?>