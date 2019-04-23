<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Siswa extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('User/M_Siswa','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Siswa";
		$data["Breadcrumb"] = array("Dashboard","Siswa");
		$data["Nav"] = "Settings";
		$data["Konten"] = "user/v_siswa";
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
			$row[] = $data->siswa_nama;
			$row[] = $data->kelas_nama;
			$row[] = $data->jenis_kelamin;
			$row[] = $data->tempat_lahir;
			$row[] = $data->tanggal_lahir;
			$row[] = $data->agama;
			$row[] = $data->alamat;
			$row[] = "<button type='button' id='edit' class='badge badge-success' data='".$data->siswa_id."'>Edit</button> | 
			<button type='button' id='hapus' class='badge badge-danger' data='".$data->siswa_id."'>Hapus</a>";
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function simpan() {
		$siswa_id = $this->input->post('siswa_id');
		if($siswa_id=="") {
			$data = array(
				'siswa_id' => $this->m->get_id(),
				'user_id' => $this->m->create_user(),
				'kelas_id' => $this->input->post('kelas_id'),
				'siswa_nama' => $this->input->post('siswa_nama'),
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
				'kelas_id' => $this->input->post('kelas_id'),
				'siswa_nama' => $this->input->post('siswa_nama'),
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
			'siswa_id' => $this->m->get_id(),
			'kelas_id' => $this->input->post('kelas_id'),
			'siswa_nama' => $this->input->post('siswa_nama'),
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