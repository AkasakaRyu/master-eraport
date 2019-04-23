<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_App_Info extends CI_Model {

	protected $sistem_app_info = "ak_data_sistem_app_info";
	protected $instansi = "ak_data_sistem_instansi";

	public function get_app_name() {
		return $this->db->get($this->sistem_app_info)->row();
	}

	public function get_instansi() {
		return $this->db->get($this->instansi)->row();
	}

}
