<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kehadiran extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('Raport/M_Kehadiran','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Kehadiran";
		$data["Breadcrumb"] = array("Dashboard","Kehadiran");
		$data["Nav"] = "Kehadiran";
		$data["Konten"] = "raport/v_kehadiran";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $data->kehadiran_id;
			$row[] = $data->siswa_nama;
			$row[] = $data->tanggal_masuk;
			$row[] = $data->jam_masuk;
			$row[] = "<button type='button' id='edit' class='badge badge-success' data='".$data->kehadiran_id."'>Edit</button> | 
			<button type='button' id='hapus' class='badge badge-danger' data='".$data->kehadiran_id."'>Hapus</a>";
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function simpan() {
		$kehadiran_id = $this->input->post('kehadiran_id');
		if($kehadiran_id=="") {
			$data = array(
				'kehadiran_id' => $this->m->get_id(),
				'siswa_id' => $this->input->post('siswa_id'),
				'tanggal_masuk' => $this->input->post('tanggal_masuk'),
				'jam_masuk' => $this->input->post('jam_masuk')
			);
			$res = $this->m->simpan($data);
		} else {
			$data = array(
				'siswa_id' => $this->input->post('siswa_id'),
				'tanggal_masuk' => $this->input->post('tanggal_masuk'),
				'jam_masuk' => $this->input->post('jam_masuk')
			);
			$res = $this->m->edit($data);
		}
		echo json_encode($res);
	}

	public function get_data() {
		$res = $this->m->get_data();
		$data = array(
			'kehadiran_id' => $this->m->get_id(),
			'siswa_id' => $this->input->post('siswa_id'),
			'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			'jam_masuk' => $this->input->post('jam_masuk')
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