<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Level extends CI_Model {

	protected $level = "ak_data_user_level";

	public function get_list_data() {
		return $this->db->where(
			'deleted',false
		)->get($this->level)->result();
	}

	public function get_id() {
		$res = $this->db->get($this->level)->num_rows();
		return "LVL".date("ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
	}

	public function simpan($data) {
		return $this->db->insert($this->level,$data);
	}

	public function get_data() {
		return $this->db->where(
			'level_id',$this->input->post('level_id')
		)->get($this->level)->row();
	}

	public function edit($data) {
		return $this->db->where(
			'level_id', $this->input->post('level_id')
		)->update($this->level,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'level_id', $this->input->post('level_id')
		)->update($this->level,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"level_id as id,level_id as value,level_nama as text"
		)->like(
			'level_nama',$src
		)->where(
			'deleted', FALSE
		)->get(
			$this->level
		)->result();
		return $res;
	}
	
}