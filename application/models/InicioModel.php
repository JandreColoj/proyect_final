<?php
class InicioModel extends CI_Model {

   function __construct(){
       parent::__construct();
   }
   
   function get_banners(){

    $this->db->select('b.banner_id as id, b.nombre,b.titulo, b.descripcion, b.descripcion2, b.href, b.estado, i.path as img');
    $this->db->from('banner b');
    $this->db->join('imagen i', 'b.imagen_id = i.imagen_id');
    $this->db->where('b.estado',1);
    $query = $this->db->get();

    if($query->num_rows() > 0 ){
        return json_encode($query->result());
    }   

   }

}
?>