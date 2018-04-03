<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("LoginModel");

	}

	public function index(){

		if ($this->session->userdata("login")) {
			redirect((base_url()."index.php/InicioController"));
		}
		$this->load->view('login');
	}

	public function login(){
		$usuario=$this->input->post("usuario");
		$password=$this->input->post("password");
		$password= base64_encode($password);
		$res=$this->LoginModel->login($usuario,$password);

		if (!$res) {
			$data = array(
				'error'  => "El usuario y/o contraseña son incorrectos"
			);
			
			$this->session->set_flashdata($data);
			redirect(base_url());
		}else{
		    $data = array(
				'id'     => $res->usuario_Id,
				'nombre' => $res->nombre,
				'login'  => TRUE
			);
			
			$this->session->set_userdata($data);
			redirect(base_url()."index.php/InicioController");
		}

	}

	public function salir(){
		$this->session->sess_destroy();
		redirect(base_url()."index.php/LoginController");
	}
}

