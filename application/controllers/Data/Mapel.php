<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mapel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('Data/M_Mapel','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Mapel";
		$data["Breadcrumb"] = array("Dashboard","Mapel");
		$data["Nav"] = "Mapel";
		$data["Konten"] = "data/v_mapel";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $data->mapel_id;
			$row[] = $data->mapel_nama;
			$row[] = "<button type='button' id='edit' class='badge badge-success' data='".$data->mapel_id."'>Edit</button> | 
			<button type='button' id='hapus' class='badge badge-danger' data='".$data->mapel_id."'>Hapus</a>";
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function simpan() {
		$mapel_id = $this->input->post('mapel_id');
		if($mapel_id=="") {
			$data = array(
				'mapel_id' => $this->m->get_id(),
				'mapel_nama' => $this->input->post('mapel_nama')
			);
			$res = $this->m->simpan($data);
		} else {
			$data = array(
				'mapel_nama' => $this->input->post('mapel_nama')
			);
			$res = $this->m->edit($data);
		}
		echo json_encode($res);
	}

	public function get_data() {
		$res = $this->m->get_data();
		$data = array(
			'mapel_id' => $res->mapel_id,
			'mapel_nama' => $res->mapel_nama
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