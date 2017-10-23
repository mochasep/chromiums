<?php

class Madmin extends CI_Model {

	function login() {
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$where=array(
					'username' => $username,
					'password' => md5($password)
					);
		$query=$this->db->get_where('admin', $where);
		$login=false;
		if ($query->num_rows()>0) {
			$login=true;
		}
		return $login;
	}
}
?>