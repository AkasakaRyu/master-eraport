<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Kehadiran extends CI_Model {

	protected $siswa = "ak_data_siswa";
	protected $kehadiran = "ak_data_kehadiran";

	public function get_list_data() {
		return $this->db->join(
			$this->siswa,
			$this->siswa.'.siswa_id='.
			$this->kehadiran.'.siswa_id'
		)->where(
			$this->kehadiran.'.deleted',false
		)->get($this->kehadiran)->result();
	}

	public function get_id() {
		$res = $this->db->get($this->kehadiran)->num_rows();
		return "ABS".date("ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
	}

	public function simpan($data) {
		return $this->db->insert($this->kehadiran,$data);
	}

	public function get_data() {
		return $this->db->where(
			'kehadiran_id',$this->input->post('kehadiran_id')
		)->get($this->kehadiran)->row();
	}

	public function edit($data) {
		return $this->db->where(
			'kehadiran_id', $this->input->post('kehadiran_id')
		)->update($this->kehadiran,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'kehadiran_id', $this->input->post('kehadiran_id')
		)->update($this->kehadiran,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"kehadiran_id as id,kehadiran_id as value,kehadiran_nama as text"
		)->like(
			'kehadiran_nama',$src
		)->where(
			'deleted', FALSE
		)->get(
			$this->kehadiran
		)->result();
		return $res;
	}
	
}