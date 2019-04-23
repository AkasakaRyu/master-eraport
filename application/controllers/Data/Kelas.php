<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kelas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('Data/M_Kelas','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Kelas";
		$data["Breadcrumb"] = array("Dashboard","Kelas");
		$data["Nav"] = "Kelas";
		$data["Konten"] = "data/v_kelas";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $data->kelas_id;
			$row[] = $data->kelas_nama;
			$row[] = "<button type='button' id='edit' class='badge badge-success' data='".$data->kelas_id."'>Edit</button> | 
			<button type='button' id='hapus' class='badge badge-danger' data='".$data->kelas_id."'>Hapus</a>";
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function simpan() {
		$kelas_id = $this->input->post('kelas_id');
		if($kelas_id=="") {
			$data = array(
				'kelas_id' => $this->m->get_id(),
				'kelas_nama' => $this->input->post('kelas_nama')
			);
			$res = $this->m->simpan($data);
		} else {
			$data = array(
				'kelas_nama' => $this->input->post('kelas_nama')
			);
			$res = $this->m->edit($data);
		}
		echo json_encode($res);
	}

	public function get_data() {
		$res = $this->m->get_data();
		$data = array(
			'kelas_id' => $res->kelas_id,
			'kelas_nama' => $res->kelas_nama
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