<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Officer extends CI_Model {
	
	protected $level = "ak_data_user_level";
	protected $user = "ak_data_user";

	public function get_list_data() {
		return $this->db->join(
			$this->level,
			$this->level.'.level_id='.
			$this->user.'.level_id'
		)->get($this->user)->result();
	}

	public function user_id() {
		$res = $this->db->get($this->user)->num_rows();
		return "USR".date("Ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
	}

	public function simpan($data) {
		return $this->db->insert($this->user,$data);
	}

	public function get_data() {
		return $this->db->where(
			'user_id',$this->input->post('user_id')
		)->join(
			$this->level,
			$this->level.'.level_id='.
			$this->user.'.level_id'
		)->get($this->user)->row();
	}

	public function edit($data) {
		return $this->db->where(
			'user_id', $this->input->post('user_id')
		)->update($this->user,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"user_id as id,user_id as value,user_nama as text"
		)->like(
			'user_nama',$src
		)->get(
			$this->user
		)->result();
		return $res;
	}

	public function hash_pwd($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}
}