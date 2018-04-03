<?php
class BannersModel extends CI_Model {

   function __construct(){
       parent::__construct();
   }
   
   function get_banners(){

    $this->db->select('b.banner_id as id,b.nombre,b.titulo,b.descripcion,b.descripcion2, b.href, b.estado, i.path as img');
    $this->db->from('banner b');
    $this->db->join('imagen i', 'b.imagen_id = i.imagen_id');
    //$this->db->where('b.estado',1);
    $query = $this->db->get();

    if($query->num_rows() > 0 ){
        return json_encode($query->result());
    }   

    return false;
   }

   function add_banners($datos,$imagen){

       $data = array(
        'nombre'         =>   'Imagen de banner',
        'path'           =>   'application/views/img/banners/'.$imagen,
        'tipo_imagen_id' =>   1
        );
        
        if($this->db->insert('imagen',$data)){
            $query=$this->db->query('SELECT MAX(imagen_id) as id FROM imagen');
            $id_img=$query->result();

            $data = array(
                'nombre'       =>   'Nombre del banner',
                'imagen_id'    =>   $id_img[0]->id,
                'titulo'       =>   $datos['titulo'],
                'descripcion'  =>   $datos['descripcion'],
                'descripcion2' =>   $datos['descripcion2'],
                'href'         =>   $datos['url'],
                'estado'       =>   1
                );
            
            return $this->db->insert('banner',$data);
        }

        return false;        
   }

   function info_banners($id){

        $this->db->select('b.banner_id as id,b.nombre,b.titulo,b.descripcion,b.descripcion2, b.href, b.estado, i.path as img, i.imagen_id');
        $this->db->from('banner b');
        $this->db->join('imagen i', 'b.imagen_id = i.imagen_id');
        $this->db->where('b.banner_id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return json_encode($query->result());
        }   
        
        return false;

   }

    function edit_banners($datos,$imagen){
    
        /* datos actuales del banner */
        $info=json_decode($this->info_banners($datos['banner_id']),true);
        $actualizar = array();

        if($info[0]['titulo'] != $datos['titulo_edit']){
            $actualizar['titulo'] = $datos['titulo_edit'];
        }
        if($info[0]['descripcion'] != $datos['descripcion_edit']){
            $actualizar['descripcion'] = $datos['descripcion_edit'];
        }
        if($info[0]['descripcion2'] != $datos['descripcion2_edit']){
            $actualizar['descripcion2'] = $datos['descripcion2_edit'];
        }
        if($info[0]['href'] != $datos['url']){
            $actualizar['href'] = $datos['url'];
        }

        if (count($actualizar)==0 && $imagen=="") {
        return "no_cambios";
        }

        if($imagen!=""){
            $data = array(
                'path' => 'application/views/img/banners/'.$imagen
            );
                        $this->db->where('imagen_id',$info[0]['imagen_id']);
            $update_img=$this->db->update('imagen', $data);       
        }

        if (count($actualizar)!=0) {
            $this->db->where('banner_id', $datos['banner_id']);
            return $this->db->update('banner', $actualizar);
        }
        
        return $update_img;  
    }

    function setAB($id, $estado){
        $data = array(
            'estado' => $estado
        );
        $this->db->where('banner_id',$id);
        return $this->db->update('banner', $data);  
    }

}
?>