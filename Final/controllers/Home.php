<?php
class Home extends Base_controller{
	public function __construct(){
		$this->load_model('home_model', 'hm');
	}
	public function index(){
		$this->load_view('header_view');
		$this->load_view('home_view');
		$this->load_view('footer_view');
	}
	public function login(){
		$this->load_view('header_view');
		$this->load_view('login_view');
		$this->load_view('footer_view');
	}
	public function login_submit(){
		if(isset($_REQUEST['username']) && !empty($_REQUEST['username'])){
			$username = $_REQUEST['username'];
		}else{
			echo "failed";
			return false;
		}
		if(isset($_REQUEST['password']) && !empty($_REQUEST['password'])){
			$password = $_REQUEST['password'];
		}else{
			echo "failed";
			return false;
		}
		$user = $this->hm->login($username, $password);
		if($user){
			$_SESSION['user'] = $user[0];
			echo "success";
		}else{
			echo 'failed';
		}
	}
	public function logout(){
		session_destroy();
		$redirectLink = base_url('index.php/home/login');
		header('Location: '.$redirectLink);
	}
}