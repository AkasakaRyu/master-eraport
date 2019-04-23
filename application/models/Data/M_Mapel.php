<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_mapel extends CI_Model {

	protected $mapel = "ak_data_mapel";

	public function get_list_data() {
		return $this->db->where(
			'deleted',false
		)->get($this->mapel)->result();
	}

	public function get_id() {
		$res = $this->db->get($this->mapel)->num_rows();
		return "MAP".date("ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
	}

	public function simpan($data) {
		return $this->db->insert($this->mapel,$data);
	}

	public function get_data() {
		return $this->db->where(
			'mapel_id',$this->input->post('mapel_id')
		)->get($this->mapel)->row();
	}

	public function edit($data) {
		return $this->db->where(
			'mapel_id', $this->input->post('mapel_id')
		)->update($this->mapel,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'mapel_id', $this->input->post('mapel_id')
		)->update($this->mapel,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"mapel_id as id,mapel_id as value,mapel_nama as text"
		)->like(
			'mapel_nama',$src
		)->where(
			'deleted', FALSE
		)->get(
			$this->mapel
		)->result();
		return $res;
	}
	
}