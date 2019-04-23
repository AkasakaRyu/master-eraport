<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

	protected $user = "ak_data_user";
	protected $level = "ak_data_user_level";

	protected function verify_password($password,$hash) {
		return password_verify($password,$hash);
	}

	public function update_last_login() {
		$data = array(
			'last_login' => date('Y-m-d H:i:s')
		);
		return $this->db->where(
			'user_login',$this->input->post('user_name')
		)->update($this->user,$data);
	}

	public function cek_login() {
		$username = $this->input->post('user_name');
		$password = $this->input->post('user_pass');
		$hash = $this->db->where(
			'user_login',$username
		)->join(
			$this->level,
			$this->level.'.level_id='.
			$this->user.'.level_id'
		)->get($this->user)->row('user_pass');
		$verified = $this->verify_password($password,$hash);
		if($verified) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_user_data() {
		$this->update_last_login();
		return $this->db->where(
			'user_login',$this->input->post('user_name')
		)->join(
			$this->level,
			$this->level.'.level_id='.
			$this->user.'.level_id'
		)->get($this->user)->row();
	}

}
