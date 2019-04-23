<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Guru extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('User/M_Guru','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Guru";
		$data["Breadcrumb"] = array("Dashboard","Guru");
		$data["Nav"] = "Settings";
		$data["Konten"] = "user/v_guru";
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
			$row[] = $data->guru_nama;
			$row[] = $data->mapel_nama;
			$row[] = $data->jenis_kelamin;
			$row[] = $data->tempat_lahir;
			$row[] = $data->tanggal_lahir;
			$row[] = $data->agama;
			$row[] = $data->alamat;
			$row[] = "<button type='button' id='edit' class='badge badge-success' data='".$data->guru_id."'>Edit</button> | 
			<button type='button' id='hapus' class='badge badge-danger' data='".$data->guru_id."'>Hapus</a>";
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function simpan() {
		$guru_id = $this->input->post('guru_id');
		if($guru_id=="") {
			$data = array(
				'guru_id' => $this->m->get_id(),
				'user_id' => $this->m->create_user(),
				'mapel_id' => $this->input->post('mapel_id'),
				'guru_nama' => $this->input->post('guru_nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'agama' => $this->input->post('agama'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon')
			);
			$res = $this->m->simpan($data);
		} else {
			$data = array(
				'mapel_id' => $this->input->post('mapel_id'),
				'guru_nama' => $this->input->post('guru_nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'agama' => $this->input->post('agama'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon')
			);
			$res = $this->m->edit($data);
		}
		echo json_encode($res);
	}

	public function get_data() {
		$res = $this->m->get_data();
		$data = array(
			'guru_id' => $this->m->get_id(),
			'mapel_id' => $this->input->post('mapel_id'),
			'guru_nama' => $this->input->post('guru_nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon')
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