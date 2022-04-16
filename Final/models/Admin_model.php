<?php
class Admin_model extends Base_model{
	public function update_profile($set){
		if($this->db->update('users', $set, '`id` = '.$_SESSION['user']['id'])){
			$user = $this->db->get('users', '*', '`id` = '.$_SESSION['user']['id']);
			if(is_array($user)){
				return $user[0];
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function check_password($password){
		return $this->db->get('users', '*', "`id` = ".$_SESSION['user']['id']." AND `password` = '".md5($password)."'");
	}
	public function add_teacher($set){
		return $this->db->insert('users', $set);
	}
	public function get_all_teachers(){
		return $this->db->get('users', '*', "`role` = 'teacher'");
	}
	public function add_notice($set){
		return $this->db->insert('notices', $set);
	}
	public function get_all_notices(){
		return $this->db->get('notices');
	}
}