<?php
class EditRecetaModel extends CI_Model {

    function __construct(){
        parent::__construct();
    }


    function getCategorias(){
        $this->db->select('categoria_receta_id as id,nombre');
        $this->db->from('categoria_receta');
        $this->db->where('estado',1);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return json_encode($query->result());
        }   
        
        return false;
    }

    function getInfoReceta($id){

        $sql="SELECT r.recetas_id as id, r.titulo, r.ingredientes, r.preparacion, r.estado, r.fecha_ingreso, r.tiempo_preparacion, i.path as img, c.nombre as categoria, i.imagen_id, u.nombre as usuario, u.apellido";
        $sql.=" FROM recetas r";
        $sql.=" INNER JOIN imagen i ON(r.imagen_id = i.imagen_id)";
        $sql.=" INNER JOIN usuarios u ON(r.usuarios_Id= u.usuario_Id)";
        $sql.=" INNER JOIN categoria_receta c ON(r.categoria_receta_id= c.categoria_receta_id)";
        $sql.=" WHERE r.recetas_id=".$id;

        $query = $this->db->query($sql); 	
    
        return json_encode($query->result());
    }

    function getRecetaProd($id){

       $sql="SELECT r.productos_productos_id as id, p.nombre
             FROM receta_productos r
             INNER JOIN productos p ON(r.productos_productos_id=p.productos_id)
             where r.estado=1 AND r.recetas_id=".$id;

        $query = $this->db->query($sql); 	
    
        return json_encode($query->result());
    }

    function search_product($frase){
        $this->db->select('productos_id as id,nombre');
        $this->db->from('productos');
        $this->db->where('estado',1);
        $this->db->like('nombre', $frase);
        $query = $this->db->get();

        return json_encode($query->result());
  
    }

    function edit_receta($datos,$imagen){
       
        /* datos actuales de la receta */
        $info=json_decode($this->getInfoReceta($datos['receta_id']),true);
        $actualizar = array();

        if($info[0]['titulo'] != $datos['titulo']){
            $actualizar['titulo'] = $datos['titulo'];
        }
        if($info[0]['ingredientes'] != $datos['txt_ingrediente']){
            $actualizar['ingredientes'] = $datos['txt_ingrediente'];
        }
        if($info[0]['preparacion'] != $datos['txt_preparacion']){
            $actualizar['preparacion'] = $datos['txt_preparacion'];
        }
        if($info[0]['tiempo_preparacion'] != $datos['t_preparacion']){
            $actualizar['tiempo_preparacion'] = $datos['t_preparacion'];
        }
        if($info[0]['id'] != $datos['categoria'] && $datos['categoria'] !="0"){
            $actualizar['categoria_receta_id'] = $datos['categoria'];
        }

        if($datos['prod_relacionados']!=""){
   
            $myString = trim($datos['prod_relacionados'], ',');
            $prod_relacionados = explode(",", $myString);

            //DA DE BAJA PROD. RELACIONADOS
            $update['estado'] = 0;
            $this->db->where('recetas_id', $datos['receta_id']);
            $this->db->update('receta_productos', $update);

            //INSERTA PRODUCTOS RELACIONADOS
            foreach ($prod_relacionados as  $value) {
                
                $data=array(
                    'recetas_id'  => $datos['receta_id'],
                    'productos_productos_id'  => $value,
                    'estado'      => 1
                );
                $this->db->insert('receta_productos',$data);
            }   
        }

        if (count($actualizar)==0 && $imagen=="") {
            return "no_cambios";
        }

        if($imagen!=""){

            $data = array(
                'path' => 'application/views/img/recetas/'.$imagen
            );
                        $this->db->where('imagen_id',$info[0]['imagen_id']);
            $update_img=$this->db->update('imagen', $data);       
        }
            
        if (count($actualizar)>0) {
            $this->db->where('recetas_id', $datos['receta_id']);
            return $this->db->update('recetas',$actualizar);  
        }

    return $update_img;
      
    }

   
}
?>