<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Nilai extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('Raport/M_Nilai','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Nilai";
		$data["Breadcrumb"] = array("Dashboard","Nilai");
		$data["Nav"] = "Nilai";
		$data["Konten"] = "raport/v_nilai";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $data->siswa_nama;
			$row[] = $data->kelas_nama;
			$row[] = $data->mapel_nama;
			$row[] = $data->obs;
			$row[] = $data->pd;
			$row[] = $data->ps;
			$row[] = $data->jur;
			$row[] = $data->nilai_harian;
			$row[] = $data->nilai_tugas;
			$row[] = $data->nilai_tugas;
			$row[] = $data->nilai_uas;
			$row[] = $data->nilai_uts;
			$row[] = $data->nilai_praktek;
			$row[] = $data->nilai_portofolio;
			$row[] = "";
			$row[] = "<button type='button' id='edit' class='badge badge-success' data='".$data->nilai_id."'>Edit</button> | 
			<button type='button' id='hapus' class='badge badge-danger' data='".$data->nilai_id."'>Hapus</a>";
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function simpan() {
		$nilai_id = $this->input->post('nilai_id');
		if($nilai_id=="") {
			$data = array(
				'nilai_id' => $this->m->get_id(),
				'guru_id' => $this->m->get_guru(),
				'siswa_id' => $this->input->post('siswa_id'),
				'tahun_ajaran_id' => $this->m->get_tahun_ajaran(),
				'nilai_tugas' => $this->input->post('nilai_tugas'),
				'nilai_harian' => $this->input->post('nilai_harian'),
				'nilai_portofolio' => $this->input->post('nilai_portofolio'),
				'nilai_proyek' => $this->input->post('nilai_proyek'),
				'nilai_praktek' => $this->input->post('nilai_praktek'),
				'nilai_uts' => $this->input->post('nilai_uts'),
				'nilai_uas' => $this->input->post('nilai_uas'),
				'pd' => $this->input->post('pd'),
				'jur' => $this->input->post('jur'),
				'obs' => $this->input->post('obs'),
				'ps' => $this->input->post('ps')
			);
			$res = $this->m->simpan($data);
		} else {
			$data = array(
				'siswa_id' => $this->input->post('siswa_id'),
				'tahun_ajaran_id' => $this->m->get_tahun_ajaran(),
				'nilai_tugas' => $this->input->post('nilai_tugas'),
				'nilai_harian' => $this->input->post('nilai_harian'),
				'nilai_portofolio' => $this->input->post('nilai_portofolio'),
				'nilai_proyek' => $this->input->post('nilai_proyek'),
				'nilai_praktek' => $this->input->post('nilai_praktek'),
				'nilai_uts' => $this->input->post('nilai_uts'),
				'nilai_uas' => $this->input->post('nilai_uas'),
				'pd' => $this->input->post('pd'),
				'jur' => $this->input->post('jur'),
				'obs' => $this->input->post('obs'),
				'ps' => $this->input->post('ps')
			);
			$res = $this->m->edit($data);
		}
		echo json_encode($res);
	}

	public function get_data() {
		$res = $this->m->get_data();
		$data = array(
			'nilai_id' => $this->m->get_id(),
			'guru_id' => $this->m->get_guru(),
			'siswa_id' => $this->input->post('siswa_id'),
			'tahun_ajaran_id' => $this->m->get_tahun_ajaran(),
			'nilai_tugas' => $this->input->post('nilai_tugas'),
			'nilai_harian' => $this->input->post('nilai_harian'),
			'nilai_portofolio' => $this->input->post('nilai_portofolio'),
			'nilai_proyek' => $this->input->post('nilai_proyek'),
			'nilai_praktek' => $this->input->post('nilai_praktek'),
			'nilai_uts' => $this->input->post('nilai_uts'),
			'nilai_uas' => $this->input->post('nilai_uas'),
			'pd' => $this->input->post('pd'),
			'jur' => $this->input->post('jur'),
			'obs' => $this->input->post('obs'),
			'ps' => $this->input->post('ps')
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