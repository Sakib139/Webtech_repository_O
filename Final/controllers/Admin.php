<?php
class Admin extends Base_controller{
	public function __construct(){
		if(!isset($_SESSION['user'])){
			header('Location: '.base_url('index.php/home/login'));
		}else if($_SESSION['user']['role'] != 'admin'){
			header('Location: '.base_url('index.php/'.$_SESSION['user']['role']));
		}
		$this->load_model('admin_model', 'am');
	}
	public function index(){
		$this->view_profile();
	}
	public function view_profile(){
		$this->load_view('header_view');
		$this->load_view('admin_profile_view');
		$this->load_view('footer_view');
	}
	public function edit_profile(){
		$this->load_view('header_view');
		$this->load_view('admin_edit_profile');
		$this->load_view('footer_view');
	}
	public function edit_profile_submit(){
		$set = [];
		if(isset($_REQUEST['first_name']) && !empty($_REQUEST['first_name'])){
			$set['first_name'] = $_REQUEST['first_name'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['last_name']) && !empty($_REQUEST['last_name'])){
			$set['last_name'] = $_REQUEST['last_name'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['email']) && !empty($_REQUEST['email'])){
			$set['email'] = $_REQUEST['email'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['blood_group']) && !empty($_REQUEST['blood_group'])){
			$set['blood_group'] = $_REQUEST['blood_group'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['present_address']) && !empty($_REQUEST['present_address'])){
			$set['present_address'] = $_REQUEST['present_address'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['permanent_address']) && !empty($_REQUEST['permanent_address'])){
			$set['permanent_address'] = $_REQUEST['permanent_address'];
		}else{
			echo "failed";
			return false;
		}
		$user = $this->am->update_profile($set);
		if($user){
			$_SESSION['user'] = $user;
			echo "success";
		}else{
			echo 'failed';
		}
	}
	public function change_password(){
		$this->load_view('header_view');
		$this->load_view('admin_change_password');
		$this->load_view('footer_view');
	}
	public function change_password_submit(){
		if(isset($_REQUEST['current_password']) && !empty($_REQUEST['current_password']) && isset($_REQUEST['new_password']) && !empty($_REQUEST['new_password'])){
			$current_password = $_REQUEST['current_password'];
			$new_password = $_REQUEST['new_password'];
			if($this->am->check_password($current_password)){
				$set = ['password' => md5($new_password)];
				$user = $this->am->update_profile($set);
				if($user){
					$_SESSION['user'] = $user;
					echo "success";
				}else{
					echo 'failed';
				}
			}else{
				echo 'failed';
			}
		}else{
			echo 'failed';
		}
	}
	public function add_teacher(){
		$this->load_view('header_view');
		$this->load_view('admin_add_teacher');
		$this->load_view('footer_view');
	}
	public function add_teacher_submit(){
		$set = [];
		if(isset($_REQUEST['first_name']) && !empty($_REQUEST['first_name'])){
			$set['first_name'] = $_REQUEST['first_name'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['last_name']) && !empty($_REQUEST['last_name'])){
			$set['last_name'] = $_REQUEST['last_name'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['email']) && !empty($_REQUEST['email'])){
			$set['email'] = $_REQUEST['email'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['username']) && !empty($_REQUEST['username'])){
			$set['username'] = $_REQUEST['username'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['password']) && !empty($_REQUEST['password'])){
			$set['password'] = md5($_REQUEST['password']);
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['gender']) && !empty($_REQUEST['gender'])){
			$set['gender'] = $_REQUEST['gender'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['date_of_birth']) && !empty($_REQUEST['date_of_birth'])){
			$set['date_of_birth'] = $_REQUEST['date_of_birth'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['blood_group']) && !empty($_REQUEST['blood_group'])){
			$set['blood_group'] = $_REQUEST['blood_group'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['present_address']) && !empty($_REQUEST['present_address'])){
			$set['present_address'] = $_REQUEST['present_address'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['permanent_address']) && !empty($_REQUEST['permanent_address'])){
			$set['permanent_address'] = $_REQUEST['permanent_address'];
		}else{
			echo "failed";
			return false;
		}
		$set['role'] = 'teacher';
		$user = $this->am->add_teacher($set);
		if($user){
			echo "success";
		}else{
			echo 'failed';
		}
	}
	public function view_teacher(){
		$teachers = $this->am->get_all_teachers();
		$this->load_view('header_view');
		$this->load_view('admin_view_teacher', ['teachers' => $teachers]);
		$this->load_view('footer_view');
	}
	public function add_notice(){
		$this->load_view('header_view');
		$this->load_view('admin_add_notice');
		$this->load_view('footer_view');
	}
	public function add_notice_submit(){
		$set = [];
		if(isset($_REQUEST['title']) && !empty($_REQUEST['title'])){
			$set['title'] = $_REQUEST['title'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['description']) && !empty($_REQUEST['description'])){
			$set['description'] = $_REQUEST['description'];
		}else{
			echo "failed";
			return false;
		}
		$notice = $this->am->add_notice($set);
		if($notice){
			echo "success";
		}else{
			echo 'failed';
		}
	}
	public function view_notice(){
		$notices = $this->am->get_all_notices();
		$this->load_view('header_view');
		$this->load_view('admin_view_notices', ['notices' => $notices]);
		$this->load_view('footer_view');
	}
}