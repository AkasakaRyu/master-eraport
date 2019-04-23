<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tahun extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('Data/M_Tahun_Ajaran','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Tahun Ajaran";
		$data["Breadcrumb"] = array("Dashboard","Tahun Ajaran");
		$data["Nav"] = "Tahun Ajaran";
		$data["Konten"] = "data/v_tahun_ajaran";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			if($data->status=="Aktif") {
				$button = "<button type='button' id='nonaktif' class='badge badge-danger' data='".$data->tahun_ajaran_id."'>Non Aktifkan</button>";
			} else {
				$button = "<button type='button' id='aktif' class='badge badge-success' data='".$data->tahun_ajaran_id."'>Aktifkan</button>";
			}
			$no++;
			$row = array();
			$row[] = $data->tahun_ajaran_id;
			$row[] = $data->tahun_ajaran;
			$row[] = $data->status;
			$row[] = $button." | <button type='button' id='hapus' class='badge badge-danger' data='".$data->tahun_ajaran_id."'>Hapus</a>";
			
			$datatb[] = $row;
		}

		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);

		echo json_encode($output);
	}

	public function simpan() {
		$tahun_ajaran_id = $this->input->post('tahun_ajaran_id');
		if($tahun_ajaran_id=="") {
			$data = array(
				'tahun_ajaran_id' => $this->m->get_id(),
				'tahun_ajaran' => $this->input->post('tahun_ajaran')
			);
			$res = $this->m->simpan($data);
		}
		echo json_encode($res);
	}

	public function aktifkan() {
		$data = array(
			'status' => 'Aktif'
		);
		return $this->m->aktifkan($data);
	}

	public function nonaktifkan() {
		$data = array(
			'status' => 'Tidak Aktif'
		);
		return $this->m->nonaktifkan($data);
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