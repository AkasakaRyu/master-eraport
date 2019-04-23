<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Tahun_Ajaran extends CI_Model {

	protected $tahun_ajaran = "ak_data_tahun_ajaran";

	public function get_list_data() {
		return $this->db->where(
			'deleted',false
		)->get($this->tahun_ajaran)->result();
	}

	public function get_id() {
		$res = $this->db->get($this->tahun_ajaran)->num_rows();
		return "TA".date("ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
	}

	public function simpan($data) {
		return $this->db->insert($this->tahun_ajaran,$data);
	}

	public function aktifkan($data) {
		return $this->db->where(
			'tahun_ajaran_id', $this->input->post('tahun_ajaran_id')
		)->update($this->tahun_ajaran,$data);
	}

	public function nonaktifkan($data) {
		return $this->db->where(
			'tahun_ajaran_id', $this->input->post('tahun_ajaran_id')
		)->update($this->tahun_ajaran,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'tahun_ajaran_id', $this->input->post('tahun_ajaran_id')
		)->update($this->tahun_ajaran,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"tahun_ajaran_id as id,tahun_ajaran_id as value,tahun_ajaran as text"
		)->like(
			'tahun_ajaran',$src
		)->where(
			'deleted', FALSE
		)->get(
			$this->tahun_ajaran
		)->result();
		return $res;
	}
	
}