<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Nilai extends CI_Model {

	protected $nilai = "ak_data_nilai";
	protected $siswa = "ak_data_siswa";
	protected $guru = "ak_data_guru";
	protected $mapel = "ak_data_mapel";
	protected $kelas = "ak_data_kelas";
	protected $tahun = "ak_data_tahun_ajaran";

	public function get_list_data() {
		return $this->db->join(
			$this->siswa,
			$this->siswa.'.siswa_id='.
			$this->nilai.'.siswa_id'
		)->join(
			$this->guru,
			$this->guru.'.guru_id='.
			$this->nilai.'.guru_id'
		)->join(
			$this->tahun,
			$this->tahun.'.tahun_ajaran_id='.
			$this->nilai.'.tahun_ajaran_id'
		)->join(
			$this->kelas,
			$this->kelas.'.kelas_id='.
			$this->siswa.'.kelas_id'
		)->join(
			$this->mapel,
			$this->mapel.'.mapel_id='.
			$this->guru.'.mapel_id'
		)->where(
			$this->nilai.'.deleted',false
		)->get($this->nilai)->result();
	}

	public function get_id() {
		$res = $this->db->get($this->nilai)->num_rows();
		return "NIL".date("ymd").str_pad($res+1, 6, "0", STR_PAD_LEFT);
	}

	public function get_guru() {
		return $this->db->where(
			'user_id',$this->session->userdata('id')
		)->get($this->guru)->row('guru_id');
	}

	public function get_tahun_ajaran() {
		return $this->db->where(
			'status','aktif'
		)->get($this->tahun)->row('tahun_ajaran_id');
	}

	public function simpan($data) {
		return $this->db->insert($this->nilai,$data);
	}

	public function get_data() {
		return $this->db->where(
			'nilai_id',$this->input->post('nilai_id')
		)->get($this->nilai)->row();
	}

	public function edit($data) {
		return $this->db->where(
			'nilai_id', $this->input->post('nilai_id')
		)->update($this->nilai,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'nilai_id', $this->input->post('nilai_id')
		)->update($this->nilai,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"nilai_id as id,nilai_id as value,nilai_nama as text"
		)->like(
			'nilai_nama',$src
		)->where(
			'deleted', FALSE
		)->get(
			$this->nilai
		)->result();
		return $res;
	}
	
}