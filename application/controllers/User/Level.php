<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Level extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('User/M_Level','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Level";
		$data["Breadcrumb"] = array("Dashboard","Users Settings","Level");
		$data["Nav"] = "Settings";
		$data["Konten"] = "user/v_level";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $data->level_id;
			$row[] = $data->level_nama;
			$row[] = "<button type='button' id='edit' class='badge badge-success' data='".$data->level_id."'>Edit</button> | 
			<button type='button' id='hapus' class='badge badge-danger' data='".$data->level_id."'>Hapus</a>";
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function simpan() {
		$level_id = $this->input->post('level_id');
		if($level_id=="") {
			$data = array(
				'level_id' => $this->m->get_id(),
				'level_nama' => $this->input->post('level_nama')
			);
			$res = $this->m->simpan($data);
		} else {
			$data = array(
				'level_nama' => $this->input->post('level_nama')
			);
			$res = $this->m->edit($data);
		}
		echo json_encode($res);
	}

	public function get_data() {
		$res = $this->m->get_data();
		$data = array(
			'level_id' => $res->level_id,
			'level_nama' => $res->level_nama
		);
		echo json_encode($data);
	}

	public function hapus() {
		$data = array(
			'deleted' => TRUE
		);
		return $this->m->hapus($data);
	}

	public function options() {
		$q = $this->input->get('q');
		$res = $this->m->options($q);
		echo json_encode($res);
	}
}