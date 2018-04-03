<?php
class AddRecetaModel extends CI_Model {

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

    function search_product($frase){
        $this->db->select('productos_id as id,nombre');
        $this->db->from('productos');
        $this->db->where('estado',1);
        $this->db->like('nombre', $frase);
        $query = $this->db->get();

        return json_encode($query->result());
  
    }

    function add_receta($datos,$imagen){
        $date = Date('Y-m-d');
        $data = array(
            'nombre'         =>   'Imagen de la receta',
            'path'           =>   'application/views/img/recetas/'.$imagen,
            'tipo_imagen_id' =>   1
            );
            
            if($this->db->insert('imagen',$data)){

                $query=$this->db->query('SELECT MAX(imagen_id) as id FROM imagen');
                $id_img=$query->result();

                $data = array(
                'titulo'             =>   $datos['titulo'],
                'ingredientes'       =>   $datos['txt_ingrediente'],
                'preparacion'        =>   $datos['txt_preparacion'],
                'usuarios_Id'        =>   2,
                'fecha_ingreso'      =>   $date,
                'imagen_id'          =>   $id_img[0]->id,
                'tiempo_preparacion' =>   $datos['t_preparacion'],
                'categoria_receta_id'=>   $datos['categoria'],
                'estado'             =>   1 
                 );
           
                $result=$this->db->insert('recetas',$data);

                if ($datos['prod_relacionados']!="" && $result) {
                    $myString = trim($datos['prod_relacionados'], ',');
                    $prod_relacionados = explode(",", $myString);

                    $query=$this->db->query('SELECT MAX(recetas_id) as id FROM recetas');
                    $id_receta=$query->result();

                    foreach ($prod_relacionados as  $value) {
                        
                        $data=array(
                            'recetas_id'  => $id_receta[0]->id,
                            'productos_productos_id'  => $value,
                            'estado'      => 1
                        );

                        $this->db->insert('receta_productos',$data);
                    }
                }
                
             return $result;
            }

        return false;        
    }

   
}
?>