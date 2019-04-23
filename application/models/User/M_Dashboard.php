<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model {

	protected $kelas = "ak_data_kelas";
	protected $siswa = "ak_data_siswa";
	protected $guru = "ak_data_guru";
	protected $mapel = "ak_data_mapel";
	protected $tahun = "ak_data_tahun_ajaran";
	protected $kehadiran = "ak_data_kehadiran";

	public function list_kelas() {
		return $this->db->where(
			'deleted',false
		)->get($this->kelas)->result();
	}

	public function siswa($kelas) {
		return $this->db->where(
			'kelas_id',$kelas
		)->get($this->siswa)->num_rows();
	}

	public function list_pengajar() {
		return $this->db->where(
			$this->guru.'.deleted',false
		)->join(
			$this->mapel,
			$this->mapel.'.mapel_id='.
			$this->guru.'.mapel_id'
		)->get($this->guru)->result();
	}

	public function total_siswa() {
		return $this->db->get($this->siswa)->num_rows();
	}

	public function total_pengajar() {
		return $this->db->get($this->guru)->num_rows();
	}

	public function hadir() {
		return $this->db->get($this->kehadiran)->num_rows();
	}

	public function tahun_ajaran() {
		return $this->db->where(
			'status','Aktif'
		)->get($this->tahun)->row('tahun_ajaran');
	}
	
}