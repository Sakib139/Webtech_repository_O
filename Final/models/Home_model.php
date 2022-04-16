<?php
class Home_model extends Base_model{
	public function login($username, $password){
		$passwordHash = md5($password);
		return $this->db->get('users', '*', "`username` = '$username' AND `password` = '$passwordHash'");
	}
}