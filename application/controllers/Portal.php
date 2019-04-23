<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			redirect('user/dashboard');
		} else {
			$this->load->model('Sistem/M_App_Info','a');
			$this->load->model('User/M_Login','b');
		}
	}

	public function index() {
		$data["Title"] = "Login";
		$data["AppName"] = $this->a->get_app_name();
		$data["Instansi"] = $this->a->get_instansi();
		$this->load->view('user/v_login',$data);
	}

	public function login() {
		$cek_login = $this->b->cek_login();
		if($cek_login) {
			$data = $this->b->get_user_data();
			$session = array(
				'id' => $data->user_id,
				'nama' => $data->user_nama,
				'level' => $data->level_nama,
				'created' => $data->created_date,
				'appname' => $this->a->get_app_name()->app_info_name,
				'LoggedIn' => TRUE
			);
			$this->session->set_userdata($session);
			$response = "Username dan Password Cocok!";
		} else {
			$response = "Username dan Password Tidak Cocok!";
		}
		echo json_encode($response);
	}

}
