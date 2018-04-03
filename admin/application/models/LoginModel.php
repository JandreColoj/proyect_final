<?php
class LoginModel extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function login($usuario,$password){
        $this->db->where("usuario",$usuario);
        $this->db->where("password",$password);

        $result=$this->db->get("usuarios");

            if ($result->num_rows()>0) {
                
                return $result->row();
            }else{
                return false;
            }


    }
   
}
?>