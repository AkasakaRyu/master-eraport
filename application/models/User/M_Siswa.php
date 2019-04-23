<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_siswa extends CI_Model {

	protected $siswa = "ak_data_siswa";
	protected $user = "ak_data_user";
	protected $kelas = "ak_data_kelas";

	public function get_list_data() {
		return $this->db->join(
			$this->user,
			$this->user.'.user_id='.
			$this->siswa.'.user_id'
		)->join(
			$this->kelas,
			$this->kelas.'.kelas_id='.
			$this->siswa.'.kelas_id'
		)->where(
			$this->siswa.'.deleted',false
		)->get($this->siswa)->result();
	}

	public function get_id() {
		$res = $this->db->get($this->siswa)->num_rows();
		return "STU".date("ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
	}

	public function user_id() {
		$res = $this->db->get($this->user)->num_rows();
		return "USR".date("Ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
	}

	private function hash_pwd($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function create_user() {
		$id = $this->user_id();
		$data = array(
			'user_id' => $id,
			'level_id' => "LVL19011700003",
			'user_nama' => $this->input->post('siswa_nama'),
			'user_login' => $id,
			'user_pass' => $this->hash_pwd($id)
		);
		$this->db->insert($this->user,$data);
		return $id;
	}

	public function simpan($data) {
		return $this->db->insert($this->siswa,$data);
	}

	public function get_data() {
		return $this->db->where(
			'siswa_id',$this->input->post('siswa_id')
		)->get($this->siswa)->row();
	}

	public function edit($data) {
		return $this->db->where(
			'siswa_id', $this->input->post('siswa_id')
		)->update($this->siswa,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'siswa_id', $this->input->post('siswa_id')
		)->update($this->siswa,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"siswa_id as id,siswa_id as value,siswa_nama as text"
		)->like(
			'siswa_nama',$src
		)->where(
			'deleted', FALSE
		)->get(
			$this->siswa
		)->result();
		return $res;
	}
	
}