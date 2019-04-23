<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_kelas extends CI_Model {

	protected $kelas = "ak_data_kelas";

	public function get_list_data() {
		return $this->db->where(
			'deleted',false
		)->get($this->kelas)->result();
	}

	public function get_id() {
		$res = $this->db->get($this->kelas)->num_rows();
		return "KLS".date("ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
	}

	public function simpan($data) {
		return $this->db->insert($this->kelas,$data);
	}

	public function get_data() {
		return $this->db->where(
			'kelas_id',$this->input->post('kelas_id')
		)->get($this->kelas)->row();
	}

	public function edit($data) {
		return $this->db->where(
			'kelas_id', $this->input->post('kelas_id')
		)->update($this->kelas,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'kelas_id', $this->input->post('kelas_id')
		)->update($this->kelas,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"kelas_id as id,kelas_id as value,kelas_nama as text"
		)->like(
			'kelas_nama',$src
		)->where(
			'deleted', FALSE
		)->get(
			$this->kelas
		)->result();
		return $res;
	}
	
}