<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('User/M_Dashboard','m');
		} else {
			redirect('portal','refresh');
		}
	}

	public function index() {
		$data["Title"] = "Dashboard";
		$data["Breadcrumb"] = array('Dashboard');
		$data["Nav"] = "Dashboard";

		$level = $this->session->userdata('level');
		if($level=='Master') {
			$data["Konten"] = "user/v_dashboard";
		}

		$this->load->view("v_master",$data);
	}

	public function list_kelas() {
		$list = $this->m->list_kelas();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $data->kelas_nama;
			$row[] = $this->m->siswa($data->kelas_id);
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function list_pengajar() {
		$list = $this->m->list_pengajar();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $data->guru_nama;
			$row[] = $data->mapel_nama;
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function total_siswa() {
		echo $this->m->total_siswa();
	}

	public function total_pengajar() {
		echo $this->m->total_pengajar();
	}

	public function tahun_ajaran() {
		echo $this->m->tahun_ajaran();
	}

	public function persentase_kehadiran() {
		$seluruh = $this->m->total_siswa();
		$hadir = $this->m->hadir();
		echo $hadir/$seluruh*100;
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('portal','refresh');
	}

}