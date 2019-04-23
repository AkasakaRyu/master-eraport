<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_guru extends CI_Model {

	protected $guru = "ak_data_guru";
	protected $user = "ak_data_user";
	protected $mapel = "ak_data_mapel";

	public function get_list_data() {
		return $this->db->join(
			$this->user,
			$this->user.'.user_id='.
			$this->guru.'.user_id'
		)->join(
			$this->mapel,
			$this->mapel.'.mapel_id='.
			$this->guru.'.mapel_id'
		)->where(
			$this->guru.'.deleted',false
		)->get($this->guru)->result();
	}

	public function get_id() {
		$res = $this->db->get($this->guru)->num_rows();
		return "TCH".date("ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
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
			'level_id' => "LVL19011700002",
			'user_nama' => $this->input->post('guru_nama'),
			'user_login' => $id,
			'user_pass' => $this->hash_pwd($id)
		);
		$this->db->insert($this->user,$data);
		return $id;
	}

	public function simpan($data) {
		return $this->db->insert($this->guru,$data);
	}

	public function get_data() {
		return $this->db->where(
			'guru_id',$this->input->post('guru_id')
		)->get($this->guru)->row();
	}

	public function edit($data) {
		return $this->db->where(
			'guru_id', $this->input->post('guru_id')
		)->update($this->guru,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'guru_id', $this->input->post('guru_id')
		)->update($this->guru,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"guru_id as id,guru_id as value,guru_nama as text"
		)->like(
			'guru_nama',$src
		)->where(
			'deleted', FALSE
		)->get(
			$this->guru
		)->result();
		return $res;
	}
	
}