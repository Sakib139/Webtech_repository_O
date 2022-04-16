<?php
class Base_controller{
	public function load_view($file, $params = []){
		$file_path = 'views/'.$file.'.php';
		if(file_exists($file_path)){
			extract($params);
			include $file_path;
		}else{
			echo '<h1>Error: View file don\'t exists!</h1>';
		}
	}

	public function load_model($file_name, $var_name = null){
		$file_path = 'models/'.ucfirst($file_name).'.php';
		if(file_exists($file_path)){
			include $file_path;
			if($var_name == null){
				$var_name = $file_name;
			}
			$file_name = ucfirst($file_name);
			$this->$var_name = new $file_name();
		}else{
			echo '<h1>Error: Model file don\'t exists!</h1>';
		}
	}
}