<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Officer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('User/M_Officer','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Officer";
		$data["Breadcrumb"] = array("Dashboard","Users Settings","Officer");
		$data["Nav"] = "Settings";
		$data["Konten"] = "user/v_officer";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $data->user_id;
			$row[] = $data->user_nama;
			$row[] = $data->level_nama;
			$row[] = "<button type='button' id='edit' class='badge badge-success' data='".$data->user_id."'>Edit</button>";
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function simpan() {
		$user_id = $this->input->post('user_id');
		if($user_id=="") {
			$data = array(
				'user_id' => $this->m->user_id(),
				'level_id' => $this->input->post('level_id'),
				'user_nama' => $this->input->post('user_nama'),
				'user_login' => $this->input->post('user_login'),
				'user_pass' => $this->m->hash_pwd($this->input->post('user_pass'))
			);
			$res = $this->m->simpan($data);
		} else {
			$data = array(
				'level_id' => $this->input->post('level_id'),
				'user_nama' => $this->input->post('user_nama'),
				'user_login' => $this->input->post('user_login'),
				'user_pass' => $this->m->hash_pwd($this->input->post('user_pass'))
			);
			$res = $this->m->edit($data);
		}
		echo json_encode($res);
	}

	public function get_data() {
		$res = $this->m->get_data();
		$data = array(
			'user_id' => $res->user_id,
			'level_id' => $res->level_id,
			'user_nama' => $res->user_nama,
			'user_login' => $res->user_login,
			'user_pass' => $res->user_pass
		);
		echo json_encode($data);
	}

	public function options() {
		$res = $this->m->get_list_data();
		echo json_encode($res);
	}

}